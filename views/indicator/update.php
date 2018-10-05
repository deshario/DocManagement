<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Indicator */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'ตัวชี้วัด', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->indicator_id, 'url' => ['view', 'id' => $model->indicator_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="indicator-update">

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
