<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LastPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="last-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'last_id')->textInput() ?>

    <?= $form->field($model, 'last_role')->textInput() ?>

    <?= $form->field($model, 'last_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_act_key')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
