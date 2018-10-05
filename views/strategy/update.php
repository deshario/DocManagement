<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Strategy */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'กลยุทธ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->strategy_name, 'url' => ['view', 'id' => $model->strategy_id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="strategy-update">

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
