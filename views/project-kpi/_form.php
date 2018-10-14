<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectKpi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-kpi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kpi_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpi_goal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpi_owner')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>