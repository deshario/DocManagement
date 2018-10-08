<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectPlan */

$this->title = 'Update Project Plan: ' . $model->plan_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->plan_id, 'url' => ['view', 'id' => $model->plan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-plan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
