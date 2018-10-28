<?php

namespace app\controllers;

use app\components\AccessRule;
use app\models\Activity;
use app\models\ActivityFiles;
use app\models\LastPage;
use app\models\Managers;
use app\models\Procced;
use app\models\ProjectKpi;
use app\models\ProjectLaksana;
use app\models\ProjectPaomai;
use app\models\ProjectPlan;
use app\models\ProjectType;
use http\Exception;
use kartik\growl\Growl;
use Mpdf\Mpdf;
use Yii;
use app\models\Project;
use app\models\ProjectSearch;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{

    public $enableCsrfValidation = false; // HTTP REQUEST METHOD SECURITY

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className()
                ],
                'only' => ['index', 'create', 'update', 'delete',],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => [
                            Managers::ROLE_ADMIN,
                        ],
                    ],
                    [
                        'actions' => ['mine', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => [
                            Managers::ROLE_USER,
                        ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    //'create_request'=>['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMine()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('created_by = ' . Yii::$app->user->identity->id);
        return $this->render('user_index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Project();
        if ($model->load(Yii::$app->request->post())) {
            $user_id = Yii::$app->user->identity->id;
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $randomString = \app\models\Managers::getRandomKey(15);
                $items = Yii::$app->request->post();
                $temp_project_kpi_id = 0;
                $temp_project_plan_id = 0;
                $temp_lastpage_id = 0;

                //var_dump($items['Project']['temp_project_kpi_id']);
                //var_dump($items['Project']['temp_project_plan_id']);

                foreach ($items['Project']['temp_project_kpi_id'] as $key => $val) {
                    $project_kpi = new ProjectKpi();
                    $project_kpi->kpi_name = $val['kpi_name'];
                    $project_kpi->kpi_goal = $val['kpi_goal'];
                    $project_kpi->kpi_project_key = $randomString;
                    $project_kpi->save();
                    $temp_project_kpi_id = $project_kpi->kpi_id;
                }

                foreach ($items['Project']['temp_project_plan_id'] as $key => $val) {
                    $project_plan = new ProjectPlan();
                    $project_plan->plan_process = $val['plan_process'];
                    $project_plan->plan_detail = $val['plan_detail'];
                    $project_plan->plan_date = $val['plan_date'];
                    $project_plan->plan_place = $val['plan_place'];
                    $project_plan->plan_project_key = $randomString;
                    $project_plan->save();
                    $temp_project_plan_id = $project_plan->plan_id;
                }

                foreach ($items['Project']['lastpage_main'] as $key => $val) {
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
            $project_paomai->save();

            $project_laksana = new ProjectLaksana();
            $project_laksana->project_type_id = $model->temp_type;
            $project_laksana->procced_id = $model->temp_procced;
            $project_laksana->save();

            $model->projecti_paomai_id = $project_paomai->paomai_id;
            $model->created_by = Yii::$app->user->identity->id;
            $model->project_status = Project::PROJECT_RUNNING;
            $model->project_laksana_id = $project_laksana->laksana_id;
            $model->project_kpi_id = $temp_project_kpi_id;
            $model->project_plan_id = $temp_project_plan_id;
            $model->lastpage_id = $temp_lastpage_id;

            $model->temp_project_kpi_id = \yii\helpers\Json::encode($model->temp_project_kpi_id);
            $model->temp_project_plan_id = \yii\helpers\Json::encode($model->temp_project_plan_id);
            $model->lastpage_main = \yii\helpers\Json::encode($model->lastpage_main);

            if ($model->validate()){
                $model->project_key = $randomString;
                $model->save();
                Yii::$app->getSession()->setFlash('project_create_new', [
                    'type' =>  Growl::TYPE_SUCCESS,
                    'duration' => 3000,
                    'icon' => 'fa fa-check',
                    'title' => $model->project_name,
                    'message' => 'โครงการของคุณได้รับการบันทึกแล้ว',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['/site/routing']);
            } else {
                //return $model->getErrors();
                return $this->redirect(['/site/routing']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->temp_type = $model->projectLaksana->projectType->type_id;
        $model->temp_procced = $model->projectLaksana->procced->procced_id;

        $model->temp_project_kpi_id = ProjectKpi::find()->where(['kpi_project_key' => $model->project_key])->all();
        $model->temp_project_plan_id = ProjectPlan::find()->where(['plan_project_key' => $model->project_key])->all();
        $model->lastpage_main = LastPage::find()->where(['project_act_key' => $model->project_key])->all();

        $model->paomai_quantity = ProjectPaomai::find()->where(['paomai_id' => $model->projecti_paomai_id])->one()->project_quantity;
        $model->paomai_quality = ProjectPaomai::find()->where(['paomai_id' => $model->projecti_paomai_id])->one()->project_quality;

        if ($model->load(Yii::$app->request->post())) {
            $project_kpi = ProjectKpi::find()->where(['kpi_project_key' => $model->project_key])->all();
            $project_plan = ProjectPlan::find()->where(['plan_project_key' => $model->project_key])->all();
            $lastpages = LastPage::find()->where(['project_act_key' => $model->project_key])->all();
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $items = Yii::$app->request->post();
                $temp_project_kpi_id = 0;
                $temp_project_plan_id = 0;
                $temp_lastpage_id = 0;

                foreach($project_kpi as $delete){
                    $delete->delete();
                }
                foreach($project_plan as $delete2){
                    $delete2->delete();
                }
                foreach($lastpages as $delete3){
                    $delete3->delete();
                }

                foreach ($items['Project']['temp_project_kpi_id'] as $key => $val) {
                    $project_kpi = new ProjectKpi();
                    $project_kpi->kpi_name = $val['kpi_name'];
                    $project_kpi->kpi_goal = $val['kpi_goal'];
                    $project_kpi->kpi_project_key = $model->project_key;
                    $project_kpi->save();
                    $temp_project_kpi_id = $project_kpi->kpi_id;
                }

                foreach ($items['Project']['temp_project_plan_id'] as $key => $val) {
                    $project_plan = new ProjectPlan();
                    $project_plan->plan_process = $val['plan_process'];
                    $project_plan->plan_detail = $val['plan_detail'];
                    $project_plan->plan_date = $val['plan_date'];
                    $project_plan->plan_place = $val['plan_place'];
                    $project_plan->plan_project_key = $model->project_key;
                    $project_plan->save();
                    $temp_project_plan_id = $project_plan->plan_id;
                }

                foreach ($items['Project']['lastpage_main'] as $key => $val) {
                    $lastpage = new LastPage();
                    $lastpage->last_role = $val['last_role'];
                    $lastpage->last_user = $val['last_user'];
                    $lastpage->last_position = $val['last_position'];
                    $lastpage->project_act_key = $model->project_key;
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
            $project_paomai->save();

            $project_laksana = new ProjectLaksana();
            $project_laksana->project_type_id = $model->temp_type;
            $project_laksana->procced_id = $model->temp_procced;
            $project_laksana->save();

            $model->projecti_paomai_id = $project_paomai->paomai_id;
            $model->created_by = Yii::$app->user->identity->id;
            $model->project_status = Project::PROJECT_RUNNING;
            $model->project_laksana_id = $project_laksana->laksana_id;
            $model->project_kpi_id = $temp_project_kpi_id;
            $model->project_plan_id = $temp_project_plan_id;
            $model->lastpage_id = $temp_lastpage_id;

            $model->temp_project_kpi_id = \yii\helpers\Json::encode($model->temp_project_kpi_id);
            $model->temp_project_plan_id = \yii\helpers\Json::encode($model->temp_project_plan_id);
            $model->lastpage_main = \yii\helpers\Json::encode($model->lastpage_main);

            if ($model->validate()){
                $model->save();
                Yii::$app->getSession()->setFlash('project_update_ok', [
                    'type' =>  Growl::TYPE_SUCCESS,
                    'duration' => 3000,
                    'icon' => 'fa fa-check',
                    'title' => $model->project_name,
                    'message' => 'โครงการของคุณได้รับการปรับปรุงแล้ว',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['index']);
            } else {
                //return $model->getErrors();
                return $this->redirect(['/site/routing']);
            }
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
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAccept($project_id)
    { // lock project อนุมัติ
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isPost) {
            $model = Project::find()->where(['project_id' => $project_id])->one();
            $model->project_status = Project::PROJECT_FINISHED;
            if($model->save()){
                Yii::$app->getSession()->setFlash('project_accept_ok', [
                    'type' =>  Growl::TYPE_SUCCESS,
                    'duration' => 3000,
                    'icon' => 'fa fa-check',
                    'title' => $model->project_name,
                    'message' => 'อนุมัติโครงการสำเร็จ',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            }else{
                Yii::$app->getSession()->setFlash('project_accept_fail', [
                    'type' =>  Growl::TYPE_DANGER,
                    'duration' => 3000,
                    'icon' => 'fa fa-close',
                    'title' => 'คำสั่งลมเหลว',
                    'message' => 'ไม่สามารถอนุมัติได้เนื่องจากโครงการของคุณข้อมูลยังไม่ครบ',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            }
        }
        return $this->redirect(['index']);
    }

    public function actionDeny($project_id)
    { // unlock project ไม่อนุมัติ
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isPost) {
            $model = Project::find()->where(['project_id' => $project_id])->one();
            $model->project_status = Project::PROJECT_RUNNING;
            if($model->save()){
                Yii::$app->getSession()->setFlash('project_accept_ok', [
                    'type' =>  Growl::TYPE_SUCCESS,
                    'duration' => 3000,
                    'icon' => 'fa fa-check',
                    'title' => $model->project_name,
                    'message' => 'ดำเนินการโครงการสำเร็จ',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            }else{
                Yii::$app->getSession()->setFlash('project_accept_fail', [
                    'type' =>  Growl::TYPE_DANGER,
                    'duration' => 3000,
                    'icon' => 'fa fa-close',
                    'title' => 'คำสั่งลมเหลว',
                    'message' => 'ไม่สามารถดำเนินการได้เนื่องจากโครงการของคุณข้อมูลยังไม่ครบ',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            }
        }
        return $this->redirect(['index']);
    }

    private function uploadSingleFile($model,$tempFile=null){
        $file = [];
        $json = '';
        $newFileName = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model,'file_source');
            if($UploadedFile !== null){
                $uploadPath = ActivityFiles::getUploadPath();
                $oldFileName = $UploadedFile->basename.'.'.$UploadedFile->extension;
                $newFileName = md5($UploadedFile->basename.time()).'.'.$UploadedFile->extension;
                $UploadedFile->saveAs($uploadPath.'/'.$newFileName);
                //$UploadedFile->saveAs($uploadPath.'/'.$model->temp_project_name.'/'.$newFileName);
                //$UploadedFile->saveAs(ActivityFiles::UPLOAD_FOLDER.'/'.$newFileName);
                $file[$newFileName] = $oldFileName;
                $json = Json::encode($file);
            }else{
                $json=$tempFile;
            }
        } catch (Exception $e) {
            $json=$tempFile;
        }
//        return $json ;
        return $newFileName ;
    }

    public function actionPreview($project_id, $project_name) {
        //$mpdf = new Mpdf(['mode' => 's']);
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/mpdf/temp']);
        $model = $this->findModel($project_id);
         $content  = $this->renderPartial('project_print', [
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
        //$mpdf->SetFooter('|'.'ผู้รับผิดชอบ : '.$model->responsibler->responsible_by.'|');
       // $mpdf->SetWatermarkText('Deshario');
        //$mpdf->showWatermarkText = true;
        //$mpdf->margin_bottom_collapse = 5;

        $mpdf->AddPageByArray([
            'resetpagenum' => '1'
        ]);

        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($content,2);
        $mpdf->Output($project_name . ' - ฉบับสมบูรณ์', 'D');

    }
}
