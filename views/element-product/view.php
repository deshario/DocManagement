<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ElementProduct */

$this->title = $model->element_product_id;
$this->params['breadcrumbs'][] = ['label' => 'Element Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="element-product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->element_product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->element_product_id], [
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
            'element_product_id',
            'ep_element_id',
            'ep_product_id',
            'project_act_key',
        ],
    ]) ?>

</div>
