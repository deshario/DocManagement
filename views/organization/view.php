<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */

$this->title = $model->organization_name;
$this->params['breadcrumbs'][] = ['label' => 'หน่วยงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'organization_id',
            'organization_name',
        ],
    ]) ?>

</div>
