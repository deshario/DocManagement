<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

?>

<div class="project-files-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'file_source')->widget(FileInput::classname(), [
//        'options' => [
//            'accept' => 'image/*',
//            //'multiple' => true
//        ],
        'pluginOptions' => [
            //'allowedFileExtensions'=>['pdf','doc','docx','xls','xlsx'],
            'allowedFileExtensions'=>['pdf'],
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false,
            'overwriteInitial'=>false
        ]
    ]); ?>

    <?= $form->field($model, 'temp_project_id')->hiddenInput(['value'=> $project_id])->label(false);?>
    <?= $form->field($model, 'temp_project_name')->hiddenInput(['value'=> $project_name])->label(false);?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-block btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
