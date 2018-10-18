<?php

namespace app\models;

use http\Exception;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "activity_files".
 *
 * @property int $file_id
 * @property string $file_source ที่อยู่ไฟล์
 *
 * @property Activity[] $activities
 */
class ActivityFiles extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER = 'uploads';
    public $temp_activity_id;
    public $temp_project_id;
    public $temp_project_name;
    public $items;

    public static function tableName()
    {
        return 'activity_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_source'], 'string'],
            [['temp_activity_id','temp_project_id','temp_project_name'], 'safe'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['activity_temp_files' => 'file_id']);
    }

    public static function getUploadPath()
    {
        //return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/activity_files/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/activity_files/';
    }

    public function getActivityList()
    {
        $list = Activity::find()->orderBy('activity_id')->all();
        return ArrayHelper::map($list, 'activity_id', 'activity_name');
    }

}
