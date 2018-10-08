<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_type".
 *
 * @property int $type_id
 * @property string $type_name ประเภทโครงการ
 *
 * @property ProjectLaksana[] $projectLaksanas
 */
class ProjectType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_name'], 'required'],
            [['type_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'type_name' => 'ประเภทโครงการ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectLaksanas()
    {
        return $this->hasMany(ProjectLaksana::className(), ['project_type_id' => 'type_id']);
    }
}
