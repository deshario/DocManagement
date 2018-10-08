<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectPlan */

$this->title = $model->plan_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-plan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->plan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->plan_id], [
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
            'plan_id',
            'plan_process',
            'plan_detail:ntext',
            'plan_date',
            'plan_place',
            'plan_owner',
        ],
    ]) ?>

</div>
