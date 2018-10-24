<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use unclead\multipleinput\MultipleInput;

?>
    <div class="activity-files-index">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'table')->widget(MultipleInput::className(), [
            'max' => 10,
            'columns' => [
                [
                    'name' => 'title',
                    'title' => 'หัวข้อ',
                    'enableError' => true,
                ],
                [
                    'name' => 'page',
                    'title' => 'เลขหน้า',
                    'enableError' => true,
                    'options' => [
                        'type' => 'number',
                        'class' => 'input-priority',
                    ]
                ],
            ]
        ])->label(false); ?>

        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<?php