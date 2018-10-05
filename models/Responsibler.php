<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsibler".
 *
 * @property int $responsible_id
 * @property string $responsible_by ชื่อผู้รับผิดชอบ
 *
 * @property Activity[] $activities
 */
class Responsibler extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'responsibler';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['responsible_by'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'responsible_id' => 'Responsible ID',
            'responsible_by' => 'ชื่อผู้รับผิดชอบ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['responsible_by' => 'responsible_id']);
    }
}
