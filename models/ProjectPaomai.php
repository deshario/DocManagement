<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_paomai".
 *
 * @property int $paomai_id เป้าหมาย
 * @property int $paomai_type ชนิดของเป้าหมาย
 * @property string $paomai_value เป้าหมาย
 * @property int $paomai_owner เจ้าของเปาหมาย
 *
 * @property Activity[] $activities
 * @property Project[] $projects
 */
class ProjectPaomai extends \yii\db\ActiveRecord
{
    public $paomai_quantity; // ปริมาณ
    public $paomai_quality; // คุณภาพ

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
            [['paomai_type', 'paomai_value', 'paomai_owner'], 'required'],
            [['paomai_type', 'paomai_owner'], 'integer'],
            [['paomai_value'], 'string'],
            [['paomai_quality','paomai_quantity'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'paomai_id' => 'เป้าหมาย',
            'paomai_type' => 'ชนิดของเป้าหมาย',
            'paomai_value' => 'เป้าหมาย',
            'paomai_owner' => 'เจ้าของเปาหมาย',
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
