<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
use kartik\file\FileInput;
use yii\helpers\Url;

$activity_id = Yii::$app->request->get('activity_id');
$project_id = Yii::$app->request->get('project_id');
$project_name = Yii::$app->request->get('project_name');
?>

<div class="activity-files-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']]); // important
    ?>

    <?= $form->field($model, 'items[]')->widget(FileInput::classname(), [
        'options' => [
            //'accept' => 'image/*',
            'multiple' => true
        ],
        'pluginOptions' => [
            'initialPreview'=>[],
            //'allowedFileExtensions'=>['pdf'],
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false
        ]
    ])->label(false); ?>

    <?= $form->field($model, 'temp_activity_id')->hiddenInput(['value'=> $activity_id])->label(false);?>
    <?= $form->field($model, 'temp_project_name')->hiddenInput(['value'=> $project_name])->label(false);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
