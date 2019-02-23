<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ElementProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Element Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="element-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Element Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'element_product_id',
            'ep_element_id',
            'ep_product_id',
            'project_act_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
