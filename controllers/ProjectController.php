<?php

namespace app\controllers;

use app\components\AccessRule;
use app\models\Activity;
use app\models\Managers;
use app\models\Procced;
use app\models\ProjectKpi;
use app\models\ProjectLaksana;
use app\models\ProjectPaomai;
use app\models\ProjectPlan;
use app\models\ProjectType;
use http\Exception;
use Yii;
use app\models\Project;
use app\models\ProjectSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
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
        $dataProvider->query->where('created_by = '.Yii::$app->user->identity->id);
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

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();
        if ($model->load(Yii::$app->request->post())) {
            $user_id = Yii::$app->user->identity->id;
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $items = Yii::$app->request->post();
                $temp_project_kpi_id = 0;
                $temp_project_plan_id = 0;

                //var_dump($items['Project']['temp_project_kpi_id']);
                //var_dump($items['Project']['temp_project_plan_id']);

                foreach($items['Project']['temp_project_kpi_id'] as $key => $val){
                    $project_kpi = new ProjectKpi();
                    $project_kpi->kpi_name = $val['kpi_name'];
                    $project_kpi->kpi_goal = $val['kpi_goal'];
                    $project_kpi->kpi_owner = $user_id;
                    $project_kpi->save();
                    $temp_project_kpi_id = $project_kpi->kpi_id;
                }

                foreach($items['Project']['temp_project_plan_id'] as $key => $val){
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

            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }

            $project_paomai = new ProjectPaomai();
            $project_paomai->paomai_type = $project_paomai->paomai_quantity;
            $project_paomai->paomai_value = $model->paomai_type_1;
            $project_paomai->paomai_owner = $user_id;
            $project_paomai->save();

            $project_paomai = new ProjectPaomai();
            $project_paomai->paomai_type = $project_paomai->paomai_quality;
            $project_paomai->paomai_value = $model->paomai_type_2;
            $project_paomai->paomai_owner = $user_id;
            $project_paomai->save();

            $project_laksana = new ProjectLaksana();
            $project_laksana->project_type_id = $model->temp_type;
            $project_laksana->procced_id = $model->temp_procced;
            $project_laksana->save();

            $model->projecti_paomai_id = $project_paomai->paomai_id;
            $model->created_by = Yii::$app->user->identity->id;
            $model->project_status = Project::PROJECT_ACTIVE;
            $model->project_laksana_id = $project_laksana->laksana_id;
            $model->project_kpi_id = $temp_project_kpi_id;
            $model->project_plan_id = $temp_project_plan_id;

            $model->temp_project_kpi_id = \yii\helpers\Json::encode($model->temp_project_kpi_id);
            $model->temp_project_plan_id = \yii\helpers\Json::encode($model->temp_project_plan_id);

            if ($model->validate() && $model->save()) {
                $activity = new Activity();
                $activity->root_project_id = $model->project_id;
                $activity->activity_name = 'กิจกรรมเริมต้น';
                $activity->save();
                //return $this->redirect(['view', 'id' => $model->project_id]);
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

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->project_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Project model.
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
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAccept($project_id)
    {
        if (Yii::$app->request->isPost) {
            $model = $this->findModel($project_id);
            $model->project_status = Project::PROJECT_ACTIVE;
            $model->save();
        }
        return $this->redirect(['index']);
    }

    public function actionDeny($project_id)
    {
        if (Yii::$app->request->isPost) {
            $model = $this->findModel($project_id);
            $model->project_status = Project::PROJECT_DEACTIVE;
            $model->save();
        }
        return $this->redirect(['index']);
    }
}
