<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivityFilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activity Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-files-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Activity Files', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'file_id',
            'file_source',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
