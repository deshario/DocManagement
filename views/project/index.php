<?php

use app\models\BudgetType;
use kartik\tabs\TabsX;
use yii\helpers\ArrayHelper;
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
            ['class' => 'kartik\grid\SerialColumn', 'header' => '', ],

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
            ['attribute' => 'project_money',
                'headerOptions' => ['width' => '5%'],
                'value' => function ($model) {
                    return $model->project_money;
                },
                'format'=>['decimal', 0],
            ],
            ['attribute' => 'budget_budget_type',
                'label' => 'แหลงที่มาของงบ',
                'filter'=>ArrayHelper::map(BudgetType::find()->asArray()->all(), 'budget_type_id', 'budget_type_name'),
                'headerOptions' => ['width' => '50px'],
                'value' => function ($model) {
                    return $model->budgetBudgetType->budget_type_name;
                },
            ],
            ['attribute' => 'project_year',
                'headerOptions' => ['width' => '30px'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return $model->project_year;
                },
            ],
//            ['attribute' => 'created_by',
//                'headerOptions' => ['width' => '50px'],
//                'value' => function ($model) {
//                    return $model->createdBy->username;
//                },
//            ],
            ['format' => 'html',
                'attribute' => 'created_by',
                'label' => 'สถานะโครงการ',
                'headerOptions' => ['width' => '150px'],
                'value' => function ($model) {
                    return '<code><i>' . $model->getProjectStatus($model->project_status) . '</i></code>';
                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'header' => 'คำสั่ง',
                'headerOptions' => ['width' => '100px', 'style' => 'cursor:default; color:#428bca;'],
                'template' => '{print}&nbsp{approve}&nbsp{deny}',
                'buttons' => [
                    'print' => function ($url, $model) {
                        return Html::a('<button class="btn btn-xs btn-primary primary-tooltip" data-toggle="tooltip"
                                data-placement="top" title="พิมพ์โครงการ"><i class="fa fa-print"></i> </button>', $url
                        );
                    },
                    'approve' => function ($url, $model) {
                        return Html::a('<button class="btn btn-xs btn-success success-tooltip" id="reload" data-toggle="tooltip"
                                data-placement="top" title="อนุมัติโครงการ"><i class="fa fa-lock"></i> </button>', $url,
                            ['data-confirm' => 'Please insure that this request is true ! <br>', 'data-method' => 'POST']
                        );
                    },
                    'deny' => function ($url, $model) {
                        return Html::a('<button class="btn btn-xs btn-danger danger-tooltip" data-toggle="tooltip"
                                data-placement="top" title="ปฏิเสธโครงการ"><i class="fa fa-unlock"></i> </button>', $url,
                            ['data-confirm' => 'Are you sure you want to deny this request ?<br><code>Denying Request will delete request from system !</code>', 'data-method' => 'POST']
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
                    if ($action == 'approve') {
                        $url = Url::toRoute(['project/accept',
                            'project_id' => $model->project_id,
                        ]);
                        return $url;
                    }
                    if ($action == 'deny') {
                        $url = Url::toRoute(['project/deny',
                            'project_id' => $model->project_id]);
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
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; โครงการทั้งหมด',
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
