<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "budget_details".
 *
 * @property int $detail_id
 * @property string $detail_name รายละเอียดของงบประมาณ
 * @property int $detail_price งบประมาณ
 * @property string $activity_key กิจกรรมที่อ้างอิง
 *
 * @property Activity[] $activities
 */
class BudgetDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'budget_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detail_name', 'detail_price', 'activity_key'], 'required'],
            [['detail_price'], 'integer'],
            [['detail_name', 'activity_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'detail_id' => 'Detail ID',
            'detail_name' => 'รายละเอียดของงบประมาณ',
            'detail_price' => 'งบประมาณ',
            'activity_key' => 'กิจกรรมที่อ้างอิง',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['budget_details_id' => 'detail_id']);
    }
}
