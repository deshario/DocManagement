<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectPaomai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-paomai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paomai_type')->textInput() ?>

    <?= $form->field($model, 'paomai_value')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'paomai_owner')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
