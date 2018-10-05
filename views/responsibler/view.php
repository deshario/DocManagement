<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Responsibler */

$this->title = $model->responsible_by;
$this->params['breadcrumbs'][] = ['label' => 'ผู้รับผิดชอบ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsibler-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'responsible_id',
            'responsible_by',
        ],
    ]) ?>

</div>
