<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectBudget */

$this->title = 'Update Project Budget: ' . $model->budget_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Budgets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->budget_id, 'url' => ['view', 'id' => $model->budget_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-budget-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
