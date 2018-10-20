<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\helpers\Url;

$project_name = Yii::$app->request->get('project_name');
$project_id = Yii::$app->request->get('project_id');

$this->title = 'เพิ่มไฟล์';
$this->params['breadcrumbs'][] = ['label' => 'โครงการทั้งหมด', 'url' => ['/project/index']];
$this->params['breadcrumbs'][] = ['label' => $project_name, 'url' => '#'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-files-create">

    <?php $content = $this->render('_form', [
        'model' => $model,
        'project_id' => $project_id,
        'project_name' => $project_name,
    ]) ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-users"></i>&nbsp;<?= $this->title; ?></h3>
        </div>
        <div class="panel-body">
            <?php
            $items = [
                [
                    'label' => '<i class="fa fa-cog"></i>&nbsp; ผสานไฟล์',
                    'linkOptions' => ['data-url' => Url::to(['/project-files/custom?id='.$project_id.'&type=1'])],
                ],
                [
                    'label' => '<i class="fa fa-upload"></i>&nbsp; อัพโหลดไฟล์',
                    'content' => $content,
                    'active' => true,
                ],
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
