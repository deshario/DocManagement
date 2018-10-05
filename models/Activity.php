<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "activity".
 *
 * @property int $activity_id
 * @property int $root_project_id โครงการ
 * @property string $activity_name ชือกิจกรรม
 * @property string $activity_rationale หลักการและเหตุผล
 * @property string $activity_type ลักษณะกิจกรรม
 * @property string $activity_place สถานที่ดำเนินการ
 * @property string $objective วัตถุประสงค์
 * @property string $evaluation การประเมินผล
 * @property string $benefit ประโยช์ที่คาดว่าจะได้รับ
 * @property int $organization_organization_id หน่วยงาน
 * @property int $strategic_strategic_id ยุทธศาสตร์
 * @property int $goal_goal_id เป้าประสงค์
 * @property int $responsible_by ผู้รับผิดชอบ
 * @property int $strategy_strategy_id กลยุทธ์
 * @property int $indicator_indicator_id ตัวชี้วัด
 * @property int $element_element_id องค์ประกอบ
 * @property int $product_product_id ผลผลิต
 *
 * @property Element $elementElement
 * @property Goal $goalGoal
 * @property Indicator $indicatorIndicator
 * @property Organization $organizationOrganization
 * @property Product $productProduct
 * @property Project $rootProject
 * @property Responsibler $responsibleBy
 * @property Strategic $strategicStrategic
 * @property Strategy $strategyStrategy
 */
class Activity extends \yii\db\ActiveRecord
{

    public $temp_project_name;
    public $temp_organization;
    public $temp_strategic;
    public $temp_goal;
    public $temp_strategy;
    public $temp_indicator;
    public $temp_element;
    public $temp_product;

    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['root_project_id', 'product_product_id'], 'required'],
            [['root_project_id', 'organization_organization_id', 'strategic_strategic_id', 'goal_goal_id', 'strategy_strategy_id', 'indicator_indicator_id', 'element_element_id', 'product_product_id','responsible_by'], 'integer'],
            [['activity_rationale', 'objective', 'evaluation', 'benefit'], 'string'],
            [['activity_name'], 'string', 'max' => 45],
            [['activity_type'], 'string', 'max' => 255],
            [['activity_place'], 'string', 'max' => 90],

          //  [['temp_project_name','temp_organization','temp_strategic','temp_goal','temp_strategy','temp_indicator','temp_element','temp_product'], 'required'],

//            [['element_element_id'], 'exist', 'skipOnError' => true, 'targetClass' => Element::className(), 'targetAttribute' => ['element_element_id' => 'element_id']],
//            [['goal_goal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goal::className(), 'targetAttribute' => ['goal_goal_id' => 'goal_id']],
//            [['indicator_indicator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Indicator::className(), 'targetAttribute' => ['indicator_indicator_id' => 'indicator_id']],
//            [['organization_organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_organization_id' => 'organization_id']],
//            [['product_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_product_id' => 'product_id']],
            //[['responsible_by'], 'exist', 'skipOnError' => true, 'targetClass' => Responsibler::className(), 'targetAttribute' => ['responsible_by' => 'responsible_id']],
//            [['root_project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['root_project_id' => 'project_id']],
//            [['strategic_strategic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Strategic::className(), 'targetAttribute' => ['strategic_strategic_id' => 'strategic_id']],
//            [['strategy_strategy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Strategy::className(), 'targetAttribute' => ['strategy_strategy_id' => 'strategy_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'activity_id' => 'Activity ID',
            'root_project_id' => 'ชื่อโครงการ',
            'activity_name' => 'ชื่อกิจกรรม',
            'activity_rationale' => 'หลักการและเหตผล',
            'objective' => 'วัตถุประสงค์',
            'activity_type' => ' ลักษณะกิจกรรม',
            'activity_place' => 'สถานที่ดำเนินงาน',
            'responsible_by' => 'ผู้รับผิดชอบ',
            'evaluation' => 'การประเมินผล',
            'benefit' => 'ประโยชน์ที่คาดว่าจะได้รับ',
            'organization_organization_id' => 'ชื่อหน่วยงาน',
            'strategic_strategic_id' => 'ยุทธศาสตร์',
            'goal_goal_id' => 'เป้าประสงค์',
            'strategy_strategy_id' => 'กลยุทธ์',
            'indicator_indicator_id' => 'ตัวชี้วัด',
            'element_element_id' => 'องค์ประกอบ',
            'product_product_id' => 'ผลผลิต',

            'temp_project_name' => 'ชื่อโครงการ',
            'temp_organization' => 'ชื่อหน่วยงาน',
            'temp_strategic' => 'ยุทธศาสตร์',
            'temp_goal' => 'เป้าประสงค์',
            'temp_strategy' => 'กลยุทธ์',
            'temp_indicator' => 'ตัวชี้วัด',
            'temp_element' => 'องค์ประกอบ',
            'temp_product' => 'ผลผลิต',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElementElement()
    {
        return $this->hasOne(Element::className(), ['element_id' => 'element_element_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoalGoal()
    {
        return $this->hasOne(Goal::className(), ['goal_id' => 'goal_goal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicatorIndicator()
    {
        return $this->hasOne(Indicator::className(), ['indicator_id' => 'indicator_indicator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationOrganization()
    {
        return $this->hasOne(Organization::className(), ['organization_id' => 'organization_organization_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_product_id']);
    }

    public function getResponsibleBy()
    {
        return $this->hasOne(Responsibler::className(), ['responsible_id' => 'responsible_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRootProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'root_project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStrategicStrategic()
    {
        return $this->hasOne(Strategic::className(), ['strategic_id' => 'strategic_strategic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStrategyStrategy()
    {
        return $this->hasOne(Strategy::className(), ['strategy_id' => 'strategy_strategy_id']);
    }

    public function getOrganizationList(){
        $list = Organization::find()->orderBy('organization_id')->all();
        return ArrayHelper::map($list,'organization_id','organization_name');
    }

    public function getStrategicList(){
        $list = Strategic::find()->orderBy('strategic_id')->all();
        return ArrayHelper::map($list,'strategic_id','strategic_name');
    }

    public function getGoalList(){
        $list = Goal::find()->orderBy('goal_id')->all();
        return ArrayHelper::map($list,'goal_id','goal_name');
    }

    public function getStrategyList(){
        $list = Strategy::find()->orderBy('strategy_id')->all();
        return ArrayHelper::map($list,'strategy_id','strategy_name');
    }

    public function getIndicatorList(){
        $list = Indicator::find()->orderBy('indicator_id')->all();
        return ArrayHelper::map($list,'indicator_id','indicator_name');
    }

    public function getElementList(){
        $list = Element::find()->orderBy('element_id')->all();
        return ArrayHelper::map($list,'element_id','element_name');
    }

    public function getProductList(){
        $list = Product::find()->orderBy('product_id')->all();
        return ArrayHelper::map($list,'product_id','product_name');
    }

    public function getResponsiblerList(){
        $list = Responsibler::find()->orderBy('responsible_id')->all();
        return ArrayHelper::map($list,'responsible_id','responsible_by');
    }
}
