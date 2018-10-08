<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->project_id;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->project_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->project_id], [
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
            'project_id',
            'project_name',
            'organization_id',
            'responsibler_id',
            'project_laksana_id',
            'strategic_id',
            'goal_id',
            'strategy_id',
            'indicator_id',
            'element_id',
            'product_id',
            'rationale:ntext',
            'objective:ntext',
            'project_kpi_id',
            'projecti_paomai_id',
            'lakshana_activity:ntext',
            'project_plan_id',
//            /'project_start',
//            'project_end',
            'project_location',
            'project_evaluation:ntext',
            'project_benefit:ntext',
            'created_by',
            'project_money',
            'budget_budget_type',
            'project_status',
        ],
    ]) ?>

</div>
