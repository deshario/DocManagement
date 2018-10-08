<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectPaomaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Paomais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-paomai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project Paomai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'paomai_id',
            'paomai_type',
            'paomai_value:ntext',
            'paomai_owner',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
