<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectPaomai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-paomai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_quantity')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'project_quality')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'project_time')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
