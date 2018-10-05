<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Strategic */

$this->title = $model->strategic_name;
$this->params['breadcrumbs'][] = ['label' => 'ยุทธศาสตร์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="strategic-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'strategic_id',
            'strategic_name',
        ],
    ]) ?>

</div>
