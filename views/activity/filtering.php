<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url; ?>

<div class="row">
    <?php foreach ($dataProvider->models as $model) { ?>

        <div class="col-md-3">
            <div class="thumbnail">
                <!--                    <img src="--><?php //echo Yii::getAlias('@web').'/img/folder_blue.png'; ?><!--" class="img-responsive"/>-->
                <p align="center"><i class="fa fa-file-text-o fa-5x" aria-hidden="true" style="margin-top: 25px"></i></p>
                <div class="caption">
                    <h3 align="center"><?= $model->activity_name; ?></h3>
                    <p align="center">
                        <?= Html::a('ดูรายละเอียด', ['view','id' => $model->activity_id], ['class' => 'btn btn-success']); ?>
                        <?= Html::a('แก้ไข', ['update','id' => $model->activity_id], ['class' => 'btn btn-primary']); ?>
                    </p>
                </div>
            </div>
        </div>

    <?php } ?>
</div>