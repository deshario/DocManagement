<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_plan".
 *
 * @property int $plan_id
 * @property int $plan_process ขั้นตอนการดำเนินงาน
 * @property string $plan_detail รายละเอียดการดำเนินงาน
 * @property string $plan_date วันเดือนปี
 * @property string $plan_place สถานที่ดำเนินงาน
 * @property string $plan_project_key อ้างอิง project
 *
 * @property Activity[] $activities
 * @property Project[] $projects
 */
class ProjectPlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_process', 'plan_detail', 'plan_date', 'plan_place', 'plan_project_key'], 'required'],
            [['plan_process'], 'integer'],
            [['plan_detail'], 'string'],
            [['plan_date'], 'safe'],
            [['plan_project_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'plan_id' => 'Plan ID',
            'plan_process' => 'ขั้นตอนการดำเนินงาน',
            'plan_detail' => 'รายละเอียดการดำเนินงาน',
            'plan_date' => 'วันเดือนปี',
            'plan_place' => 'สถานที่ดำเนินงาน',
            'plan_project_key' => 'อ้างอิง project',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['project_plan_id' => 'plan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_plan_id' => 'plan_id']);
    }
}
