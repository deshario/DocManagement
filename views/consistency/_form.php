<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Consistency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consistency-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cons_strategic_id')->textInput() ?>

    <?= $form->field($model, 'cons_goal_id')->textInput() ?>

    <?= $form->field($model, 'cons_strategy_id')->textInput() ?>

    <?= $form->field($model, 'cons_indicator_id')->textInput() ?>

    <?= $form->field($model, 'project_act_key')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
