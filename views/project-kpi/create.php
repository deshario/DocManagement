<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjectKpi */

$this->title = 'Create Project Kpi';
$this->params['breadcrumbs'][] = ['label' => 'Project Kpis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-kpi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
