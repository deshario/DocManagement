<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
            <h3 class="panel-title"><?= $this->title; ?></h3>
        </div>
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'activity_id',
                    //'root_project_id',
                    ['attribute' => 'root_project_id', 'value' => $model->rootProject->project_name],
                    'activity_name',
                    //'activity_organization',
                    'activity_rationale:ntext',
                    'activity_type',
                    'activity_place',
                    // 'activity_department',
                    'objective:ntext',
                    'evaluation:ntext',
                    'benefit:ntext',

                    ['attribute' => 'organization_organization_id', 'value' => $model->organizationOrganization->organization_name],
                    ['attribute' => 'strategic_strategic_id', 'value' => $model->strategicStrategic->strategic_name],
                    ['attribute' => 'goal_goal_id', 'value' => $model->goalGoal->goal_name],
                    ['attribute' => 'strategy_strategy_id', 'value' => $model->strategyStrategy->strategy_name],
                    ['attribute' => 'indicator_indicator_id', 'value' => $model->indicatorIndicator->indicator_name],
                    ['attribute' => 'element_element_id', 'value' => $model->elementElement->element_name],
                    ['attribute' => 'product_product_id', 'value' => $model->productProduct->product_name],

                    //'organization_organization_id',
                    //'strategic_strategic_id',
                    //'goal_goal_id',
                    //'strategy_strategy_id',
                    //'indicator_indicator_id',
                    //'element_element_id',
                    //'product_product_id',
                ],
            ]) ?>
        </div>
    </div>

</div>
