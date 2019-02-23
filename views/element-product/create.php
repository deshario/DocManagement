<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ElementProduct */

$this->title = 'Create Element Product';
$this->params['breadcrumbs'][] = ['label' => 'Element Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="element-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
