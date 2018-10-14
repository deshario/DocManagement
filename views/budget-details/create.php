<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BudgetDetails */

$this->title = 'Create Budget Details';
$this->params['breadcrumbs'][] = ['label' => 'Budget Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
