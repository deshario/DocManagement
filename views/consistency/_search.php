<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConsistencySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consistency-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'consistency_id') ?>

    <?= $form->field($model, 'cons_strategic_id') ?>

    <?= $form->field($model, 'cons_goal_id') ?>

    <?= $form->field($model, 'cons_strategy_id') ?>

    <?= $form->field($model, 'cons_indicator_id') ?>

    <?php // echo $form->field($model, 'project_act_key') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
