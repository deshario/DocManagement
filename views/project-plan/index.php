<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectPlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Plans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-plan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project Plan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'plan_id',
            'plan_process',
            'plan_detail:ntext',
            'plan_date',
            'plan_place',
            //'plan_owner',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
