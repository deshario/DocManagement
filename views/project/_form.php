<?php

use yii\base\Security;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use unclead\multipleinput\MultipleInput;
use kartik\money\MaskMoney;
use karatae99\datepicker\DatePicker;
use karatae99\datepicker\DateRangePicker;

?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="col-md-6">
                <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'organization_id')->dropDownList($model->getOrganizationList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'responsibler_id')->dropDownList($model->getResponsiblerList(), ['prompt' => 'กรุณาเลือกผู้รับผิดชอบ']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'project_money')->widget(MaskMoney::classname(), [
                    'pluginOptions' => [
                        'prefix' => '฿ ',
                        'suffix' => '',
                        'allowNegative' => false
                    ]
                ]); ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'budget_budget_type')->dropDownList($model->getBudgetTypeList(), ['prompt' => 'กรุณาเลือกแหล่งที่มาของงบประมาณ']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'project_year')->textInput(['maxlength' => true]) ?>
            </div>

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
                        <?= $form->field($model, 'temp_type')->inline()->radioList($model->getProjectTypeList()) ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'temp_procced')->inline()->radioList($model->getProccedTypeList()) ?>
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
                        <?= $form->field($model, 'strategic_id')->dropDownList($model->getStrategicList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'goal_id')->dropDownList($model->getGoalList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'strategy_id')->dropDownList($model->getStrategyList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'indicator_id')->dropDownList($model->getIndicatorList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'realted_subject_id')->dropDownList(\app\models\Project::getRealtedSubjectList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'element_id')->dropDownList($model->getElementList(), ['prompt' => 'กรุณาเลือกองค์ประกอบ']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'product_id')->dropDownList($model->getProductList(), ['prompt' => 'กรุณาเลือกผลผลิต']) ?>
            </div>

            <div class="clearfix"></div>

            <?= $form->field($model, 'rationale')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'objective')->textarea(['rows' => 6]) ?>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">เป้าหมายตัวชีวัด (KPI)</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?= $form->field($model, 'temp_project_kpi_id')->widget(MultipleInput::className(), [
                        'max' => 4,
                        'columns' => [
                            [
                                'name' => 'kpi_name',
                                'title' => 'ตัวชี่วัด (KPI)',
                                'enableError' => true,
                            ],
                            [
                                'name' => 'kpi_goal',
                                'title' => 'เป้าหมาย',
                                'enableError' => true,
                                'options' => [
                                    'class' => 'input-priority'
                                ]
                            ]
                        ]
                    ])->label(false); ?>
                </div>
            </div>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">เป้าหมาย</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <!-- <?= $form->field($model, 'projecti_paomai_id')->textInput() ?> -->
                    <div class="col-md-6">
                        <?= $form->field($model, 'paomai_quantity')->textarea(['rows' => 6]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'paomai_quality')->textarea(['rows' => 6]) ?>
                    </div>
                </div>
            </div>

            <?= $form->field($model, 'lakshana_activity')->textarea(['rows' => 6]) ?>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">แผนปฏิบัติการณ์กิจกรรม</h3>
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
                                'type'  => DatePicker::className(),
                                'title' => 'วันเดือนปี',
                                'options' => [

                                    'language' => 'th', // Thai B.E.
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd'
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

           <div class="row">
               <div class="col-md-4">
                   <?= $form->field($model, 'project_start')->widget(
                       DatePicker::className(), [
                       'language' => 'th', // Thai B.E.
                       'clientOptions' => [
                           'autoclose' => true,
                           'format' => 'yyyy-mm-dd'
                       ]
                   ]);?>
               </div>

               <div class="col-md-4">
                   <?= $form->field($model, 'project_end')->widget(
                       DatePicker::className(), [
                       'language' => 'th', // Thai B.E.
                       'clientOptions' => [
                           'autoclose' => true,
                           'format' => 'yyyy-mm-dd'
                       ]
                   ]);?>
               </div>

            <div class="col-md-4">
                <?= $form->field($model, 'project_location')->textInput(['maxlength' => true]) ?>
            </div>

           </div>

            <div class="clearfix"></div>

            <?= $form->field($model, 'project_evaluation')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'project_benefit')->textarea(['rows' => 6]) ?>

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

            <div class="form-group">
                <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
