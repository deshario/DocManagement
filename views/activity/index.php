<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$project_id = Yii::$app->request->get('project_id');
$project_name = Yii::$app->request->get('project_name');
$project_status = Yii::$app->request->get('project_status');

$this->title = $project_name;
$this->params['breadcrumbs'][] = ['label' => 'โครงการทั้งหมด', 'url' => ['/project/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="activity-index">

    <?php foreach ($dataProvider->models as $model) {
        $project_id = $model->project_id;
        $project_name = $model->project_name;
        $org_name = $model->organization->organization_name;
        $responsible = $model->responsibler->responsible_by;
        $project_money = $model->project_money;
        $budget_type = $model->budgetBudgetType->budget_type_name;
        $project_year = $model->project_year;
    }
    $project = new \app\models\Project();
    ?>

    <?php $contendt = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'activity_id',
            //'root_project_id',
//            ['attribute' => 'root_project_id',
//                'value' => function ($model) {
//                    return $model->rootProject->project_name;
//                },
//            ],
            //'activity_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);


    $content = "
    <form class='form-horizontal'>
    
        <div class='form-group'>
            <label class='col-sm-2 control-label'>ชื่อโครงการ </label>
            <div class='col-sm-10'>
                <input type='text' class='form-control' value='$project_name' readonly>
            </div>
        </div>
        
          <div class='form-group'>
            <label class='col-sm-2 control-label'>ชื่อหน่วยงาน</label>
            <div class='col-sm-10'>
                <input type='text' class='form-control' value='$org_name' readonly>
            </div>
        </div>
        
          <div class='form-group'>
            <label class='col-sm-2 control-label'>ผู้รับผิดชอบ</label>
            <div class='col-sm-10'>
                <input type='text' class='form-control' value='$responsible' readonly>
            </div>
            </div>
            
            <div class='form-group'>
            <label class='col-sm-2 control-label'>งบประมาณที่มี</label>
            <div class='col-sm-10'>
                <input type='text' class='form-control' value='$project_money บาท' readonly>
            </div>
            </div>
            
            <div class='form-group'>
            <label class='col-sm-2 control-label'>แหล่งที่มาของงบ</label>
            <div class='col-sm-10'>
                <input type='text' class='form-control' value='$budget_type' readonly>
            </div>
            </div>
            
             <div class='form-group'>
            <label class='col-sm-2 control-label'>ปีงบประมาณ</label>
            <div class='col-sm-10'>
                <input type='text' class='form-control' value='$project_year' readonly>
            </div>
            </div>
            
            <div class='form-group'>
            <label class='col-sm-2 control-label'></label>
            <div class='col-sm-10'>".Html::a('แก้ไขโครงการ', ['/project/update', 'id' => $project_id], ['class' => 'btn btn-primary'])
            ."&nbsp;&nbsp;&nbsp;".Html::a('ลบโครงการ', ['/project/delete', 'id' => $project_id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ])."
            </div>
            </div>
            
    </form>
    ";
    ?>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-users"></i>&nbsp;<?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $items = [
            ['label' => '<i class="fa fa-info-circle"></i>&nbsp; เกียวกับโครงการ',
                'active' => true,
                'content' => $content
            ],
            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; กิจกรรมทั้งหมด',
                'linkOptions' => ['data-url' => Url::to(['filtering?project_id=' . $project_id])],
            ],
            ['label' => '<i class="fa fa-file-text-o"></i>&nbsp; จัดการไฟล์', 'url' => Url::to(['/project-files/create', 'project_id' => $project_id, 'project_name' => $project_name, 'project_status' => $project_status])],
            ['label' => '<i class="fa fa-plus"></i>&nbsp; เพิ่มกิจกรรม', 'url' => Url::to(['create', 'proj_id' => $project_id, 'proj_name' => $project_name, 'project_status' => $project_status])],
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