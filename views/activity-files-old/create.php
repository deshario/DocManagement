<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\helpers\Url;

$activity_id = Yii::$app->request->get('activity_id');
$project_id = Yii::$app->request->get('project_id');
$project_name = Yii::$app->request->get('project_name');

$this->title = 'จัดการไฟล์';
$this->params['breadcrumbs'][] = ['label' => 'โครงการทั้งหมด', 'url' => ['/project/index']];
$this->params['breadcrumbs'][] = ['label' => $project_name, 'url' => ['/activity/index', 'project_id' => $project_id,
    'project_name' => $project_name,
    ]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-files-create">

    <?php $content =  $this->render('_form', [
        'model' => $model,
    ]) ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-users"></i>&nbsp;<?= $this->title; ?></h3>
        </div>
        <div class="panel-body">
            <?php
            $items = [
                [
                    'label' => '<i class="fa fa-envelope-o"></i>&nbsp; อัพโหลดไฟล์',
                    'content' => $content,
                    'active' => true,
                ],
                ['label'=>'<i class="fa fa-cog"></i>&nbsp; ผสานไฟล์', 'url' => Url::to(['/activity/all_files?activity_id='.$activity_id])]
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


</div>
