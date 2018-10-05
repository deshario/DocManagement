<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Responsibler */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsibler-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'responsible_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
