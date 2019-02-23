<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ElementProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="element-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ep_element_id')->textInput() ?>

    <?= $form->field($model, 'ep_product_id')->textInput() ?>

    <?= $form->field($model, 'project_act_key')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
