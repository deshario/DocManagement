<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectPlan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-plan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plan_process')->textInput() ?>

    <?= $form->field($model, 'plan_detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'plan_date')->textInput() ?>

    <?= $form->field($model, 'plan_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plan_owner')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
