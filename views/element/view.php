<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Element */

$this->title = $model->element_name;
$this->params['breadcrumbs'][] = ['label' => 'องค์ประกอบ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="element-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'element_id',
            'element_name',
        ],
    ]) ?>

</div>
