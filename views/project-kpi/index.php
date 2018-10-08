<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectKpiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Kpis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-kpi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project Kpi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kpi_id',
            'kpi_name',
            'kpi_goal',
            'kpi_owner',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
