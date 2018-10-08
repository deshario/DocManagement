<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectLaksana */

$this->title = $model->laksana_id;
$this->params['breadcrumbs'][] = ['label' => 'Project Laksanas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-laksana-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->laksana_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->laksana_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'laksana_id',
            'project_type_id',
            'procced_id',
        ],
    ]) ?>

</div>
