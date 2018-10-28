<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use unclead\multipleinput\MultipleInput;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */

$project_id = Yii::$app->request->get('proj_id');
$project_name = Yii::$app->request->get('proj_name');
//$model->root_project_id = $project_id;
$model->temp_max_amount = 500;
?>

<div class="activity-form">

    <div class="row">

        <div class="col-md-12">

            <?php $form = ActiveForm::begin(); ?>

            <?php if($model->isNewRecord){?>
                <div class="col-md-3">
                    <?= $form->field($model, 'activity_name')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'activity_money')->widget(MaskMoney::classname(), [
                        'pluginOptions' => [
                            'prefix' => '฿ ',
                            'suffix' => '',
                            'allowNegative' => false
                        ]
                    ]); ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'organization_organization_id')->dropDownList($model->getOrganizationList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'responsible_by')->dropDownList($model->getResponsiblerList(), ['prompt' => 'กรุณาเลือกผู้รับผิดชอบ']) ?>
                </div>
            <?php }else{?>
                <div class="col-md-3">
                    <?= $form->field($model, 'activity_name')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'activity_money')->widget(MaskMoney::classname(), [
                        'pluginOptions' => [
                            'prefix' => '฿ ',
                            'suffix' => '',
                            'allowNegative' => false
                        ],'readonly' => true
                    ]); ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'organization_organization_id')->dropDownList($model->getOrganizationList(), ['prompt' => 'กรุณาเลือกองค์กร', 'readonly' => true]) ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'responsible_by')->dropDownList($model->getResponsiblerList(), ['prompt' => 'กรุณาเลือกผู้รับผิดชอบ', 'readonly' => true]) ?>
                </div>
            <?php }?>


            <div class="clearfix"></div>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">ลักษณะโครงการ</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <!-- <?= $form->field($model, 'project_laksana_id')->textInput() ?> -->

                    <div class="col-md-6">
                        <?= $form->field($model, 'temp_type')->inline()->radioList(\app\models\Project::getProjectTypeList()) ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'temp_procced')->inline()->radioList(\app\models\Project::getProccedTypeList()) ?>
                    </div>
                </div>
            </div>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">ความสอดคล่อง</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <?= $form->field($model, 'strategic_strategic_id')->dropDownList(\app\models\Project::getStrategicList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'goal_goal_id')->dropDownList(\app\models\Project::getGoalList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'strategy_strategy_id')->dropDownList(\app\models\Project::getStrategyList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'indicator_indicator_id')->dropDownList(\app\models\Project::getIndicatorList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'realted_subject_id')->dropDownList(\app\models\Project::getRealtedSubjectList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'element_element_id')->dropDownList($model->getElementList(), ['prompt' => 'กรุณาเลือกองค์ประกอบ']) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'product_product_id')->dropDownList($model->getProductList(), ['prompt' => 'กรุณาเลือกผลผลิต']) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'budget_type_id')->dropDownList(\app\models\Project::getBudgetTypeList(), ['prompt' => 'กรุณาเลือกแหล่งที่มาของงบประมาณ']) ?>
            </div>

            <div class="col-md-12">
                <?= $form->field($model, 'activity_rationale')->textarea(['rows' => 3, 'placeholder' => '']) ?>
            </div>

            <div class="col-md-12">
                <?= $form->field($model, 'objective')->textarea(['rows' => 3, 'placeholder' => '']) ?>
            </div>

            <div class="col-md-12">
                <?= $form->field($model, 'activity_type')->textarea(['rows' => 3, 'placeholder' => '']) ?>
            </div>

            <div class="clearfix"></div>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">เป้าหมาย</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <?= $form->field($model, 'paomai_quantity')->textarea(['rows' => 6]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'paomai_quality')->textarea(['rows' => 6]) ?>
                    </div>
                </div>
            </div>


            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">แผนปฏิบัติการณ์กิจกรรม</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?= $form->field($model, 'budget_plan')->widget(MultipleInput::className(), [
                        'max' => 4,
                        'columns' => [
                            [
                                'name' => 'detail_name',
                                'title' => 'รายละเอียดงบประมาณ',
                                'enableError' => true,
                            ],
                            [
                                'name' => 'detail_price',
                                'title' => 'งบประมาณ',
                                'enableError' => true,
                                'options' => [
                                    'type' => 'number',
                                    'class' => 'input-priority',
                                ]
                            ],
                        ]
                    ])->label(false); ?>
                </div>
            </div>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">กิจกรรมการดำเนินงาน</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?= $form->field($model, 'temp_project_plan_id')->widget(MultipleInput::className(), [
                        'max' => 4,
                        'columns' => [
                            [
                                'name'  => 'plan_process',
                                'type'  => 'dropDownList',
                                'title' => 'ขั้นตอนการดำเนินงาน',
                                'defaultValue' => 1,
                                'items' => [
                                    1 => 'ชั้นว่างแผน(Plan)',
                                    2 => 'ชั้นตรวจสอบ(Check)',
                                    3 => 'ชั้นปรับปรุง(Act)'
                                ]
                            ],
                            [
                                'name' => 'plan_detail',
                                'title' => 'รายละเอียดการดำเนินงาน',
                                'enableError' => true,
                            ],
                            [
                                'name'  => 'plan_date',
                                'type'  => \kartik\date\DatePicker::className(),
                                'title' => 'วันเดือนปี',
//                                'value' => function($data) {
//                                   // return $data['day'];
//                                    return 11;
//                                },
//                                'items' => [
//                                    '0' => 'Saturday',
//                                    '1' => 'Monday'
//                                ],
                                'options' => [
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true
                                    ]
                                ]
                            ],
                            [
                                'name' => 'plan_place',
                                'title' => 'สถานที่ดำเนินงาน',
                                'enableError' => true,
                            ],
                        ]
                    ])->label(false); ?>
                </div>
            </div>


            <div class="col-md-12">
                <?= $form->field($model, 'benefit')->textarea(['rows' => 3, 'placeholder' => '']) ?>
            </div>

            <div class="clearfix"></div>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">หน้าสุดท้าย</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?= $form->field($model, 'lastpage_main')->widget(MultipleInput::className(), [
                        'max' => 6,
                        'columns' => [
                            [
                                'name'  => 'last_role',
                                'type'  => 'dropDownList',
                                'title' => 'ชนิดของผู้ใช้งาน',
                                'defaultValue' => 1,
                                'items' => [
                                    1 => 'ผู้เสนอโครงการ/กิจกรรม',
                                    2 => 'ผู้เห็นชอบโครงการ/กิจกรรม',
                                    3 => 'ผู้อนุมัติโครงการ/กิจกรรม',
                                ]
                            ],
                            [
                                'name' => 'last_user',
                                'title' => 'ชื่อผู้ใช้งาน',
                                'enableError' => true,
                            ],
                            [
                                'name' => 'last_position',
                                'title' => 'ตำแหน่งผู้ใช้งาน',
                                'enableError' => true,
                            ],
                        ]
                    ])->label(false); ?>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

</div>
