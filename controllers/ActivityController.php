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
use kartik\mpdf\Pdf;
use Mpdf\Mpdf;
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
        if($project_status == Project::PROJECT_RUNNING){
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

                foreach($items['Activity']['activity_plan'] as $key => $val){
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

                $transaction->commit();

            }catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }
            $project_paomai = new ProjectPaomai();
            $project_paomai->project_quantity = $model->paomai_quantity;
            $project_paomai->project_quality = $model->paomai_quality;
            $project_paomai->save();

            $project_laksana = new ProjectLaksana();
            $project_laksana->project_type_id = $model->temp_type;
            $project_laksana->procced_id = $model->temp_procced;
            $project_laksana->save();

            $model->project_laksana_id = $project_laksana->laksana_id;
            $model->project_paomai_id = $project_paomai->paomai_id;
            $model->budget_details_id = $temp_project_budget_details_id;
            $model->project_plan_id = $temp_project_plan_id;
            $model->activity_status = Project::PROJECT_RUNNING;

            if($model->validate() && $model->save()){
                //return $this->redirect(['view', 'id' => $model->activity_id]);
                return $this->redirect(['/project/view', 'id' => $model->root_project_id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

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

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
        return $this->render('view_files', [
            'model' => $this->findModel($activity_id),
        ]);
    }

    public function actionPrint_activity($id)
    {
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('view', [
            'model' => $this->findModel($id),
        ]);


        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            //'cssFile' => '@web/css/boot.css',
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',

            //'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',
            'cssInline' => 'body {
                font-family: "garuda";
            }
            .kv-heading-1{font-size:18px}
            ',
            'options' => ['title' => 'Preview Report Case: '],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>[''],
                //'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();

        //$html = '<p style="font-family: garuda">test ฮาโล</p>';//$this->render('test');
//        $html = $this->render('view', [
//            'model' => $this->findModel(1),
//        ]);
//        $stylesheet = file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
//        $mpdf = new Mpdf();
//        $mpdf->WriteHTML($stylesheet, 1);
//        $mpdf->WriteHTML($html);
//        $mpdf->Output();

    }
}
