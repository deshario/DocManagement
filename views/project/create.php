<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'สร้างใหม่';
$this->params['breadcrumbs'][] = ['label' => 'โครงการ', 'url' => ['/site/routing']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $this->title; ?></h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
