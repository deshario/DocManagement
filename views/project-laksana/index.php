<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectLaksanaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Laksanas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-laksana-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project Laksana', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'laksana_id',
            'project_type_id',
            'procced_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
