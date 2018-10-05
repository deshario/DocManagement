<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "strategy".
 *
 * @property int $strategy_id
 * @property string $strategy_name กลยุทธ์
 *
 * @property Activity[] $activities
 */
class Strategy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'strategy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['strategy_name'], 'string', 'max' => 90],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'strategy_id' => 'Strategy ID',
            'strategy_name' => 'กลยุทธ์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['strategy_strategy_id' => 'strategy_id']);
    }
}
