<?php

namespace app\controllers;

use app\models\Activity;
use app\models\Project;
use Codeception\Module\Yii2;
use kartik\growl\Growl;
use Mpdf\Mpdf;
use Yii;
use app\models\ActivityFiles;
use app\models\ActivityFilesSearch;
use yii\base\Exception;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ActivityFilesController implements the CRUD actions for ActivityFiles model.
 */
class ActivityFilesController extends Controller
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
     * Lists all ActivityFiles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActivityFilesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFormat($activity_id){
        $files = ActivityFiles::find()->where(['activity_id' => $activity_id])->all();
        foreach($files as $delete){
            $delete->delete();
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function Merge($activity_name, $files)
    {
        $pdf = new mPDF();
        $pdf->enableImports = true;
        //$path = Yii::getAlias('@webroot').'/files/merged/';
        //$tempfile = Yii::getAlias('@webroot').'/files/cv.pdf';
        //$tempfile2 = Yii::getAlias('@webroot').'/files/bloodbank.pdf';
        //$files = array($tempfile,$tempfile2);
        foreach ($files as $file) {
            $pdf->SetImportUse();
            $pagecount = $pdf->SetSourceFile($file);
            for ($i = 1; $i <= ($pagecount); $i++) {
                $pdf->AddPage();
                $import_page = $pdf->ImportPage($i);
                $pdf->UseTemplate($import_page);
            }
        }
        $pdf_name = date('Y-m-d_His') . '.pdf';
        //$pdf_path = $path . $pdf_name;
        //Make sure path exists
        //if (!file_exists($path)) {
        //    mkdir($path, 0777);
        //}
        //$pdf->Output($pdf_name, 'D');
        $pdf->Output($activity_name . ' - ฉบับสมบูรณ์', 'D');
        unset($pdf);
        //return $pdf_path;
    }

    public function generateLastPage($activity_name){
        $mpdf = new Mpdf(['mode' => 's']);
        $content = $this->renderPartial('lastpage');
        $stylesheet = "body{font-family: Garuda}";
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($content,2);
        $dir = Yii::getAlias('@webroot') . '/uploads/activity_files/' . $activity_name . '/';
        $mpdf->Output($dir.'lastpage.pdf', 'F');
        return $dir.'lastpage.pdf';
    }

    public function actionCustom($id, $type = null)
    {
        $model = new ActivityFiles();
        $searchModel = new ActivityFilesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('activity_id = ' . $id);

        if ($model->load(Yii::$app->request->post())) {
            $activity_name = $model->temp_activity_name;
            $myArray = explode(',', $model->file_source);
            $dir = Yii::getAlias('@webroot') . '/uploads/activity_files/' . $activity_name . '/';

            $small_files = array();

            foreach ($myArray as $i => $item) {
                $id = $myArray[$i];
                $arr = json_decode($this->getFileSource($id), true);
                foreach ($arr as $key => $value) {
                    $temp_key = $key;
                    $temp_value = $value;
                    $name = $dir . $temp_key;
                    array_push($small_files, $name);
                }
            }
            $lastPage = $this->generateLastPage($activity_name);
            array_push($small_files, $lastPage);
            $this->Merge($activity_name, $small_files);

            Yii::$app->getSession()->setFlash('merge_success', [
                'type' => Growl::TYPE_SUCCESS,
                'duration' => 3000,
                'icon' => 'fa fa-check',
                'title' => 'Activity',
                'message' => 'Merge Complete',
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);

        } else {
            if ($type == 1) { // TABS-X
                $data = $this->renderAjax('custom', [
                    'model' => $model, // For getting reorder merging
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
                return Json::encode($data);
            } else { // For Testing Via URL
                return $this->render('custom', [
                    'model' => $model, // For getting reorder merging
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }
        }
    }

    public function getFileSource($id)
    {
        return ActivityFiles::find()->where('file_id = ' . $id)->one()->file_source;
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ActivityFiles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ActivityFiles();

        if ($model->load(Yii::$app->request->post())) {
            //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $this->CreateDir($model->temp_activity_name);
            $uploaded = $this->uploadSingleFile($model);
            if ($uploaded != '' || $uploaded != null) {
                $model->file_source = $uploaded;
                $model->activity_id = $model->temp_activity_id;
                if ($model->validate() && $model->save()) {
                    Yii::$app->getSession()->setFlash('activity_file_upload_ok', [
                        'type' => Growl::TYPE_SUCCESS,
                        'duration' => 3000,
                        'icon' => 'fa fa-check',
                        'title' => $model->temp_activity_name,
                        'message' => 'ไฟล์บันทึกสำเร็จ',
                        'positonY' => 'bottom',
                        'positonX' => 'right'
                    ]);
                } else {
                    return $model->getErrors();
                }
            } else {
                Yii::$app->getSession()->setFlash('activity_file_upload_fail', [
                    'type' => Growl::TYPE_DANGER,
                    'duration' => 3000,
                    'icon' => 'fa fa-close',
                    'title' => 'คำสั่งลมเหลว',
                    'message' => 'ไม่สามารถบันทึกไฟล์ของคุณได้',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            }
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        } else {
            $status = Yii::$app->request->get('project_status');
            if ($status == Project::PROJECT_RUNNING) {
                return $this->render('create', [
                    'model' => $model,
                ]);
            } else {
                Yii::$app->getSession()->setFlash('project_permission_fail', [
                    'type' => Growl::TYPE_DANGER,
                    'duration' => 3000,
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

    /**
     * Updates an existing ActivityFiles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->file_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ActivityFiles model.
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
     * Finds the ActivityFiles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ActivityFiles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ActivityFiles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function CreateDir($folderName)
    {
        if ($folderName != NULL) {
            $basePath = ActivityFiles::getUploadPath();
            try {
                if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                    $temp = 1;
                    // BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
                }
            } catch (\yii\base\Exception $e) {
            }
        }
        return;
    }

    private function uploadSingleFile($model, $tempFile = null)
    {
        $file = [];
        $json = '';
        $newFileName = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model, 'file_source');
            if ($UploadedFile !== null) {
                $uploadPath = ActivityFiles::getUploadPath();
                $oldFileName = $UploadedFile->basename . '.' . $UploadedFile->extension;
                $newFileName = md5($UploadedFile->basename . time()) . '.' . $UploadedFile->extension;
                $file[$newFileName] = $oldFileName;
                if ($UploadedFile->saveAs($uploadPath . '/' . $model->temp_activity_name . '/' . $newFileName)) {
                    $json = Json::encode($file);
                } else {
                    $json = $tempFile;
                }
            } else {
                $json = $tempFile;
            }
        } catch (Exception $e) {
            $json = $tempFile;
        }
        return $json;
//        return $newFileName;
    }
}
