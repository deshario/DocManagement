<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'hover' => true,
    'showOnEmpty' => false,
    'summary' => '',
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn',
            'headerOptions' => ['width' => '10px'],
            'header' => '',
            'contentOptions' => ['class' => 'text-center'],
            ],
        //'activity_id',
        ['attribute' => 'activity_name',
            'format' => 'html',
            'label' => 'รายการ',
            //'headerOptions' => ['width' => '75%'],
            'contentOptions' => [ 'style' => 'width:75%' ],
            'pageSummaryOptions'=>['class'=>'text-right'],
            'pageSummary'=>'รวมจำนวนทั้งสิ้น',

            //'mergeHeader'=>true,
//            'contentOptions' => ['class' => 'text-center'],
//            'vAlign' => GridView::ALIGN_MIDDLE,
//            'headerOptions' => ['width' => '50px'],

            'value'=>function ($data) {
                return Html::a($data->activity_name,['view', 'id' => $data->activity_id,]);
            },

            ],
        ['attribute' => 'activity_money',
            'format'=>'html',
            'contentOptions' => [ 'style' => 'width:5%', 'class' => 'text-center'],
            'format'=>['decimal', 0],
            'pageSummary' => true,
            'pageSummaryOptions'=>['class'=>'text-center'],
        ],

        ['class' => 'kartik\grid\ActionColumn',
            'header' => 'คำสั่ง',
            'headerOptions' => ['class' => 'text-center', 'style' => 'cursor:default; color:#428bca;'],
            'contentOptions' => ['class' => 'text-center'],
            'template' => '{print}&nbsp{update}&nbsp{manage}',   //{view}&nbsp;
//                'template' => '{details}&nbsp{manage}',   //{view}&nbsp;
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<button class="btn btn-xs btn-primary primary-tooltip" data-toggle="tooltip"
                                data-placement="top" title="ดูรายละเอียด"><i class="fa fa-search-plus"></i> </button>', $url
                    );
                },
                'print' => function ($url, $model) {
                    return Html::a('<button class="btn btn-xs btn-primary primary-tooltip" data-toggle="tooltip"
                                data-placement="top" title="พิมพ์กิจกรรม"><i class="fa fa-print"></i> </button>', $url
                    );
                },
                'update' => function ($url, $model) {
                    return Html::a('<button class="btn btn-xs btn-success primary-tooltip" data-toggle="tooltip"
                                data-placement="top" title="แก้ไข"><i class="fa fa-edit"></i> </button>', $url
                    );
                },
                'manage' => function ($url, $model) {
                    return Html::a('<button class="btn btn-xs btn-warning primary-tooltip" data-toggle="tooltip"
                                data-placement="top" title="จัดการไฟล์"><i class="fa fa-file-text-o"></i> </button>', $url
                    );
                },
            ],
            'urlCreator' => function ($action, $model, $key, $index) {
                if ($action == 'view') {
                    $url = Url::toRoute(['view',
                        'id' => $model->activity_id,
                    ]);
                    return $url;
                }
                if ($action == 'print') {
                    $url = Url::toRoute(['print_activity',
                        'id' => $model->activity_id,
                    ]);
                    return $url;
                }
                if ($action == 'update') {
                    $url = Url::toRoute(['update',
                        'id' => $model->activity_id,
                    ]);
                    return $url;
                }
                if ($action == 'manage') {
                    $url = Url::toRoute(['activity-files/create',
                        'activity_id' => $model->activity_id,
                        'project_id' => $model->rootProject->project_id,
                        'project_name' => $model->rootProject->project_name,
                        'project_status' => $model->rootProject->project_status,
                    ]);
                    return $url;
                }
            }
        ],
    ],

    'showPageSummary' => true,
    //ageSummaryRowOptions' => 'kv-page-summary success',
    'showFooter' => false,
    'resizableColumns' => false,
    'responsiveWrap' => false,
]);
?>