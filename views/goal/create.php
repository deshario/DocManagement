<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Goal */

$this->title = 'เพิ่มใหม่';
$this->params['breadcrumbs'][] = ['label' => 'เปาประสงค์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goal-create">

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
