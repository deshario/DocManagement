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
                    //['attribute' => 'activity_temp_files', 'value' => $model->activityTempFiles->file_source],
                    ['attribute'=>'activity_temp_files','value'=>$model->listDownloadFiles($model->activityTempFiles->file_source,$model->rootProject->project_name),'format'=>'html'],

                    //'organization_organization_id',
                    //'strategic_strategic_id',
                    //'goal_goal_id',
                    //'strategy_strategy_id',
                    //'indicator_indicator_id',
                    //'element_element_id',
                    //'product_product_id',

//                    'activity_id',
//                    'root_project_id',
//                    'activity_name',
//                    'activity_rationale:ntext',
//                    'activity_type:ntext',
//                    'activity_place',
//                    'objective:ntext',
//                    'evaluation:ntext',
//                    'benefit:ntext',
//                    'organization_organization_id',
//                    'strategic_strategic_id',
//                    'realted_subject_id',
//                    'goal_goal_id',
//                    'responsible_by',
//                    'strategy_strategy_id',
//                    'indicator_indicator_id',
//                    'element_element_id',
//                    'product_product_id',
//                    'project_laksana_id',
//                    'project_paomai_id',
//                    'project_plan_id',
//                    'budget_type_id',
//                    'activity_money',
//                    'budget_details_id',
//                    'activity_status',
                ],
            ]) ?>
        </div>
    </div>

</div>
