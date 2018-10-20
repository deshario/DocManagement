<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BudgetType */

$this->title = $model->budget_type_name;
$this->params['breadcrumbs'][] = ['label' => 'แหล่งที่มาของงบประมาณ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-type-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'budget_type_id',
            'budget_type_name',
        ],
    ]) ?>

</div>
