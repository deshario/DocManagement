<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectBudgetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แหล่งที่มาของงบประมาณ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-budget-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showOnEmpty' => false,
        'summary' => '',
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn', 'header' => '',],

            //'budget_id',
            //'budget_type_id',
            ['attribute' => 'budget_type_id',
                'value' => function ($model) {
                    return $model->budgetType->budget_type_name;
                },
            ],
            'budget_year',
            ['class' => 'yii\grid\ActionColumn'],
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
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; แหล่งที่มาของงบประมาณ',
                'content' => $content,
                'active' => true,
            ],
            ['label'=>'<i class="fa fa-plus"></i>&nbsp; เพิ่มแหล่งที่มาของงบประมาณ', 'url' => Url::to(['create'])]
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
