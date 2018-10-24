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
//            'headerOptions' => ['width' => '5px'],
            'header' => '',
            'contentOptions' => ['class' => 'text-center'],

        ],
        //'activity_id',
        ['attribute' => 'activity_name',
            'format' => 'html',
            'headerOptions' => ['width' => '400px'],
            'label' => 'รายการ',
            'contentOptions' => ['style' => 'width:490px;  min-width:430px;'],
            'value' => function ($data) {
                return Html::a($data->activity_name, ['view', 'id' => $data->activity_id,]);
            },

        ],
        //'responsible_by',
        [
            'attribute' => 'responsible_by',
            'headerOptions' => ['class' => 'text-center'],
            'contentOptions' => ['style' => 'width:60px;  min-width:50px;', 'class' => 'text-center'],
            'value' => function ($data) {
                return $data->responsibleBy->responsible_by;
            },
            'pageSummaryOptions' => ['class' => 'text-right'],
            'pageSummary' => 'รวมจำนวนทั้งสิ้น',
        ],

        ['attribute' => 'activity_money',
            'format' => 'html',
            'headerOptions' => ['class' => 'text-center'],
            'format' => ['decimal', 0],
            'contentOptions' => ['style' => 'width:40px;  min-width:30px;', 'class' => 'text-left'],
            'pageSummary' => true,
            'pageSummaryOptions' => ['class' => 'text-left'],
        ],

        ['class' => 'kartik\grid\ActionColumn',
            'header' => 'คำสั่ง',
            'headerOptions' => ['class' => 'text-center'],
            'contentOptions' => ['style' => 'width:100px;  min-width:80px;', 'class' => 'text-center'],
            'template' => '{print}&nbsp{update}&nbsp{manage}',
            'buttons' => [
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
                if ($action == 'print') {
                    $url = Url::toRoute(['preview',
                        'activity_id' => $model->activity_id,
                        'activity_name' => $model->activity_name,
                    ]);
                    return $url;
                }
                if ($action == 'update') {
                    $url = Url::toRoute(['update',
                        'id' => $model->activity_id,
                        'project_status' => $model->rootProject->project_status,
                    ]);
                    return $url;
                }
                if ($action == 'manage') {
                    $url = Url::toRoute(['activity-files/create',
                        'activity_id' => $model->activity_id,
                        'activity_name' => $model->activity_name,
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