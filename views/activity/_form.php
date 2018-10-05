<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */

$project_id = Yii::$app->request->get('proj_id');
$project_name = Yii::$app->request->get('proj_name');
$model->root_project_id = $project_id;
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'root_project_id')->hiddenInput(['value' => $project_id])->label(false); ?> -->

    <!-- <div class="col-md-6">
        <?= $form->field($model, 'temp_project_name')->textInput(['readonly' => true, 'value' => $project_name]) ?>
    </div> -->

    <div class="col-md-6">
        <?= $form->field($model, 'activity_name')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'organization_organization_id')->dropDownList($model->getOrganizationList(), ['prompt' => 'กรุณาเลือกองค์กร']) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'activity_rationale')->textarea(['rows' => 3, 'placeholder' => '1. lorem ipsum 
2. lorem ipsum 
3. lorem ipsum ']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'strategic_strategic_id')->dropDownList($model->getStrategicList(), ['prompt' => 'กรุณาเลือกยุทธศาสตร์']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'goal_goal_id')->dropDownList($model->getGoalList(), ['prompt' => 'กรุณาเลือกเป้าประสงค์']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'strategy_strategy_id')->dropDownList($model->getStrategyList(), ['prompt' => 'กรุณาเลือกกลยุทธ์']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'indicator_indicator_id')->dropDownList($model->getIndicatorList(), ['prompt' => 'กรุณาเลือกตัวชี้วัด']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'element_element_id')->dropDownList($model->getElementList(), ['prompt' => 'กรุณาเลือกองค์ประกอบ']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'product_product_id')->dropDownList($model->getProductList(), ['prompt' => 'กรุณาเลือกผลผลิต']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'activity_type')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'activity_place')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'responsible_by')->dropDownList($model->getResponsiblerList(), ['prompt' => 'กรุณาเลือกผู้รับผิดชอบ']) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'objective')->textarea(['rows' => 3, 'placeholder' => '1. lorem ipsum 
2. lorem ipsum 
3. lorem ipsum ']) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'evaluation')->textarea(['rows' => 3, 'placeholder' => '1. lorem ipsum 
2. lorem ipsum 
3. lorem ipsum ']) ?>
    </div>

    <div class="col-md-12">
        <?= $form->field($model, 'benefit')->textarea(['rows' => 3, 'placeholder' => '1. lorem ipsum 
2. lorem ipsum 
3. lorem ipsum ']) ?>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
