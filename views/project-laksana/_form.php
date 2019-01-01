<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectLaksana */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-laksana-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_type_id')->textInput() ?>

    <?= $form->field($model, 'procced_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
