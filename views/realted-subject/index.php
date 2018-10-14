<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RealtedSubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Realted Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realted-subject-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Realted Subject', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'subject_id',
            'subject_name',
            'subject_teacher',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
