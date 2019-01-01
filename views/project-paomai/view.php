<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectPaomai */

$this->title = $model->paomai_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Paomais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-paomai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->paomai_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->paomai_id], [
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
            'paomai_id',
            'project_quantity:ntext',
            'project_quality:ntext',
            'project_time:ntext',
        ],
    ]) ?>

</div>
