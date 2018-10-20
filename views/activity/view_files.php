<?php

use yii\helpers\Html;
use kartik\sortable\Sortable;
use yii\widgets\DetailView;
use kartik\sortinput\SortableInput;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->activity_name;
//$this->params['breadcrumbs'][] = ['label' => 'โครงการ', 'url' => ['index', 'project_id' => $model->rootProject->project_id, 'project_name' => $model->rootProject->project_name]];
$this->params['breadcrumbs'][] = ['label' => 'โครงการ', 'url' => '#'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $this->title; ?>  ผสานไฟล์</h3>
        </div>
        <div class="panel-body">

            <?php $model->listDownloadFiles($model->activityTempFiles->file_source, $model->rootProject->project_name); ?>

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'activity_plan')->widget(SortableInput::classname(), [
                'items' => [
                    1 => ['content' => $model->activityTempFiles->file_source],
                    2 => ['content' => 'Item # 2'],
                    3 => ['content' => 'Item # 3'],
                    4 => ['content' => 'Item # 4'],
                    5 => ['content' => 'Item # 5'],
                ],
                'hideInput' => false,
                'options' => ['class' => 'form-control', 'readonly' => true]
            ]);

            Sortable::widget([
                'type' => Sortable::TYPE_LIST,
                'items' => [
                    ['content' => $model->activityTempFiles->file_source],
                    ['content' => 'Item # 2'],
                    ['content' => 'Item # 3'],
                ]
            ]);
            ?>

            <?= Html::submitButton('Merge', ['class' => 'btn btn-success']) ?>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
