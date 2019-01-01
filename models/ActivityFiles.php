<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * This is the model class for table "activity_files".
 *
 * @property int $file_id
 * @property string $file_source ที่อยู่ไฟล์
 * @property int $activity_id กิจกรรม
 *
 * @property Activity $activity
 */
class ActivityFiles extends \yii\db\ActiveRecord
{

    const UPLOAD_FOLDER = 'uploads';

    public $temp_activity_name;
    public $temp_activity_id;

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
            [['file_source'], 'required'],
            [['activity_id'], 'required'],
            [['temp_activity_name','temp_activity_id'], 'safe'],
            [['activity_id'], 'integer'],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activity::className(), 'targetAttribute' => ['activity_id' => 'activity_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'file_source' => 'ที่อยู่ไฟล์ (ไม่เกิน 2 mb และ ต้องเป็นนามสกุล   .pdf  เท่านั่น)',
            'activity_id' => 'กิจกรรม',
            'temp_activity_name' => 'กิจกรรม',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['activity_id' => 'activity_id']);
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
}
