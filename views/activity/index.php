<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$project_id = Yii::$app->request->get('project_id');
$project_name = Yii::$app->request->get('project_name');

$this->title = $project_name;
$this->params['breadcrumbs'][] = ['label' => 'โครงการ', 'url' => '#'];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="activity-index">

    <?php foreach ($dataProvider->models as $model) {
        $project_id = $model->rootProject->project_id;
        $project_name = $model->rootProject->project_name;
        $project_name = $model->rootProject->project_name;


        $org_name = $model->rootProject->organization->organization_name;
        $strategic_name = $model->rootProject->strategic->strategic_name;
        $strategic_name = $model->rootProject->goal->goal_name;

        $type_name = $model->rootProject->projectLaksana->projectType->type_name;

        $username = $model->rootProject->createdBy->username;
        $project_status_no = $model->rootProject->project_status;
    }
    $project = new \app\models\Project();
    $project_status = $project->getProjectStatus($project_status_no);
    ?>

    <?php $contentd = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'activity_id',
            'root_project_id',
            ['attribute' => 'root_project_id',
                'value' => function ($model) {
                    return $model->rootProject->project_name;
                },
            ],
            'activity_name',

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
                <input type='text' class='form-control' value='$project_name' readonly>
            </div>
            </div>
            
             <div class='form-group'>
            <label class='col-sm-2 control-label'>ประเภท</label>
            <div class='col-sm-10'>
                <input type='text' class='form-control' value='$type_name' readonly>
            </div>
            </div>
            
            <div class='form-group'>
            <label class='col-sm-2 control-label'>ยุทธศาสตร์</label>
            <div class='col-sm-10'>
                <input type='text' class='form-control' value='$strategic_name' readonly>
            </div>
            </div>
            
            <div class='form-group'>
            <label class='col-sm-2 control-label'>เป้าประสงค์</label>
            <div class='col-sm-10'>
                <input type='text' class='form-control' value='$strategic_name' readonly>
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
                'linkOptions' => ['data-url' => Url::to(['filtering?project_id=' . $model->root_project_id])],
            ],
            ['label' => '<i class="fa fa-plus"></i>&nbsp; เพิ่มกิจกรรม', 'url' => Url::to(['create',
                'proj_id' => $project_id, 'proj_name' => $project_name, 'proj_status' => $project_status_no])]
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