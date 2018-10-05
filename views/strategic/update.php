<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Strategic */

$this->title = 'Update Strategic: ' . $model->strategic_id;
$this->params['breadcrumbs'][] = ['label' => 'Strategics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->strategic_id, 'url' => ['view', 'id' => $model->strategic_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="strategic-update">

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
