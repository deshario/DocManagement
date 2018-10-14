<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BudgetDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Budget Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Budget Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'detail_id',
            'detail_name',
            'detail_price',
            'activity_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
