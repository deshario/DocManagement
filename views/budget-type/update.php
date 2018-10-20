<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BudgetType */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'แหล่งที่มาของงบประมาณ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->budget_type_name, 'url' => ['view', 'id' => $model->budget_type_id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="budget-type-update">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $this->title; ?></h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
