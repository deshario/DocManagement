<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->activity_id;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->activity_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->activity_id], [
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
            'activity_id',
            'root_project_id',
            'activity_name',
            'activity_rationale:ntext',
            'activity_type:ntext',
            'objective:ntext',
            'evaluation:ntext',
            'benefit:ntext',
            'organization_organization_id',
            'responsible_by',
            'activity_consistency_id',
            'activity_ep_id',
            'project_laksana_id',
            'project_paomai_id',
            'project_plan_id',
            'budget_type_id',
            'activity_money',
            'related_subject',
            'budget_details_id',
            'activity_status',
            'activity_key',
            'lastpage_id',
            'created_by',
            'suggestion:ntext',
        ],
    ]) ?>

</div>
