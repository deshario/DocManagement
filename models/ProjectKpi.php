<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_kpi".
 *
 * @property int $kpi_id
 * @property string $kpi_name ตัวชี้วัด
 * @property string $kpi_goal เป้าหมาย
 * @property int $kpi_owner เจ้าของ kpi
 *
 * @property Project[] $projects
 */
class ProjectKpi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_kpi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kpi_name', 'kpi_goal', 'kpi_owner'], 'required'],
            [['kpi_owner'], 'integer'],
            [['kpi_name'], 'string', 'max' => 255],
            [['kpi_goal'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kpi_id' => 'Kpi ID',
            'kpi_name' => 'ตัวชี้วัด',
            'kpi_goal' => 'เป้าหมาย',
            'kpi_owner' => 'เจ้าของ kpi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_kpi_id' => 'kpi_id']);
    }
}
