<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consistency".
 *
 * @property int $consistency_id
 * @property int $cons_strategic_id ยุทธศาสตร์
 * @property int $cons_goal_id เป้าประสงค์
 * @property int $cons_strategy_id กลยุทธ์
 * @property int $cons_indicator_id ตัวชี้วัด
 * @property string $project_act_key อ้างอิง project รึ Act
 *
 * @property Activity[] $activities
 * @property Goal $consGoal
 * @property Indicator $consIndicator
 * @property Strategic $consStrategic
 * @property Strategy $consStrategy
 * @property Project[] $projects
 */
class Consistency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consistency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cons_strategic_id', 'cons_goal_id', 'cons_strategy_id', 'cons_indicator_id'], 'integer'],
            [['project_act_key'], 'string', 'max' => 255],
            [['cons_goal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goal::className(), 'targetAttribute' => ['cons_goal_id' => 'goal_id']],
            [['cons_indicator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Indicator::className(), 'targetAttribute' => ['cons_indicator_id' => 'indicator_id']],
            [['cons_strategic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Strategic::className(), 'targetAttribute' => ['cons_strategic_id' => 'strategic_id']],
            [['cons_strategy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Strategy::className(), 'targetAttribute' => ['cons_strategy_id' => 'strategy_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'consistency_id' => 'Consistency ID',
            'cons_strategic_id' => 'ยุทธศาสตร์',
            'cons_goal_id' => 'เป้าประสงค์',
            'cons_strategy_id' => 'กลยุทธ์',
            'cons_indicator_id' => 'ตัวชี้วัด',
            'project_act_key' => 'อ้างอิง project รึ Act',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['activity_consistency_id' => 'consistency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsGoal()
    {
        return $this->hasOne(Goal::className(), ['goal_id' => 'cons_goal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsIndicator()
    {
        return $this->hasOne(Indicator::className(), ['indicator_id' => 'cons_indicator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsStrategic()
    {
        return $this->hasOne(Strategic::className(), ['strategic_id' => 'cons_strategic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsStrategy()
    {
        return $this->hasOne(Strategy::className(), ['strategy_id' => 'cons_strategy_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_consistency_id' => 'consistency_id']);
    }
}
