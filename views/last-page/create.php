<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LastPage */

$this->title = 'Create Last Page';
$this->params['breadcrumbs'][] = ['label' => 'Last Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="last-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
