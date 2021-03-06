<?php

use app\models\Strategic;
use karatae99\datepicker\DatePicker;
use kartik\depdrop\DepDrop;
use kartik\money\MaskMoney;
use unclead\multipleinput\MultipleInput;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="project-form">

    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-md-12">

            <div class="col-md-6">
                <?=$form->field($model, 'project_name')->textInput(['maxlength' => true])?>
            </div>
            <div class="col-md-6">
                <?=$form->field($model, 'organization_id')->dropDownList($model->getOrganizationList(), ['prompt' => 'กรุณาเลือกองค์กร'])?>
            </div>
            <div class="col-md-6">
                <?=$form->field($model, 'responsibler_id')->dropDownList($model->getResponsiblerList(), ['prompt' => 'กรุณาเลือกผู้รับผิดชอบ'])?>
            </div>
            <div class="col-md-6">
                <?=$form->field($model, 'project_money')->widget(MaskMoney::classname(), [
                    'pluginOptions' => [
                        'prefix' => '฿ ',
                        'suffix' => '',
                        'allowNegative' => false,
                    ],
                ]);?>
            </div>

            <div class="col-md-6">
                <?=$form->field($model, 'budget_budget_type')->dropDownList($model->getBudgetTypeList(), ['prompt' => 'กรุณาเลือกแหล่งที่มาของงบประมาณ'])?>
            </div>
            <div class="col-md-6">
                <?=$form->field($model, 'project_year')->textInput(['maxlength' => true])?>
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
                    <!-- <?=$form->field($model, 'project_laksana_id')->textInput()?> -->

                    <div class="col-md-6">
                        <?=$form->field($model, 'temp_type')->inline()->radioList($model->getProjectTypeList())?>
                    </div>

                    <div class="col-md-6">
                        <?=$form->field($model, 'temp_procced')->inline()->radioList($model->getProccedTypeList())?>
                    </div>
                </div>
            </div>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">ความสอดคล้อง</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <?=$form->field($model, 'temp_project_consistency')->widget(MultipleInput::className(), [
                            'max' => 30,
                            'columns' => [
                                [
                                    'name' => 'cons_strategic_id',
                                    'type' => 'dropDownList',
                                    'title' => 'ยุทธศาสตร์',
                                    'items' => $model->getStrategicList(),
                                    'options' => [
                                        'prompt' => 'กรุณาเลือกยุทธศาสตร์',
                                    ],
                                ],
                                [
                                    'name' => 'cons_goal_id',
                                    'type' => 'dropDownList',
                                    'title' => 'เป้าประสงค์',
                                    'items' => $model->getGoalList(),
                                    'options' => [
                                        'prompt' => 'กรุณาเลือกเป้าประสงค์',
                                    ],
                                ],
                                [
                                    'name' => 'cons_strategy_id',
                                    'type' => 'dropDownList',
                                    'title' => 'กลยุทธ์',
                                    'items' => $model->getStrategyList(),
                                    'options' => [
                                        'prompt' => 'กรุณาเลือกยกลยุทธ์',
                                    ],
                                ],
                                [
                                    'name' => 'cons_indicator_id',
                                    'type' => 'dropDownList',
                                    'title' => 'ตัวชี้วัด',
                                    'items' => $model->getIndicatorList(),
                                    //'headerOptions' => [ 'style' => 'width: 25%;', ],
                                    'options' => [
                                        'prompt' => 'กรุณาเลือกตัวชี้วัด',
                                    ],
                                ],
                            ],
                        ])->label(false);?>
                    </div>

                    <div class="col-md-12">
                        <?=$form->field($model, 'related_subject')->textInput(['maxlength' => true])?>
                    </div>

                    <div class="col-md-12">
                        <?=$form->field($model, 'temp_element_product')->widget(MultipleInput::className(), [
                            'max' => 30,
                            'columns' => [
                                [
                                    'name' => 'ep_element_id',
                                    'type' => 'dropDownList',
                                    'title' => 'องค์ประกอบ',
                                    'items' => $model->getElementList(),
                                    'options' => [
                                        'prompt' => 'กรุณาเลือกองค์ประกอบ',
                                    ],
                                ],
                                [
                                    'name' => 'ep_product_id',
                                    'type' => 'dropDownList',
                                    'title' => 'ผลผลิต',
                                    'items' => $model->getProductList(),
                                    'options' => [
                                        'prompt' => 'กรุณาเลือกผลผลิต',
                                    ],
                                ],
                            ],
                        ])->label(false);?>
                    </div>

                </div>
            </div>

            <div class="clearfix"></div>

            <?=$form->field($model, 'rationale')->textarea(['rows' => 6])?>

            <?=$form->field($model, 'objective')->textarea(['rows' => 6])?>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">เป้าหมายตัวชี้วัด (KPI)</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?=$form->field($model, 'temp_project_kpi_id')->widget(MultipleInput::className(), [
                        'max' => 4,
                        'columns' => [
                            [
                                'name' => 'kpi_name',
                                'title' => 'ตัวชี้วัด (KPI)',
                                'enableError' => true,
                            ],
                            [
                                'name' => 'kpi_goal',
                                'title' => 'เป้าหมาย',
                                'enableError' => true,
                                'options' => [
                                    'class' => 'input-priority',
                                ],
                            ],
                        ],
                    ])->label(false);?>
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
                    <!-- <?=$form->field($model, 'projecti_paomai_id')->textInput()?> -->
                    <div class="col-md-4">
                        <?=$form->field($model, 'paomai_quantity')->textarea(['rows' => 6])?>
                    </div>
                    <div class="col-md-4">
                        <?=$form->field($model, 'paomai_quality')->textarea(['rows' => 6])?>
                    </div>
                    <div class="col-md-4">
                        <?=$form->field($model, 'paomai_time')->textarea(['rows' => 6])?>
                    </div>
                </div>
            </div>

            <?=$form->field($model, 'lakshana_activity')->textarea(['rows' => 6])?>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">แผนปฏิบัติการกิจกรรม</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?=$form->field($model, 'temp_project_plan_id')->widget(MultipleInput::className(), [
                        'max' => 30,
                        'columns' => [
                            [
                                'name' => 'plan_process',
                                'type' => 'dropDownList',
                                'title' => 'ขั้นตอนการดำเนินงาน',
                                'defaultValue' => 1,
                                'items' => [
                                    1 => 'ชั้นว่างแผน(Plan)',
                                    2 => 'ชั้นดำเนินงาน (Do)',
                                    3 => 'ชั้นตรวจสอบ(Check)',
                                    4 => 'ชั้นปรับปรุง(Act)',
                                ],
                            ],
                            [
                                'name' => 'plan_detail',
                                'title' => 'รายละเอียดการดำเนินงาน',
                                'enableError' => true,
                            ],

                            [
                                'name' => 'plan_date',
                                'type' => DatePicker::className(),
                                'title' => 'วันเดือนปี',
                                'options' => [

                                    'language' => 'th', // Thai B.E.
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'plan_place',
                                'title' => 'สถานที่ดำเนินงาน',
                                'enableError' => true,
                            ],
                        ],
                    ])->label(false);?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <?=$form->field($model, 'project_start')->widget(
                        DatePicker::className(), [
                        'language' => 'th', // Thai B.E.
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                        ],
                    ]);?>
                </div>

                <div class="col-md-4">
                    <?=$form->field($model, 'project_end')->widget(
                        DatePicker::className(), [
                        'language' => 'th', // Thai B.E.
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                        ],
                    ]);?>
                </div>

                <div class="col-md-4">
                    <?=$form->field($model, 'project_location')->textInput(['maxlength' => true])?>
                </div>

            </div>

            <div class="clearfix"></div>

            <?=$form->field($model, 'project_evaluation')->textarea(['rows' => 6])?>

            <?=$form->field($model, 'project_benefit')->textarea(['rows' => 6])?>

            <?= $form->field($model, 'suggestion')->textarea(['rows' => 6]) ?>

            <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">ข้อมูลสำหรับลงนาม</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?=$form->field($model, 'lastpage_main')->widget(MultipleInput::className(), [
                        'max' => 6,
                        'columns' => [
                            [
                                'name' => 'last_role',
                                'type' => 'dropDownList',
                                'title' => 'สถานะผู้ลงนาม',
                                'defaultValue' => 1,
                                'items' => [
                                    1 => 'ผู้เสนอโครงการ/กิจกรรม',
                                    2 => 'ผู้เห็นชอบโครงการ/กิจกรรม',
                                    3 => 'ผู้อนุมัติโครงการ/กิจกรรม',
                                ],
                            ],
                            [
                                'name' => 'last_user',
                                'title' => 'ชื่อผู้ลงนาม',
                                'enableError' => true,
                            ],
                            [
                                'name' => 'last_position',
                                'title' => 'ตำแหน่งผู้ใช้งาน',
                                'enableError' => true,
                            ],
                        ],
                    ])->label(false);?>
                </div>
            </div>

            <div class="form-group">
                <?=Html::submitButton('บันทึก', ['class' => 'btn btn-success'])?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end();?>

</div>
