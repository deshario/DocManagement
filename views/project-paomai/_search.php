<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectPaomaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-paomai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'paomai_id') ?>

    <?= $form->field($model, 'paomai_type') ?>

    <?= $form->field($model, 'paomai_value') ?>

    <?= $form->field($model, 'paomai_owner') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
