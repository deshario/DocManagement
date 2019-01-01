<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goal".
 *
 * @property int $goal_id
 * @property string $goal_name เป้าประสงค์
 *
 * @property Activity[] $activities
 */
class Goal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['goal_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'goal_id' => 'Goal ID',
            'goal_name' => ' เป้าประสงค์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['goal_goal_id' => 'goal_id']);
    }
}
