<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Consistency */

$this->title = 'Create Consistency';
$this->params['breadcrumbs'][] = ['label' => 'Consistencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consistency-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
