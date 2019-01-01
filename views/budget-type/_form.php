<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BudgetType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="budget-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'budget_type_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
