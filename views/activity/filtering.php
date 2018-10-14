<?php

use yii\helpers\Html;
use kartik\grid\GridView;
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'hover' => true,
    'showOnEmpty' => false,
    'summary' => '',
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn', 'header' => '', ],
        //'activity_id',
        ['attribute' => 'activity_name', 'label' => 'รายการ',
            'pageSummary'=>'รวมจำนวนทั้งสิ้น',

            //'mergeHeader'=>true,
//            'contentOptions' => ['class' => 'text-center'],
//            'vAlign' => GridView::ALIGN_MIDDLE,
//            'headerOptions' => ['width' => '50px'],

            'headerOptions' => ['width' => '80%'],
            'pageSummaryOptions'=>['class'=>'text-right'],
            ],


        ['attribute' => 'activity_name',
            'label' => 'จำนวนเงิน',
            'headerOptions' => ['width' => '5%'],
            'value' => function ($model) {
                return '500';
            },
            'format'=>['decimal', 0],
            'pageSummary' => true,
        ],

        ['class' => 'kartik\grid\ActionColumn',
            'headerOptions' => ['class' => 'text-center', 'style' => 'cursor:default; color:#428bca;'],
            'contentOptions' => ['class' => 'text-center'],
            'header' => 'คำสั่ง'],
    ],

    'showPageSummary' => true,
    //ageSummaryRowOptions' => 'kv-page-summary success',
    'showFooter' => false,
    'resizableColumns' => false,
    'responsiveWrap' => false,
]);
?>