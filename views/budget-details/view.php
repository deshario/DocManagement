<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BudgetDetails */

$this->title = $model->detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Budget Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->detail_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->detail_id], [
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
            'detail_id',
            'detail_name',
            'detail_price',
            'activity_id',
        ],
    ]) ?>

</div>
