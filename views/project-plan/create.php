<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjectPlan */

$this->title = 'Create Project Plan';
$this->params['breadcrumbs'][] = ['label' => 'Project Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-plan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
