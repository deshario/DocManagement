<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LastPage */

$this->title = 'Update Last Page: ' . $model->last_id;
$this->params['breadcrumbs'][] = ['label' => 'Last Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->last_id, 'url' => ['view', 'id' => $model->last_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="last-page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
