<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'project_id') ?>

    <?= $form->field($model, 'project_name') ?>

    <?= $form->field($model, 'organization_id') ?>

    <?= $form->field($model, 'responsibler_id') ?>

    <?= $form->field($model, 'project_laksana_id') ?>

    <?php // echo $form->field($model, 'strategic_id') ?>

    <?php // echo $form->field($model, 'goal_id') ?>

    <?php // echo $form->field($model, 'realted_subject_id') ?>

    <?php // echo $form->field($model, 'strategy_id') ?>

    <?php // echo $form->field($model, 'indicator_id') ?>

    <?php // echo $form->field($model, 'element_id') ?>

    <?php // echo $form->field($model, 'product_id') ?>

    <?php // echo $form->field($model, 'rationale') ?>

    <?php // echo $form->field($model, 'objective') ?>

    <?php // echo $form->field($model, 'project_kpi_id') ?>

    <?php // echo $form->field($model, 'projecti_paomai_id') ?>

    <?php // echo $form->field($model, 'lakshana_activity') ?>

    <?php // echo $form->field($model, 'project_plan_id') ?>

    <?php // echo $form->field($model, 'project_duration') ?>

    <?php // echo $form->field($model, 'project_location') ?>

    <?php // echo $form->field($model, 'project_evaluation') ?>

    <?php // echo $form->field($model, 'project_benefit') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'project_money') ?>

    <?php // echo $form->field($model, 'budget_budget_type') ?>

    <?php // echo $form->field($model, 'project_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
