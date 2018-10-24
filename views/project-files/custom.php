<?php

use kartik\sortable\Sortable;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\sortinput\SortableInput;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivityFilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activity Files';
$this->params['breadcrumbs'][] = $this->title;
$project_name = 0;
?>
<div class="activity-files-index">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    if ($dataProvider->totalCount > 0) {
        foreach ($dataProvider->models as $key) {
            $items[$key->file_id] = [
                'content' => $key->file_source,
                'options' => ['data' => ['file_id'=>$key->file_source]],
            ];
            $project_name = $key->project->project_name;
        }
        echo $form->field($model, 'file_source')->widget(SortableInput::classname(), [
            'items' => $items,
            'hideInput' => true,
            'options' => ['class' => 'form-control', 'readonly' => true]
        ]);
        echo $form->field($model, 'temp_project_name')->hiddenInput(['value'=> $project_name])->label(false);
        echo Html::submitButton('ผสานไฟล์', ['class' => 'btn btn-success']);
        echo '&nbsp;&nbsp;&nbsp;';
        echo Html::a('ลบไฟล์', ['format', 'project_id' => $key->project->project_id], ['class' => 'btn btn-danger']);
    }else{
        echo 'ไม่พบไฟล์ใดๆในระบบ';
    }
    ?>
    <?php ActiveForm::end(); ?>

</div>
