<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'activity_id') ?>

    <?= $form->field($model, 'root_project_id') ?>

    <?= $form->field($model, 'activity_name') ?>

    <?= $form->field($model, 'activity_organization') ?>

    <?= $form->field($model, 'activity_rationale') ?>

    <?php // echo $form->field($model, 'activity_type') ?>

    <?php // echo $form->field($model, 'activity_place') ?>

    <?php // echo $form->field($model, 'activity_department') ?>

    <?php // echo $form->field($model, 'objective') ?>

    <?php // echo $form->field($model, 'evaluation') ?>

    <?php // echo $form->field($model, 'benefit') ?>

    <?php // echo $form->field($model, 'organization_organization_id') ?>

    <?php // echo $form->field($model, 'strategic_strategic_id') ?>

    <?php // echo $form->field($model, 'goal_goal_id') ?>

    <?php // echo $form->field($model, 'strategy_strategy_id') ?>

    <?php // echo $form->field($model, 'indicator_indicator_id') ?>

    <?php // echo $form->field($model, 'element_element_id') ?>

    <?php // echo $form->field($model, 'product_product_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
