<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use unclead\multipleinput\MultipleInput;
use kartik\file\FileInput;

$project_id = Yii::$app->request->get('proj_id');
$project_name = Yii::$app->request->get('proj_name');

$this->title = 'จัดการไฟล์';
$this->params['breadcrumbs'][] = ['label' => $project_name, 'url' => ['/site/routing']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php $form = ActiveForm::begin(); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?= $form->field($model, 'file')->widget(MultipleInput::className(), [
            'max' => 4,
            'columns' => [
                [
                    'name'  => 'plan_process',
                    'type'  => 'dropDownList',
                    'title' => 'ชนิดของไฟล์',
                    'defaultValue' => 1,
                    'items' => [
                        1 => 'ปก',
                        2 => 'คำนำ',
                        3 => 'สารบัญ',
                        4 => 'แบบรายงานผลการดำเนินโครงการ',
                        5 => 'สำเนา บันทึกข้อความขออนุญาติโครงการใหญ่',
                        6 => 'สำเนา โครงการใหญ่',
                        7 => 'สำเนา บันทึกข้อความข้ออนุมัติกิจกรรม',
                        8 => 'สำเนา กิจกรรม',
                        9 => 'สำเนา สรุปค่าใช้จ่ายของโครงการ/กิจกรรม',
                    ]
                ],
                [
                    'name' => 'file',
                    'type' => FileInput::className(),
                    'options' => [
                        'pluginOptions' => [
                            'allowedFileExtensions' => ['pdf'],
                            'initialPreview'=>[
                                //add url here from current attribute
                            ],
                            'showPreview' => false,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false,
                        ]
                    ]
                ],
            ]
        ])->label(false); ?>

        <div class="form-group">
            <?= Html::submitButton('บันทึกการเปลียนแปลง', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
</div>

<?php ActiveForm::end(); ?>
