<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Procced */

$this->title = 'Create Procced';
$this->params['breadcrumbs'][] = ['label' => 'Procceds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procced-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
