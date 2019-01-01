<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BudgetDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="budget-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'detail_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail_price')->textInput() ?>

    <?= $form->field($model, 'activity_key')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
