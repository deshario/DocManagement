<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsistencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consistencies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consistency-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Consistency', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'consistency_id',
            'cons_strategic_id',
            'cons_goal_id',
            'cons_strategy_id',
            'cons_indicator_id',
            //'project_act_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
