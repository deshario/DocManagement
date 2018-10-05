<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Element */

$this->title = 'แก้ไข';
$this->params['breadcrumbs'][] = ['label' => 'องค์ประกอบ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->element_name, 'url' => ['view', 'id' => $model->element_id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="element-update">

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
