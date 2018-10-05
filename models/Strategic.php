<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "strategic".
 *
 * @property int $strategic_id
 * @property string $strategic_name ยุทธศาสตร์
 *
 * @property Activity[] $activities
 */
class Strategic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'strategic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['strategic_name'], 'string', 'max' => 90],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'strategic_id' => 'Strategic ID',
            'strategic_name' => 'ชื่อยุทธศาสตร์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['strategic_strategic_id' => 'strategic_id']);
    }
}
