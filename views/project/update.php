<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'โครงการทั้งหมด', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_name, 'url' => '#'];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="project-update">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$this->title;?></h3>
        </div>
        <div class="panel-body">
            <?=$this->render('_form', [
    'model' => $model,
    'tempGoal' => $tempGoal,
    'tempStrategy' => $tempStrategy,
    'tempIndicator' => $tempIndicator,
])?>
        </div>
    </div>

</div>
