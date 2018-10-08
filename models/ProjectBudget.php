<?php

namespace app\models;

use DateTime;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "project_budget".
 *
 * @property int $budget_id
 * @property string $budget_year ปีงบประมาณ
 * @property int $budget_type_id ประเภทงบประมาณ
 *
 * @property Activity[] $activities
 * @property Project[] $projects
 * @property BudgetType $budgetType
 */
class ProjectBudget extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_budget';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['budget_year', 'budget_type_id'], 'required'],
            [['budget_year'], 'safe'],
            [['budget_type_id'], 'integer'],
            [['budget_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BudgetType::className(), 'targetAttribute' => ['budget_type_id' => 'budget_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'budget_id' => 'Budget ID',
            'budget_year' => 'ปีงบประมาณ',
            'budget_type_id' => 'ประเภทงบประมาณ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['project_budget_id' => 'budget_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['project_budget_id' => 'budget_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBudgetType()
    {
        return $this->hasOne(BudgetType::className(), ['budget_type_id' => 'budget_type_id']);
    }

    public function getBudgetTypeList(){
        $list = BudgetType::find()->orderBy('budget_type_id')->all();
        return ArrayHelper::map($list,'budget_type_id','budget_type_name');
    }

    public function getYear($pdate) {
        $date = DateTime::createFromFormat("Y-m-d", $pdate);
        return $date->format("Y");
    }

    public function getMyAge($pdate) {
        $date = DateTime::createFromFormat("Y-m-d", $pdate);
        $year = $date->format("Y");
        $now = new DateTime();
        $current_year = $now->format("Y");
        $age = $current_year - $year;
        return $age;
    }
}
