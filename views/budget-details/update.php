<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BudgetDetails */

$this->title = 'Update Budget Details: ' . $model->detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Budget Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->detail_id, 'url' => ['view', 'id' => $model->detail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="budget-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
