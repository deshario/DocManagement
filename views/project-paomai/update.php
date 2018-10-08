<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectPaomai */

$this->title = 'Update Project Paomai: ' . $model->paomai_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Paomais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->paomai_id, 'url' => ['view', 'id' => $model->paomai_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-paomai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
