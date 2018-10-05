<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $project_id
 * @property string $project_name ชือโครงการ
 * @property int $created_by สร้างโดย
 * @property int $project_status สถานะโครงการ
 *
 * @property Activity[] $activities
 * @property Managers $createdBy
 */
class Project extends \yii\db\ActiveRecord
{

    const PROJECT_DEACTIVE = 10;
    const PROJECT_ACTIVE = 20;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by'], 'required'],
            [['created_by', 'project_status'], 'integer'],
            [['project_name'], 'string', 'max' => 45],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Managers::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'project_name' => 'ชื่อโครงการ',
            'created_by' => 'สร้างโดย',
            'project_status' => 'สถานะโครงการ',
        ];
    }

    public $projectStatus = [
        self::PROJECT_DEACTIVE => 'ไม่ได้รับการอนุมัติ',
        self::PROJECT_ACTIVE => 'อนุมัติแล้ว',
    ];

    public function getProjectStatus($status = null){
        if($status === null){
            return Yii::t('app',$this->projectStatus[$this->status]);
        }
        return Yii::t('app',$this->projectStatus[$status]);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['root_project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Managers::className(), ['id' => 'created_by']);
    }
}
