<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectLaksana */

$this->title = 'Update Project Laksana: ' . $model->laksana_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Laksanas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->laksana_id, 'url' => ['view', 'id' => $model->laksana_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-laksana-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
