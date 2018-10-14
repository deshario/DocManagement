<?php

namespace app\controllers;

use app\models\BudgetDetails;
use app\models\Element;
use app\models\Goal;
use app\models\Indicator;
use app\models\Organization;
use app\models\Project;
use app\models\ProjectLaksana;
use app\models\ProjectPaomai;
use app\models\ProjectPlan;
use app\models\ProjectSearch;
use app\models\Strategic;
use app\models\Strategy;
use kartik\growl\Growl;
use Yii;
use app\models\Activity;
use app\models\ActivitySearch;
use yii\base\Model;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

    public function actionIndex($project_id,$project_name,$project_status = 10)
    {
        if($project_status == Project::PROJECT_ACTIVE){
            //$searchModel = new ActivitySearch();
            $searchModel = new ProjectSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->where('project_id = '.$project_id);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            Yii::$app->getSession()->setFlash('login_success', [
                'type' =>  Growl::TYPE_DANGER,
                'duration' => 5000,
                'icon' => 'fa fa-close',
                'title' => 'คำสั่งลมเหลว',
                'message' => 'โครงการของคุณยังไม่ได้รับอนุญาติจากผู้ดูและระบบ กรุณาติดต่อผู้ดูและระบบ',
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
            //return $this->redirect(['/project/index']);
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
    }

    public function actionFiltering($project_id)
    {
        $searchModel = new ActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('root_project_id = '.$project_id);

        $data = $this->renderPartial('filtering',[
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

    /**
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Activity();
        if ($model->load(Yii::$app->request->post())){
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $temp_project_plan_id = 0;
                $temp_project_budget_details_id = 0;
                $items = Yii::$app->request->post();
                $user_id = Yii::$app->user->identity->id;
                $model->root_project_id = Yii::$app->request->get('proj_id');

                foreach($items['Activity']['project_plan_id'] as $key => $val){
                    $budget_details = new BudgetDetails();
                    $budget_details->detail_name = $val['plan_detail'];
                    $budget_details->detail_price = $val['plan_amount'];
                    $budget_details->activity_id = 1;
                    $budget_details->save();
                    $temp_project_budget_details_id = $budget_details->detail_id;
                }

                foreach($items['Activity']['temp_project_plan_id'] as $key => $val){
                    $project_plan = new ProjectPlan();
                    $project_plan->plan_process = $val['plan_process'];
                    $project_plan->plan_detail = $val['plan_detail'];
                    $project_plan->plan_date = $val['plan_date'];
                    $project_plan->plan_place = $val['plan_place'];
                    $project_plan->plan_owner = $user_id;
                    $project_plan->save();
                    $temp_project_plan_id = $project_plan->plan_id;
                }

                $project_laksana = new ProjectLaksana();
                $project_laksana->project_type_id = $model->temp_type;
                $project_laksana->procced_id = $model->temp_procced;
                $project_laksana->save();

                $project_paomai = new ProjectPaomai();
                $project_paomai->project_quantity = $model->paomai_quantity;
                $project_paomai->project_quality = $model->paomai_quality;
                $project_paomai->save();

                $model->project_paomai_id = $project_paomai->paomai_id;
                $model->project_laksana_id = $project_laksana->laksana_id;
                $model->budget_details_id = $temp_project_budget_details_id;
                $model->project_plan_id = $temp_project_plan_id;
                $model->activity_status = Project::PROJECT_ACTIVE;

                $transaction->commit();

            if($model->validate() && $model->save()){
                //return $this->redirect(['view', 'id' => $model->activity_id]);
                return $this->redirect(['/project/view', 'id' => $model->root_project_id]);
            }

            }catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->activity_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Activity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
