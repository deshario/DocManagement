<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consistency */

$this->title = 'Update Consistency: ' . $model->consistency_id;
$this->params['breadcrumbs'][] = ['label' => 'Consistencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->consistency_id, 'url' => ['view', 'id' => $model->consistency_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consistency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
