<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ElementProduct */

$this->title = 'Update Element Product: ' . $model->element_product_id;
$this->params['breadcrumbs'][] = ['label' => 'Element Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->element_product_id, 'url' => ['view', 'id' => $model->element_product_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="element-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
