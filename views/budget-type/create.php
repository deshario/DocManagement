<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BudgetType */

$this->title = 'Create Budget Type';
$this->params['breadcrumbs'][] = ['label' => 'Budget Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>