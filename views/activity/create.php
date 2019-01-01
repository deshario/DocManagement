<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
$project_id = Yii::$app->request->get('proj_id');
$project_name = Yii::$app->request->get('proj_name');
$project_status = Yii::$app->request->get('proj_status');
$this->title = 'เพิ่มกิจกรรม';
$this->params['breadcrumbs'][] = ['label' => $project_name, 'url' => ['index',
    'project_id' => $project_id,
    'project_name' => $project_name,
    'project_status' => $project_status,
]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-create">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $this->title; ?></h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
                'tempGoal' => [],
                'tempStrategy' => [],
                'tempIndicator' => [],
            ]) ?>
        </div>
    </div>

</div>
