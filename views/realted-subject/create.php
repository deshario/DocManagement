<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RealtedSubject */

$this->title = 'Create Realted Subject';
$this->params['breadcrumbs'][] = ['label' => 'Realted Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realted-subject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
