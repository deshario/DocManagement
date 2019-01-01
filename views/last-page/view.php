<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LastPage */

$this->title = $model->last_id;
$this->params['breadcrumbs'][] = ['label' => 'Last Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="last-page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->last_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->last_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
้ิ่
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'last_id',
            'last_role',
            'last_user',
            'last_position',
            'project_act_key',
        ],
    ]) ?>

</div>
