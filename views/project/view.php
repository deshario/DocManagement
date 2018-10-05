<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'd';
$this->params['breadcrumbs'][] = ['label' => 'โครงการ'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">



        <p>
        <?php
        if ($model->project_status == \app\models\Project::PROJECT_ACTIVE){
            ?>
            <div class="alert alert-success">
                <strong>Warning!</strong> โครงการของคุณได้รับการอนุมัติเรียบร้อยแล้ว คุณสามารถสร้างกิจกรรมได้ที่นี่
            </div>
            <?php
            echo Html::a('เพิ่มกิจกรรม', ['/activity/create',
                'proj_id' => $model->project_id,
                'proj_name' => $model->project_name,
            ], ['class' => 'btn btn-primary']);
        } else { ?>
            <div class="alert alert-warning">
                <strong>เตือน!</strong> โครงการของคุณยังไม่ได้รับการอนุมัติ
            </div>
        <?php } ?>



        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'project_id',
                'project_name',
                //'created_by',
                [
                    'label' => 'สร้างโดย',
                    'value' => $model->createdBy->username,
                ],
                ['format' => 'html', 'label' => 'สถานะโครงการ', 'value' => '<code><i>' . $model->getProjectStatus($model->project_status) . '</i></code>'],
            ],
        ]) ?>

</div>
