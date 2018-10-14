<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RealtedSubject */

$this->title = 'Update Realted Subject: ' . $model->subject_id;
$this->params['breadcrumbs'][] = ['label' => 'Realted Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subject_id, 'url' => ['view', 'id' => $model->subject_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="realted-subject-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
