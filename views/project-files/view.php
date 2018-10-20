<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectFiles */

$this->title = $model->file_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-files-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->file_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->file_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'file_id',
            'file_source:ntext',
            'project_id',
        ],
    ]) ?>

</div>
