<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BudgetType */

$this->title = 'Update Budget Type: ' . $model->budget_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Budget Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->budget_type_id, 'url' => ['view', 'id' => $model->budget_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="budget-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
