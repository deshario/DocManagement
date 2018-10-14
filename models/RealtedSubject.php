<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realted_subject".
 *
 * @property int $subject_id
 * @property string $subject_name รายวิชา
 * @property string $subject_teacher อาจารย์
 *
 * @property Activity[] $activities
 * @property Project[] $projects
 */
class RealtedSubject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'realted_subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_name', 'subject_teacher'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'subject_name' => 'รายวิชา',
            'subject_teacher' => 'อาจารย์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['realted_subject_id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['realted_subject_id' => 'subject_id']);
    }
}
