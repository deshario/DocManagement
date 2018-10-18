<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->activity_name;
//$this->params['breadcrumbs'][] = ['label' => 'โครงการ', 'url' => ['index', 'project_id' => $model->rootProject->project_id, 'project_name' => $model->rootProject->project_name]];
$this->params['breadcrumbs'][] = ['label' => 'โครงการ', 'url' => '#'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $this->title; ?></h3>
        </div>
        <div class="panel-body">

            <?php echo $model->listDownloadFiles($model->activityTempFiles->file_source,$model->rootProject->project_name); ?>

                <?= Html::submitButton('Merge', ['class' => 'btn btn-success']) ?>


        </div>
    </div>

</div>
