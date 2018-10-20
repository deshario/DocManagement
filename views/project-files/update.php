<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectFiles */

$this->title = 'Update Project Files: ' . $model->file_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->file_id, 'url' => ['view', 'id' => $model->file_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-files-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
