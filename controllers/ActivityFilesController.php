<?php

namespace app\controllers;

use app\models\Activity;
use app\models\Project;
use http\Exception;
use Yii;
use app\models\ActivityFiles;
use app\models\ActivityFilesSearch;
use yii\helpers\ArrayHelper;
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

    /**
     * Displays a single ActivityFiles model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new ActivityFiles();

        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir($model->temp_project_name);
            //$model->file_source = $this->uploadSingleFile($model);
            $model->file_source = $this->uploadMultipleFile($model);

            if($model->save()){
                $activity = Activity::find()->where(['activity_id' => $model->temp_activity_id])->one();
                $activity->activity_temp_files = $model->file_id;
                $activity->save();
                if(Yii::$app->request->referrer){
                    return $this->redirect(Yii::$app->request->referrer);
                }else{
                    return $this->goHome();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionDownload($id,$file,$file_name,$project_name){
        $model = $this->findModel($id);
        //return $project_name;
        if(!empty($project_name) && !empty($model->file_source)){
            Yii::$app->response->sendFile($model->getUploadPath().'/'.$project_name.'/'.$file,$file_name);
        }else{
            $this->redirect(['/freelance/view','id'=>$id]);
        }
    }

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

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = ActivityFiles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function CreateDir($folderName){
        if($folderName != NULL){
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
                $UploadedFile->saveAs($uploadPath.'/'.$model->temp_project_name.'/'.$newFileName);
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

    private function uploadMultipleFile($model,$tempFile=null){
        $files = [];
        $json = '';
        $tempFile = Json::decode($tempFile);
        $UploadedFiles = UploadedFile::getInstances($model,'items');
        if($UploadedFiles!==null){
            $uploadPath = ActivityFiles::getUploadPath();
            foreach ($UploadedFiles as $file) {
                try {   $oldFileName = $file->basename.'.'.$file->extension;
                    $newFileName = md5($file->basename.time()).'.'.$file->extension;
                    //$file->saveAs(Freelance::UPLOAD_FOLDER.'/'.$model->ref.'/'.$newFileName);
                    $file->saveAs($uploadPath.'/'.$model->temp_project_name.'/'.$newFileName);
                    $files[$newFileName] = $oldFileName ;
                } catch (Exception $e) {

                }
            }
            $json = json::encode(ArrayHelper::merge($tempFile,$files));
        }else{
            $json = $tempFile;
        }
        return $json;
    }
}
