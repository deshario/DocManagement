<?php

namespace app\controllers;

use app\models\BudgetDetails;
use app\models\Consistency;
use app\models\Element;
use app\models\ElementProduct;
use app\models\Goal;
use app\models\Indicator;
use app\models\LastPage;
use app\models\Organization;
use app\models\Project;
use app\models\ProjectLaksana;
use app\models\ProjectPaomai;
use app\models\ProjectPlan;
use app\models\ProjectSearch;
use app\models\Strategic;
use app\models\Strategy;
use kartik\growl\Growl;
use kartik\mpdf\Pdf;
use Mpdf\Mpdf;
use Yii;
use app\models\Activity;
use app\models\ActivitySearch;
use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;

/**
 * ActivityController implements the CRUD actions for Activity model.
 */
class ActivityController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Activity models.
     * @return mixed
     */
//    public function actionIndex()
//    {
//        $searchModel = new ActivitySearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }

    public function actionIndex($project_id, $project_name, $project_status = 10)
    {
//        if($project_status == Project::PROJECT_RUNNING){
        //$searchModel = new ActivitySearch();
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('project_id = ' . $project_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        //}
//        else{
////            Yii::$app->getSession()->setFlash('activity_rand_index', [
////                'type' =>  Growl::TYPE_DANGER,
////                'duration' => 5000,
////                'icon' => 'fa fa-close',
////                'title' => 'คำสั่งลมเหลว',
////                'message' => 'โครงการของคุณยังไม่ได้รับอนุญาติจากผู้ดูและระบบ กรุณาติดต่อผู้ดูและระบบ',
////                'positonY' => 'bottom',
////                'positonX' => 'right'
////            ]);
//            //return $this->redirect(['/project/index']);
//            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
//        }
    }

    public function actionFiltering($project_id)
    {
        $searchModel = new ActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('root_project_id = ' . $project_id);

        $data = $this->renderPartial('filtering', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
        return Json::encode($data);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Activity();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $randomString = \app\models\Managers::getRandomKey(15);
                $temp_project_plan_id = 0;
                $temp_project_budget_details_id = 0;
                $temp_lastpage_id = 0;
                $temp_consistency_id = 0;
                $temp_element_product_id = 0;
                $items = Yii::$app->request->post();
                $model->root_project_id = Yii::$app->request->get('proj_id');

                foreach ($items['Activity']['temp_project_consistency'] as $key => $val) {
                    $project_consistency = new Consistency();
                    $project_consistency->cons_strategic_id = $val['cons_strategic_id'];
                    $project_consistency->cons_goal_id = $val['cons_goal_id'];
                    $project_consistency->cons_strategy_id = $val['cons_strategy_id'];
                    $project_consistency->cons_indicator_id = $val['cons_indicator_id'];
                    $project_consistency->project_act_key = $randomString;
                    $project_consistency->save();
                    $temp_consistency_id = $project_consistency->consistency_id;
                }

                foreach ($items['Activity']['temp_element_product'] as $key => $val) {
                    $element_product = new ElementProduct();
                    $element_product->ep_element_id = $val['ep_element_id'];
                    $element_product->ep_product_id = $val['ep_product_id'];
                    $element_product->project_act_key = $randomString;
                    $element_product->save();
                    $temp_element_product_id = $element_product->element_product_id;
                }

                foreach ($items['Activity']['budget_plan'] as $key => $val) {
                    $budget_details = new BudgetDetails();
                    $budget_details->detail_name = $val['detail_name'];
                    $budget_details->detail_price = $val['detail_price'];
                    $budget_details->activity_key = $randomString;
                    $budget_details->save();
                    $temp_project_budget_details_id = $budget_details->detail_id;
                }

                foreach ($items['Activity']['temp_project_plan_id'] as $key => $val) {
                    $project_plan = new ProjectPlan();
                    $project_plan->plan_process = $val['plan_process'];
                    $project_plan->plan_detail = $val['plan_detail'];
                    $project_plan->plan_date = $val['plan_date'];
                    $project_plan->plan_place = $val['plan_place'];
                    $project_plan->plan_project_key = $randomString;
                    $project_plan->save();
                    $temp_project_plan_id = $project_plan->plan_id;
                }

                foreach ($items['Activity']['lastpage_main'] as $key => $val) {
                    $lastpage = new LastPage();
                    $lastpage->last_role = $val['last_role'];
                    $lastpage->last_user = $val['last_user'];
                    $lastpage->last_position = $val['last_position'];
                    $lastpage->project_act_key = $randomString;
                    $lastpage->save();
                    $temp_lastpage_id = $lastpage->last_id;
                }

                $transaction->commit();

            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }
            $project_paomai = new ProjectPaomai();
            $project_paomai->project_quantity = $model->paomai_quantity;
            $project_paomai->project_quality = $model->paomai_quality;
            $project_paomai->project_time = $model->paomai_time;
            $project_paomai->save();

            $project_laksana = new ProjectLaksana();
            $project_laksana->project_type_id = $model->temp_type;
            $project_laksana->procced_id = $model->temp_procced;
            $project_laksana->save();

            $model->project_laksana_id = $project_laksana->laksana_id;
            $model->project_paomai_id = $project_paomai->paomai_id;
            $model->budget_details_id = $temp_project_budget_details_id;
            $model->project_plan_id = $temp_project_plan_id;
            $model->activity_consistency_id = $temp_consistency_id;
            $model->activity_ep_id = $temp_element_product_id;
            $model->activity_status = Project::PROJECT_RUNNING;
            $model->lastpage_id = $temp_lastpage_id;
            $model->created_by = Yii::$app->user->identity->id;

            if ($model->validate()) {
                $model->activity_key = $randomString;
                $model->save();
                Yii::$app->getSession()->setFlash('activity_create_done', [
                    'type' => Growl::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-check',
                    'title' => $model->activity_name,
                    'message' => 'กิจกกรมของคูณได้รับการบันทึกแล้ว',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['/activity/index',
                    'project_id' => $model->root_project_id,
                    'project_name' => $model->rootProject->project_name,
                    'project_status' => $model->rootProject->project_status,
                ]);
            }

        } else {
            $status = Yii::$app->request->get('project_status');
            if ($status == Project::PROJECT_RUNNING) {
                return $this->render('create', [
                    'model' => $model,
                ]);
            } else {
                Yii::$app->getSession()->setFlash('activity_create_fail', [
                    'type' => Growl::TYPE_DANGER,
                    'duration' => 5000,
                    'icon' => 'fa fa-close',
                    'title' => 'คำสั่งลมเหลว',
                    'message' => 'ไม่สามารถเทำรายการได้ เนื่องจากโครงการของคุณได้รับการอนุมัติแล้ว กรุณาติดต่อผู้ดูแลระบบ',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            }
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->temp_type = $model->projectLaksana->projectType->type_id;
        $model->temp_procced = $model->projectLaksana->procced->procced_id;

        $model->paomai_quantity = ProjectPaomai::find()->where(['paomai_id' => $model->project_paomai_id])->one()->project_quantity;
        $model->paomai_quality = ProjectPaomai::find()->where(['paomai_id' => $model->project_paomai_id])->one()->project_quality;
        $model->paomai_time = ProjectPaomai::find()->where(['paomai_id' => $model->project_paomai_id])->one()->project_time;

        $model->budget_plan = BudgetDetails::find()->where(['activity_key' => $model->activity_key])->all();
        $model->temp_project_plan_id = ProjectPlan::find()->where(['plan_project_key' => $model->activity_key])->all();
        $model->lastpage_main = LastPage::find()->where(['project_act_key' => $model->activity_key])->all();
        $model->temp_project_consistency = Consistency::find()->where(['project_act_key' => $model->activity_key])->all();
        $model->temp_element_product = ElementProduct::find()->where(['project_act_key' => $model->activity_key])->all();

        if ($model->load(Yii::$app->request->post())) {
            $budgets = BudgetDetails::find()->where(['activity_key' => $model->activity_key])->all();
            $plans = ProjectPlan::find()->where(['plan_project_key' => $model->activity_key])->all();
            $lastpages = LastPage::find()->where(['project_act_key' => $model->activity_key])->all();
            $consistencies = Consistency::find()->where(['project_act_key' => $model->activity_key])->all();
            $element_n_products = ElementProduct::find()->where(['project_act_key' => $model->activity_key])->all();
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $temp_project_plan_id = 0;
                $temp_project_budget_details_id = 0;
                $temp_lastpage_id = 0;
                $temp_consistency_id = 0;
                $temp_element_product_id = 0;
                $items = Yii::$app->request->post();

                foreach ($consistencies as $delete) {
                    $delete->delete();
                }
                foreach ($element_n_products as $delete) {
                    $delete->delete();
                }
                foreach ($budgets as $delete) {
                    $delete->delete();
                }
                foreach ($plans as $delete2) {
                    $delete2->delete();
                }
                foreach ($lastpages as $delete3) {
                    $delete3->delete();
                }

                foreach ($items['Activity']['temp_project_consistency'] as $key => $val) {
                    $project_consistency = new Consistency();
                    $project_consistency->cons_strategic_id = $val['cons_strategic_id'];
                    $project_consistency->cons_goal_id = $val['cons_goal_id'];
                    $project_consistency->cons_strategy_id = $val['cons_strategy_id'];
                    $project_consistency->cons_indicator_id = $val['cons_indicator_id'];
                    $project_consistency->project_act_key = $model->activity_key;
                    $project_consistency->save();
                    $temp_consistency_id = $project_consistency->consistency_id;
                }

                foreach ($items['Activity']['temp_element_product'] as $key => $val) {
                    $element_product = new ElementProduct();
                    $element_product->ep_element_id = $val['ep_element_id'];
                    $element_product->ep_product_id = $val['ep_product_id'];
                    $element_product->project_act_key = $model->activity_key;;
                    $element_product->save();
                    $temp_element_product_id = $element_product->element_product_id;
                }

                foreach ($items['Activity']['budget_plan'] as $key => $val) {
                    $budget_details = new BudgetDetails();
                    $budget_details->detail_name = $val['detail_name'];
                    $budget_details->detail_price = $val['detail_price'];
                    $budget_details->activity_key = $model->activity_key;
                    $budget_details->save();
                    $temp_project_budget_details_id = $budget_details->detail_id;
                }

                foreach ($items['Activity']['temp_project_plan_id'] as $key => $val) {
                    $project_plan = new ProjectPlan();
                    $project_plan->plan_process = $val['plan_process'];
                    $project_plan->plan_detail = $val['plan_detail'];
                    $project_plan->plan_date = $val['plan_date'];
                    $project_plan->plan_place = $val['plan_place'];
                    $project_plan->plan_project_key = $model->activity_key;
                    $project_plan->save();
                    $temp_project_plan_id = $project_plan->plan_id;
                }

                foreach ($items['Activity']['lastpage_main'] as $key => $val) {
                    $lastpage = new LastPage();
                    $lastpage->last_role = $val['last_role'];
                    $lastpage->last_user = $val['last_user'];
                    $lastpage->last_position = $val['last_position'];
                    $lastpage->project_act_key = $model->activity_key;
                    $lastpage->save();
                    $temp_lastpage_id = $lastpage->last_id;
                }

                $transaction->commit();

            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }
            $project_paomai = new ProjectPaomai();
            $project_paomai->project_quantity = $model->paomai_quantity;
            $project_paomai->project_quality = $model->paomai_quality;
            $project_paomai->project_time = $model->paomai_time;
            $project_paomai->save();

            $project_laksana = new ProjectLaksana();
            $project_laksana->project_type_id = $model->temp_type;
            $project_laksana->procced_id = $model->temp_procced;
            $project_laksana->save();

            $model->project_laksana_id = $project_laksana->laksana_id;
            $model->project_paomai_id = $project_paomai->paomai_id;
            $model->budget_details_id = $temp_project_budget_details_id;
            $model->activity_consistency_id = $temp_consistency_id;
            $model->activity_ep_id = $temp_element_product_id;
            $model->project_plan_id = $temp_project_plan_id;
            $model->activity_status = Project::PROJECT_RUNNING;
            $model->lastpage_id = $temp_lastpage_id;

            if ($model->validate()) {
                $model->save();
                Yii::$app->getSession()->setFlash('activity_update_ok', [
                    'type' => Growl::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-check',
                    'title' => $model->activity_name,
                    'message' => 'กิจกกรมของคูณปรับปรุงเรียบร้อบแล้ว',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['/activity/index',
                    'project_id' => $model->root_project_id,
                    'project_name' => $model->rootProject->project_name,
                    'project_status' => $model->rootProject->project_status,
                ]);
            }
        } else {
            $temp_id = $model->created_by;
            $id = Yii::$app->user->identity->id;
            $status = Yii::$app->request->get('project_status');

            $master = new Project();

            if ($status == Project::PROJECT_RUNNING) {
                if ($temp_id == $id) {
                    return $this->render('update', [
                        'model' => $model,
                        'tempGoal' => '',
                        'tempStrategy' => '',
                        'tempIndicator' => ''
                    ]);
                } else {
                    Yii::$app->getSession()->setFlash('activity_not_owner', [
                        'type' => Growl::TYPE_DANGER,
                        'duration' => 5000,
                        'icon' => 'fa fa-close',
                        'title' => 'คำสั่งลมเหลว',
                        'message' => 'ไม่สามารถแก้ไขกิจกรรมของผู้ใช้งานคนอืนได้',
                        'positonY' => 'bottom',
                        'positonX' => 'right'
                    ]);
                    return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
                }

            } else {
                Yii::$app->getSession()->setFlash('activity_update_fail', [
                    'type' => Growl::TYPE_DANGER,
                    'duration' => 5000,
                    'icon' => 'fa fa-close',
                    'title' => 'คำสั่งลมเหลว',
                    'message' => 'ไม่สามารถเทำรายการได้ เนื่องจากโครงการของคุณได้รับการอนุมัติแล้ว กรุณาติดต่อผู้ดูแลระบบ',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            }
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()) {
            Yii::$app->getSession()->setFlash('activity_delete_success', [
                'type' => Growl::TYPE_SUCCESS,
                'duration' => 5000,
                'icon' => 'fa fa-check',
                'title' => $model->activity_name,
                'message' => 'ลบกิจกรรมสำเร็จ',
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    protected function findModel($id)
    {
        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAll_files($activity_id)
    {
        $dat = new Activity();
        return $this->render('view_files', [
            'model' => $this->findModel($activity_id),
            'dat' => $dat,
        ]);
    }

    public function actionPreview($activity_id, $activity_name)
    {
        $mpdf = new Mpdf(['mode' => 's']);
        $model = $this->findModel($activity_id);
        $content = $this->renderPartial('activity_print', [
            'model' => $model,
        ]);

        //return $content;

        $stylesheet = "
        body{font-family: Garuda}
         .table {
            width: 100%;
            border-top:1px solid red;
            border-right:1px solid red;
            border-collapse:collapse;
            }
        .table td {
            padding: 7px;
            text-align:center;
        }

        ";

        $mpdf->SetHeader('||{PAGENO}');
//        $mpdf->SetFooter('|'.'ผู้รับผิดชอบ : '.$model->responsibleBy->responsible_by.'|');
//        $mpdf->SetWatermarkText('Deshario');
//        $mpdf->showWatermarkText = true;
//        $mpdf->margin_bottom_collapse = 5;

        $mpdf->AddPageByArray([
            'resetpagenum' => '1'
        ]);

        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($content, 2);
        $mpdf->Output($activity_name . ' - ฉบับสมบูรณ์', 'D');

    }
}
