<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Consistency */

$this->title = $model->consistency_id;
$this->params['breadcrumbs'][] = ['label' => 'Consistencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consistency-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->consistency_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->consistency_id], [
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
            'consistency_id',
            'cons_strategic_id',
            'cons_goal_id',
            'cons_strategy_id',
            'cons_indicator_id',
            'project_act_key',
        ],
    ]) ?>

</div>
