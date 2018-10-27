<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lastpage".
 *
 * @property int $last_id
 * @property int $last_role ชนิดของผู้ใช้งาน
 * @property string $last_user ชื่อผู้ใช้งาน
 * @property string $last_position ตำแหน่งผู้ใช้งาน
 * @property string $project_act_key อ้างอิง project
 *
 * @property Activity[] $activities
 * @property Project[] $projects
 */
class LastPage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lastpage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_role', 'last_user', 'last_position', 'project_act_key'], 'required'],
            [['last_id', 'last_role'], 'integer'],
            [['last_user', 'last_position'], 'string', 'max' => 100],
            [['project_act_key'], 'string', 'max' => 255],
            [['last_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'last_id' => 'Last ID',
            'last_role' => 'ชนิดของผู้ใช้งาน',
            'last_user' => 'ชื่อผู้ใช้งาน',
            'last_position' => 'ตำแหน่งผู้ใช้งาน',
            'project_act_key' => 'อ้างอิง project',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['lastpage_id' => 'last_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['lastpage_id' => 'last_id']);
    }
}
