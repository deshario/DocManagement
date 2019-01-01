<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Managers;
use yii\bootstrap\Modal;
use yii\web\View;
use yii\helpers\Url;

$this->title = 'ผู้ใช้งาน';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss("
.bg{
       background: rgba(248, 248, 248, 0.8);
       border-radius: 5px
       }");

$this->registerJs("
$(function(){ 
    $('.view_details').click(function (){
        $.get($(this).attr('href'), function(data) {
          $('#view_managers').modal('show')
          .find('#managers_content')
          .html(data)
       });
       return false;
    }); 
});
");
?>

<?php
Modal::begin([
    'header' => 'Title',
    'id' => 'view_managers',
    'size' => 'modal-md',
]);
echo "<div id='managers_content'></div>";
Modal::end();
?>

<!-- <?= GridView::widget([
    'krajeeDialogSettings' => [ 'options' => ['title' => 'Your Custom Title'] ],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Countries</h3>',
        'type'=>'success',
        'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
        'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
        'footer'=>false
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        //'id',
        'username',
        'email',
        //'auth_key',
        //'password_hash',
        // 'password_reset_token',
        // 'email:email',
        // 'status',
        'created_at:datetime',
        ['class' => 'yii\grid\ActionColumn'],
    ],
    'responsiveWrap' => false,
]);  ?>
-->

<div class="row">

    <?php foreach ($dataProvider->models as $model) { ?>

    <div class="col-md-3">

        <?php
        if ($model->status == Managers::STATUS_ACTIVE){
            echo "<div class='box box-success'>";
        }else{
            echo "<div class='box box-danger'>";
        }?>

        <div class="box-header with-border">
            <h3 class="box-title" style="font-family: 'Maven Pro', sans-serif; text-transform: capitalize;"><span class="fa fa-user-o"></span> <?php echo $model->username; ?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                <?= Html::a("<span class='fa fa-pencil'></span>",
                    ['/managers/update', 'id' => $model->id],
                    ['class'=>'btn btn-box-tool',
                        //'data-toggle' => 'tooltip', 'data-placement' => 'top','title' => 'Modify',
                        'data' => [
                            'confirm' => 'คุณแน่ใจหรือไม่ว่าต้องการแก้ไขผู้ใช้งานคนนี้',
                            'method' => 'post',
                        ],
                    ]) ?>

                <?php
                echo  Html::a("<span class='fa fa-trash'></span>",
                    ['/managers/delete','id' => $model->id],
                    ['class'=>'btn btn-box-tool',
                        //'data-toggle' => 'tooltip', 'data-placement' => 'top','title' => 'Deactivate',
                        'data' => [
                            'confirm' => 'คุณแน่ใจหรือไม่ว่าต้องการลบผู้ใช้งานคนนี้',
                            'method' => 'post',
                        ],
                    ]);
                //}
                ?>

            </div>
        </div>
        <div class="box-body">
            <?php
                if($model->picture != null){
                    $avatar = Yii::getAlias('@web').'/uploads/avatars/'.$model->picture;
                }else{
                    $avatar = Yii::getAlias('@web').'/img/icon.png';
                }
            ?>
            <img src="<?php echo $avatar; ?>"  class="img-responsive img-circle" width="200" style="padding:10px; margin: 0 auto"/>
            <div style="padding-left: 10px; padding-right: 10px; margin-top:-15px; padding-top:-40px;">
                <hr/>
                <p><span class="fa fa-envelope-o"></span> อีเมล : <?php echo $model->email; ?></p>
                <p><span class="fa fa-calendar-o"></span> วันที่สมัคร : <?php echo Yii::$app->formatter->asDate($model->created_at,'medium') ?></p>
                <a style="color: black"><span class="fa fa-wifi"></span> สถานะ : <?php echo $model->getStatus($model->status); ?></a>
                <p style="margin-top: 5px"> </p>
            </div>

        </div><!-- /.box-body -->

        <div class="box-footer" align="center">

            <?php if($model->roles == Managers::ROLE_ADMIN){ ?>
                <?= Html::a("<span class='fa fa-user-circle'></span>&nbsp;เปลี่ยนสิทธิ์",
                    ['/managers/change_roles', 'id' => $model->id , 'newRole' => Managers::ROLE_USER],
                    ['class'=>'btn btn-primary btn-flat',
                        'data' => [
                            'confirm' => 'คุณแน่ใจหรือไม่ว่าต้องการเปลี่ยนสิทธิผู้ใช้งานคนนี้',
                            'method' => 'post',
                        ],
                    ]) ?>
            <?php }else{?>
                <?= Html::a("<span class='fa fa-user'></span>&nbsp;เปลี่ยนสิทธิ์",
                    ['/managers/change_roles', 'id' => $model->id, 'newRole' => Managers::ROLE_ADMIN],
                    ['class'=>'btn btn-success btn-flat',
                        'data' => [
                            'confirm' => 'คุณแน่ใจหรือไม่ว่าต้องการเปลี่ยนสิทธิ์ผู้ใช้งานคนนี้',
                            'method' => 'post',
                        ],
                    ]) ?>
            <?php } ?>

            <?php if ($model->status == Managers::STATUS_ACTIVE){?>
                <?= Html::a("<span class='fa fa-power-off'></span>&nbsp;ปิดการใช้งาน",
                    ['/managers/deactivate','id' => $model->id],
                    ['class'=>'btn btn-danger btn-flat',
                        'data' => [
                            'confirm' => 'คุณแน่ใจหรือไม่ว่าต้องการปิดใช้งานผู้ใช้งานคนนี้',
                            'method' => 'post',
                        ],
                    ]) ?>
            <?php }elseif ($model->status == Managers::STATUS_DELETED){?>
                <?= Html::a("<span class='fa fa-power-off'></span>&nbsp;เปิดการใช้งาน",
                    ['/managers/activate', 'id' => $model->id],
                    ['class'=>'btn btn-default btn-flat',
                        'data' => [
                            'confirm' => 'คุณแน่ใจหรือไม่ว่าต้องการเปิดใช้งานผู้ใช้งานคนนี้',
                            'method' => 'post',
                        ],
                    ]) ?>
            <?php }?>
        </div><!-- /.box-footer-->
    </div><!--/.direct-chat -->

</div>

<?php } ?>

</div>

<div class="clearfix"></div>
