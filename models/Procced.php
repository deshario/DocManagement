<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procced".
 *
 * @property int $procced_id วิธีดำเนินงาน
 * @property string $procced_name วิธีการดำเนินงาน
 *
 * @property ProjectLaksana[] $projectLaksanas
 */
class Procced extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'procced';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['procced_name'], 'required'],
            [['procced_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'procced_id' => 'วิธีดำเนินงาน',
            'procced_name' => 'วิธีการดำเนินงาน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectLaksanas()
    {
        return $this->hasMany(ProjectLaksana::className(), ['procced_id' => 'procced_id']);
    }
}
