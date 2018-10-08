<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectPlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'plan_id') ?>

    <?= $form->field($model, 'plan_process') ?>

    <?= $form->field($model, 'plan_detail') ?>

    <?= $form->field($model, 'plan_date') ?>

    <?= $form->field($model, 'plan_place') ?>

    <?php // echo $form->field($model, 'plan_owner') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
