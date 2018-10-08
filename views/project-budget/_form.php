<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectBudget */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-budget-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'budget_year')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Enter birth date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy/mm/dd'
        ]
    ]); ?>

    <?= $form->field($model, 'budget_type_id')->dropDownList($model->getBudgetTypeList(), ['prompt' => 'กรุณาเลือกประเภทงบประมาณ']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
