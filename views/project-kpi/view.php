<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectKpi */

$this->title = $model->kpi_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Kpis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-kpi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kpi_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kpi_id], [
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
            'kpi_id',
            'kpi_name',
            'kpi_goal',
            'kpi_project_key',
        ],
    ]) ?>

</div>
