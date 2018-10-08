<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Procced */

$this->title = 'Update Procced: ' . $model->procced_id;
$this->params['breadcrumbs'][] = ['label' => 'Procceds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->procced_id, 'url' => ['view', 'id' => $model->procced_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="procced-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
