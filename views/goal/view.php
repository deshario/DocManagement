<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Goal */

$this->title = $model->goal_name;
$this->params['breadcrumbs'][] = ['label' => 'เปาประสงค์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goal-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'goal_id',
            'goal_name',
        ],
    ]) ?>

</div>
