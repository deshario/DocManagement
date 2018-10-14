<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_paomai".
 *
 * @property int $paomai_id เป้าหมาย
 * @property string $project_quantity เชิงปริมาณ
 * @property string $project_quality เชิงคูณภาพ
 *
 * @property Activity[] $activities
 * @property Project[] $projects
 */
class ProjectPaomai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_paomai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_quantity', 'project_quality'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'paomai_id' => 'เป้าหมาย',
            'project_quantity' => 'เชิงปริมาณ',
            'project_quality' => 'เชิงคูณภาพ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['project_paomai_id' => 'paomai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['projecti_paomai_id' => 'paomai_id']);
    }
}
