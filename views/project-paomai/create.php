<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjectPaomai */

$this->title = 'Create Project Paomai';
$this->params['breadcrumbs'][] = ['label' => 'Project Paomais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-paomai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
