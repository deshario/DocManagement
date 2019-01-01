<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LastPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้รับผิดชอบโครงการ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="last-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Last Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'last_id',
            'last_role',
            'last_user',
            'last_position',
            'project_act_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
