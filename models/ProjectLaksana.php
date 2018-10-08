<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_laksana".
 *
 * @property int $laksana_id
 * @property int $project_type_id ประเภท
 * @property int $procced_id วิธีดำเนินงาน
 *
 * @property Activity[] $activities
 * @property Project[] $projects
 * @property Procced $procced
 * @property ProjectType $projectType
 */
class ProjectLaksana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_laksana';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_type_id', 'procced_id'], 'required'],
            [['project_type_id', 'procced_id'], 'integer'],
            [['procced_id'], 'exist', 'skipOnError' => true, 'targetClass' => Procced::className(), 'targetAttribute' => ['procced_id' => 'procced_id']],
            [['project_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectType::className(), 'targetAttribute' => ['project_type_id' => 'type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'laksana_id' => 'Laksana ID',
            'project_type_id' => 'ประเภท',
            'procced_id' => 'วิธีดำเนินงาน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['project_laksana_id' => 'laksana_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_laksana_id' => 'laksana_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcced()
    {
        return $this->hasOne(Procced::className(), ['procced_id' => 'procced_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectType()
    {
        return $this->hasOne(ProjectType::className(), ['type_id' => 'project_type_id']);
    }
}
