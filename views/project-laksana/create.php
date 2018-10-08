<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjectLaksana */

$this->title = 'Create Project Laksana';
$this->params['breadcrumbs'][] = ['label' => 'Project Laksanas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-laksana-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
