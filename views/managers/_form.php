<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Managers;

/* @var $this yii\web\View */
/* @var $model app\Models\Yii2User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 8]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'roles')->dropDownList([
        Managers::ROLE_USER => $model->getRoles(Managers::ROLE_USER),
        Managers::ROLE_ADMIN => $model->getRoles(Managers::ROLE_ADMIN),
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
