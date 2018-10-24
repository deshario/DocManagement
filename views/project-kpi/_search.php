<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectKpiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-kpi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kpi_id') ?>

    <?= $form->field($model, 'kpi_name') ?>

    <?= $form->field($model, 'kpi_goal') ?>

    <?= $form->field($model, 'kpi_project_key') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
