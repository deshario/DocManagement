<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'โครงการ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showOnEmpty' => false,
        'summary' => '',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'project_id',
            ['attribute' => 'project_name',
                'format' => 'html',
                'headerOptions' => ['width' => '400px'],
                'label' => 'รายการ',
                'contentOptions' => ['style' => 'width:490px;  min-width:430px;'],
                'value' => function ($data) {
                    return Html::a($data->project_name, ['activity/index',
                        'project_id' => $data->project_id,
                        'project_name' => $data->project_name,
                        'project_status' => $data->project_status,
                    ]);
                },

            ],
            ['attribute' => 'created_by',
                'headerOptions' => ['width' => '50px'],
                'value' => function ($model) {
                    return $model->createdBy->username;
                },
            ],
            ['format' => 'html',
                'attribute' => 'project_status',
                'label' => 'สถานะโครงการ',
                'headerOptions' => ['width' => '150px'],
                'filter'=>array("10"=>"กำลังดำเนินงาน","20"=>"อนุมัติแล้ว"),
                'value' => function ($model) {
                    $temp = $model->project_status;
                    return '<code><i>' . $model->getProjectStatus($temp) . '</i></code>';
                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'header' => 'คำสั่ง',
                'headerOptions' => ['width' => '100px', 'style' => 'cursor:default; color:#428bca;'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{print}',
                'buttons' => [
                    'print' => function ($url, $model) {
                        return Html::a('<button class="btn btn-xs btn-primary primary-tooltip" data-toggle="tooltip"
                                data-placement="top" title="พิมพ์โครงการ"><i class="fa fa-print"></i> พิมพ์โครงการ</button>', $url
                        );
                    },
                    'details' => function ($url, $model) {
                        return Html::a('<button class="btn btn-xs btn-primary primary-tooltip" data-toggle="tooltip"
                                data-placement="top" title="เปิดใช้งาน"><i class="fa fa-search-plus"></i> </button>', $url
                        );
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action == 'print') {
                        $url = Url::toRoute(['preview',
                            'project_id' => $model->project_id,
                            'project_name' => $model->project_name,
                        ]);
                        return $url;
                    }
                    if ($action == 'details') {
                        $url = Url::toRoute(['activity/index',
                            'project_id' => $model->project_id,
                            'project_name' => $model->project_name,
                            'project_status' => $model->project_status,
                        ]);
                        return $url;
                    }
                }
            ],
        ],
        'resizableColumns' => false,
        'responsiveWrap' => false,
    ]); ?>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-users"></i>&nbsp;<?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $items = [
            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; โครงการของฉัน',
                'content' => $content,
                'active' => true,
            ],
            ['label' => '<i class="fa fa-plus"></i>&nbsp; เพิ่มโครงการ', 'url' => Url::to(['create'])]
        ];

        echo TabsX::widget([
            'items' => $items,
            'position' => TabsX::POS_ABOVE,
            'align' => TabsX::ALIGN_LEFT,
            'bordered' => true,
            'encodeLabels' => false
        ]);

        ?>
    </div>
</div>
