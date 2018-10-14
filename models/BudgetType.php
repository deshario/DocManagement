<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "budget_type".
 *
 * @property int $budget_type_id
 * @property string $budget_type_name ชืองบประมาณ
 *
 * @property Activity[] $activities
 * @property Project[] $projects
 */
class BudgetType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'budget_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['budget_type_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'budget_type_id' => 'Budget Type ID',
            'budget_type_name' => 'ชืองบประมาณ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['budget_type_id' => 'budget_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['budget_budget_type' => 'budget_type_id']);
    }
}
