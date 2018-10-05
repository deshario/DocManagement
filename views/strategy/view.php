<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Strategy */

$this->title = $model->strategy_name;
$this->params['breadcrumbs'][] = ['label' => 'กลยุทธ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="strategy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->strategy_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->strategy_id], [
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
            'strategy_id',
            'strategy_name',
        ],
    ]) ?>

</div>
