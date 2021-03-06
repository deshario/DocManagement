<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use kartik\range\RangeInput;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\Models\Yii2User */

$this->title = 'สร้าง';
$this->params['breadcrumbs'][] = ['label' => 'ผู้ใช้งาน'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">


    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">เพิ่มผู้ใช้งาน</h3>
        </div>
        <div class="box-body">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'picture')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*', 'multiple' => false],
                'pluginOptions' => [
                    'previewFileType' => 'image',
                    'showPreview' => true,
                    'showCaption' => true,
                    'showRemove' => false,
                    'showUpload' => false,
                    'initialPreview'=>$model->initialPreview($model->picture),
                    'overwriteInitial' => false,
                ],
            ]);
            ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'status')->dropDownList([
                User::STATUS_ACTIVE => $model->getStatus(User::STATUS_ACTIVE),
                User::STATUS_DELETED => $model->getStatus(User::STATUS_DELETED),
            ],['prompt' => 'กรุณาเลือกสถานะ']) ?>

            <?= $form->field($model, 'roles')->dropDownList([
                User::ROLE_USER => $model->getRoles(User::ROLE_USER),
                User::ROLE_ADMIN => $model->getRoles(User::ROLE_ADMIN),
            ],['prompt' => 'กรุณาเลือกบทบาทการใช้งาน']) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
