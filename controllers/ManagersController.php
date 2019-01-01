<?php

namespace app\controllers;

use Exception;
use Yii;
use app\models\Managers;
use app\models\ManagersSearch;
use yii\helpers\Json;
use kartik\growl\Growl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ManagersController implements the CRUD actions for Managers model.
 */
class ManagersController extends Controller
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
     * Lists all Managers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ManagersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->query->where('roles = '.Managers::ROLE_USER);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Managers model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id,$rending = null)
    {
        if($rending === "ajax"){
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    public function randomString($length = 8) {
        $str = "";
        $characters = array_merge(range('A','Z'),range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    private function uploadSingleFile($model,$tempFile=null){
        $file = [];
        $json = '';
        $temp = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model,'picture');
            if($UploadedFile !== null){
                $uploadPath = Managers::getUploadPath();
                $temp = $model->username.'.'.$UploadedFile->extension;
                $FileName = $uploadPath.$temp;
                if(file_exists($FileName)){
                    @unlink($FileName);
                }
                $UploadedFile->saveAs($FileName);
            }else{
                $json=$tempFile;
            }
        } catch (Exception $e) {
            $json=$tempFile;
        }
        return $temp ;
    }

    public function actionCreate()
    {
        $model = new Managers();
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->setPassword($model->password);
            $model->generateAuthKey();
            $model->created_at = time();
            $model->updated_at = time();
            $model->picture = $this->uploadSingleFile($model);
            if($model->save()){
                return $this->redirect(['manage']);
            }
        } else {
            $model->username = $this->randomString(8);
            $model->email = strtolower($model->username).'@virtual.com';
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionChange_roles($id,$newRole)
    {
        $customText = '';
        $model = $this->findModel($id);
        $model->password = "deshario";
        if($newRole == Managers::ROLE_ADMIN){
            $model->roles = Managers::ROLE_ADMIN;
            $customText = 'ผู้ดูแลระบบ';
        }else{
            $model->roles = Managers::ROLE_USER;
            $customText = 'ผู้ใช้งานปกติ';
        }
        if($model->save()){
            Yii::$app->getSession()->setFlash('chane_role', [
                'type' =>  Growl::TYPE_SUCCESS,
                'duration' => 5000,
                'icon' => 'fa fa-key',
                'title' => 'เปลียนแปลงสิทธิ',
                'message' => $model->username." ได้รับสืทธิในการเข้าถึงเป็น".$customText,
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
        }
        return $this->redirect(['manage']);
    }

    public function actionManage()
    {
        $searchModel = new ManagersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->query->where('roles = '.User::ROLE_USER);
        $dataProvider->query->where('id <> '.Yii::$app->user->identity->id);

        return $this->render('manage', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Managers::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelv2($id,$key){
        if($model = Managers::find()
            ->where(['id' => $id, 'manager_key' => $key])
            //->where(['manager_key' => $key])
            ->one()){
            return $model;
        };
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelWithKey($key){
        if($model = Managers::find()
            ->where(['manager_key' => $key])
            ->one()){
            return $model;
        };
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDeactivate($id)
    {
        $model = $this->findModel($id);
        $model->status = Managers::STATUS_DELETED;
        $model->password = "deshario"; // Only For Validation
        if($model->save()){
            Yii::$app->getSession()->setFlash('login_success', [
                'type' =>  Growl::TYPE_DANGER,
                'duration' => 5000,
                'icon' => 'fa fa-lock fa-lg',
                'title' => $model->username.'ถูกปิดการใช้งาน',
                'message' => $model->username." จะไม่สามารถเข้าถึงระบบได้อีกต่อไป",
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
        }
        return $this->redirect(['manage']);
    }

    public function actionActivate($id)
    {
        $model = $this->findModel($id);
        $model->status = Managers::STATUS_ACTIVE;
        $model->password = "deshario"; // Only For Validation
        if($model->save()){
            Yii::$app->getSession()->setFlash('login_success', [
                'type' =>  Growl::TYPE_SUCCESS,
                'duration' => 5000,
                'icon' => 'fa fa-unlock fa-lg',
                'title' => $model->username.' ถูกเปิดการใช้งาน',
                'message' => $model->username." ได้รับสืทธิในการเข้าถึงระบบเรียบร้อย",
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
        }
        return $this->redirect(['manage']);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())){
            $model->setPassword($model->password);
            $model->save();
            return $this->redirect(['manage']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['manage']);
    }
}
