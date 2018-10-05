<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indicator".
 *
 * @property int $indicator_id
 * @property string $indicator_name ตัวชี้วัด
 *
 * @property Activity[] $activities
 */
class Indicator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indicator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['indicator_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'indicator_id' => 'Indicator ID',
            'indicator_name' => 'ตัวชี้วัด Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['indicator_indicator_id' => 'indicator_id']);
    }
}
