<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "element".
 *
 * @property int $element_id
 * @property string $element_name องค์ประกอบ
 *
 * @property Activity[] $activities
 */
class Element extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'element';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['element_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'element_id' => 'Element ID',
            'element_name' => 'องค์ประกอบ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['element_element_id' => 'element_id']);
    }
}
