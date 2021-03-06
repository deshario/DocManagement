<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

?>

<div class="activity-files-form">

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

    <?= $form->field($model, 'temp_activity_name')->hiddenInput(['value'=> $activity_name])->label(false);?>
    <?= $form->field($model, 'temp_activity_id')->hiddenInput(['value'=> $activity_id])->label(false);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
