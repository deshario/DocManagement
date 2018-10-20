<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "project_files".
 *
 * @property int $file_id
 * @property string $file_source ที่อยู่ไฟล์
 * @property int $project_id โครงการ
 *
 * @property Project $project
 */
class ProjectFiles extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER = 'uploads';

    public $temp_project_name;
    public $temp_project_id;

    public static function tableName()
    {
        return 'project_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_source'], 'string'],
            [['project_id'], 'required'],
            [['project_id'], 'integer'],
            [['temp_project_id','temp_project_name'], 'safe'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'project_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'file_source' => 'ที่อยู่ไฟล์',
            'project_id' => 'โครงการ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
    }

    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/project_files/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/project_files/';
    }
}
