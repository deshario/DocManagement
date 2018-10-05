<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Indicator */

$this->title = $model->indicator_name;
$this->params['breadcrumbs'][] = ['label' => 'ตัวชี้วัด', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicator-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'indicator_id',
            'indicator_name',
        ],
    ]) ?>

</div>
