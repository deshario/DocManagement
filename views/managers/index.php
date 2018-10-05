<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Managers;
use yii\bootstrap\Modal;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ManagersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Managers';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss("
.bg{
       background: rgba(248, 248, 248, 0.8);
       border-radius: 5px
       }");
 ?>

<div class="managers-index">

   <?= GridView::widget([
        'krajeeDialogSettings' => [ 'options' => ['title' => 'Your Custom Title'] ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'heading'=>'<h3 class="panel-title"> Managers</h3>',
            'type'=>'success',
            'before'=> false,
            'after'=>false,
            'footer'=>false
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'username',
            'email',
             'email:email',
            [
                'attribute' => 'roles',
                'label' => 'Status',
                'format'=>'html',
                'value' => function ($model) {
                    return $model->getRoles();
                },
                'vAlign' => GridView::ALIGN_MIDDLE,
            ],
            //'roles',
            'created_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'responsiveWrap' => false,
    ]);  ?>

</div>