<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActivityFiles */

$this->title = 'Update Activity Files: ' . $model->file_id;
$this->params['breadcrumbs'][] = ['label' => 'Activity Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->file_id, 'url' => ['view', 'id' => $model->file_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activity-files-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
