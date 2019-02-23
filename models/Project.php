<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "project".
 *
 * @property int $project_id
 * @property string $project_name ชือโครงการ
 * @property int $organization_id ชื่อหน่วยงาน
 * @property int $project_consistency_id ความสอดคล่อง
 * @property int $responsibler_id ผู้รับผิดชอบ
 * @property int $project_laksana_id ลักษณะโครงการ
 * @property int $element_id องค์ประกอบ
 * @property int $product_id ผลผลิต
 * @property string $rationale หลักการและเหตุผล
 * @property string $objective วัตถุประสงค์
 * @property int $project_kpi_id เป้าหมายตัวชีวัด
 * @property int $projecti_paomai_id เป้าหมาย
 * @property string $lakshana_activity ลักษณะกิจกรรม
 * @property int $project_plan_id แผนปฏิบัติการกิจกรรม
 * @property string $project_start วันที่เริ่มโครงการ
 * @property string $related_subject
 * @property string $project_end วันที่สินสุดโครงการ
 * @property string $project_location สถานที่ดำเนินการ
 * @property string $project_evaluation การประเมินผล
 * @property string $project_benefit ประโยชน์ที่คาดว่าจะได้รับ
 * @property int $created_by สร้างโดย
 * @property int $project_money งบประมาณที่มี
 * @property int $budget_budget_type แหล่งที่มาของงบประมาณ
 * @property string $project_year ปีงบประมาณ
 * @property int $project_status สถานะโครงการ
 * @property string $project_key Project Key
 * @property int $lastpage_id หน้าสุดท้าย
 * @property string $suggestion ข้อเสนอแนะ
 *
 * @property Activity[] $activities
 * @property BudgetType $budgetBudgetType
 * @property Consistency $projectConsistency
 * @property Element $element
 * @property Lastpage $lastpage
 * @property Managers $createdBy
 * @property Organization $organization
 * @property Product $product
 * @property ProjectKpi $projectKpi
 * @property ProjectLaksana $projectLaksana
 * @property ProjectPaomai $projectiPaomai
 * @property ProjectPlan $projectPlan
 * @property Responsibler $responsibler
 * @property ProjectFiles[] $projectFiles
 */

class Project extends \yii\db\ActiveRecord
{
    public $items;

    //const PROJECT_DEACTIVE = 10;
    const PROJECT_RUNNING = 10;
    const PROJECT_FINISHED = 20;

    public $temp_type;
    public $temp_procced;

    public $kpi_name;
    public $kpi_goal;

    public $paomai_type_1; // เป้าหมายเชิงปริมาณ
    public $paomai_type_2; // เป้าหมายเชิงคุณภาพ

    public $plan_process;
    public $plan_detail;
    public $plan_date;
    public $plan_place;

    public $cons_strategic_id;
    public $cons_goal_id;
    public $cons_strategy_id;
    public $cons_indicator_id;

    public $temp_project_kpi_id;
    public $temp_project_plan_id;
    public $temp_project_consistency;
    public $temp_project_consistency_ii;

    public $paomai_quantity; // เป้าหมายเชิงปริมาณ
    public $paomai_quality; // เป้าหมายเชิงคุณภาพ
    public $paomai_time; // เป้าหมายเชิงคุณภาพ

    public $file;

    public $lastpage_main;
    public $lastpage_role;
    public $lastpage_name;
    public $lastpage_position;

    public static function tableName()
    {
        return 'project';
    }

    public function rules()
    {
        return [
            [['project_money','project_name','responsibler_id','project_year','budget_budget_type','organization_id','element_id','product_id'], 'required'],
            [['organization_id', 'responsibler_id', 'project_kpi_id','project_plan_id','project_laksana_id', 'element_id', 'product_id', 'projecti_paomai_id', 'created_by', 'budget_budget_type', 'project_status' ,'lastpage_id','project_consistency_id'], 'integer'],
            [['rationale', 'objective', 'lakshana_activity', 'project_evaluation','suggestion'], 'string'],
            [['project_year','realted_subject'], 'safe'],

            [['project_start', 'project_end', 'rationale','objective','lakshana_activity'], 'required'],
            [['project_benefit','project_evaluation','project_location','suggestion'], 'required'],
            [['temp_type','temp_procced'], 'required'],

            [['project_start', 'project_end'], 'string', 'max' => 50],
            [['related_subject'], 'string', 'max' => 255],

            [['lastpage_main','lastpage_role','lastpage_name','lastpage_position'], 'safe'],

            [['temp_project_kpi_id','temp_project_plan_id','file','temp_project_consistency','temp_project_consistency_ii'], 'safe'],
            [['plan_process','plan_detail','plan_date','plan_place'], 'safe'],

            [['cons_strategic_id','cons_goal_id','cons_strategy_id','cons_indicator_id'], 'safe'],

            [['temp_type', 'temp_procced', 'kpi_name', 'kpi_goal','paomai_quantity','paomai_quality','paomai_time'], 'safe'],
            [['project_name', 'project_location', 'project_key'], 'string', 'max' => 255],
            [['project_benefit'], 'string'],

            [['budget_budget_type'], 'exist', 'skipOnError' => true, 'targetClass' => BudgetType::className(), 'targetAttribute' => ['budget_budget_type' => 'budget_type_id']],
            [['element_id'], 'exist', 'skipOnError' => true, 'targetClass' => Element::className(), 'targetAttribute' => ['element_id' => 'element_id']],
            //[['goal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goal::className(), 'targetAttribute' => ['goal_id' => 'goal_id']],
            //[['indicator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Indicator::className(), 'targetAttribute' => ['indicator_id' => 'indicator_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Managers::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_id' => 'organization_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'product_id']],
            //[['project_budget_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectBudget::className(), 'targetAttribute' => ['project_budget_id' => 'budget_id']],
            [['project_kpi_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectKpi::className(), 'targetAttribute' => ['project_kpi_id' => 'kpi_id']],
            [['project_laksana_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectLaksana::className(), 'targetAttribute' => ['project_laksana_id' => 'laksana_id']],
            [['projecti_paomai_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectPaomai::className(), 'targetAttribute' => ['projecti_paomai_id' => 'paomai_id']],
            [['project_plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectPlan::className(), 'targetAttribute' => ['project_plan_id' => 'plan_id']],
            [['responsibler_id'], 'exist', 'skipOnError' => true, 'targetClass' => Responsibler::className(), 'targetAttribute' => ['responsibler_id' => 'responsible_id']],
            //[['strategic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Strategic::className(), 'targetAttribute' => ['strategic_id' => 'strategic_id']],
            //[['strategy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Strategy::className(), 'targetAttribute' => ['strategy_id' => 'strategy_id']],

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
            'organization_id' => 'ชื่อหน่วยงาน',
            'responsibler_id' => 'ผู้รับผิดชอบ',
            'project_laksana_id' => 'ลักษณะโครงการ',

            'cons_strategic_id' => 'ยุทธศาสตร์',
            'cons_goal_id' => 'เป้าประสงค์',
            'cons_strategy_id' => 'กลยุทธ์',
            'cons_indicator_id' => 'ตัวชี้วัด',

            'element_id' => 'องค์ประกอบ',
            'product_id' => 'ผลผลิต',
            'rationale' => 'หลักการและเหตุผล',
            'objective' => 'วัตถุประสงค์',
            'project_kpi_id' => 'เป้าหมายตัวชี้วัด',
            'projecti_paomai_id' => 'เป้าหมาย',
            'lakshana_activity' => 'ลักษณะกิจกรรม',
            'project_budget_id' => 'แหล่งที่มาของงบประมาณ',
            'project_plan_id' => 'แผนปฏิบัติการกิจกรรม',
            'project_location' => 'สถานที่ดำเนินการ',
            'project_evaluation' => 'การประเมินผล',
            'project_benefit' => 'ประโยชน์ที่คาดว่าจะได้รับ',
            'created_by' => 'สร้างโดย',
            'project_money' => 'งบประมาณที่มี',
            'project_status' => 'สถานะโครงการ',
            'project_start' => 'วันที่เริ่มโครงการ',
            'project_end' => 'วันที่สิ้นสุดโครงการ',
            'budget_budget_type' => 'แหล่งที่มาของงบประมาณ',
            'file' => 'ไฟล์',
            'project_key' => 'Project Key',

            'temp_type' => 'ประเภท',
            'temp_procced' => 'วิธีดำเนินงาน',
            'kpi_name' => 'ตัวชี้วัด (KPI)',
            'kpi_goal' => 'เป้าหมาย',
            'paomai_quantity' => 'เชิงปริมาณ',
            'project_year' => 'ปีงบประมาณ',
            'paomai_quality' => 'เชิงคุณภาพ',
            'paomai_time' => 'เชิงเวลา',
            'lastpage_id' => 'หน้าสุดท้าย',
            'project_consistency_id' => 'ความสอดคล่อง',
            'related_subject' => 'รายวิชาที่สอดคล่อง',
            'suggestion' => 'ข้อเสนอแนะ',
        ];
    }

    public $projectStatus = [
        self::PROJECT_RUNNING => 'กำลังดำเนินการ',
        self::PROJECT_FINISHED => 'อนุมัติแล้ว',
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
    public function getElement()
    {
        return $this->hasOne(Element::className(), ['element_id' => 'element_id']);
    } 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Managers::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['organization_id' => 'organization_id']);
    }

     public function getProjectConsistency() 
    { 
        return $this->hasOne(Consistency::className(), ['consistency_id' => 'project_consistency_id']);
    } 
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }

    public function getProjectKpi()
    {
        return $this->hasOne(ProjectKpi::className(), ['kpi_id' => 'project_kpi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectLaksana()
    {
        return $this->hasOne(ProjectLaksana::className(), ['laksana_id' => 'project_laksana_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectiPaomai()
    {
        return $this->hasOne(ProjectPaomai::className(), ['paomai_id' => 'projecti_paomai_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectPlan()
    {
        return $this->hasOne(ProjectPlan::className(), ['plan_id' => 'project_plan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsibler()
    {
        return $this->hasOne(Responsibler::className(), ['responsible_id' => 'responsibler_id']);
    } 

    public function getBudgetBudgetType()
    {
        return $this->hasOne(BudgetType::className(), ['budget_type_id' => 'budget_budget_type']);
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

    public function getRelatedGoal($id){
        $datas = Goal::find()->orderBy('goal_name')->where(['strategic_id'=>$id])->all();
        return $this->MapData($datas,'goal_id','goal_name');
    }

    public function getRelatedIndicator($id){
        $datas = Indicator::find()->orderBy('indicator_name')->where(['goal_id'=>$id])->all();
        return $this->MapData($datas,'indicator_id','indicator_name');
    }
    
    public function getRelatedStrategy($id){
        $datas = Strategy::find()->orderBy('strategy_name')->where(['goal_id'=>$id])->all();
        return $this->MapData($datas,'strategy_id','strategy_name');
    }

    public function MapData($datas,$fieldId,$fieldName){
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id'=>$value->{$fieldId},'name'=>$value->{$fieldName}]);
        }
        return $obj;
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

    public function getProjectTypeList(){
        $list = ProjectType::find()->orderBy('type_id')->all();
        return ArrayHelper::map($list,'type_id','type_name');
    }

    public function getProccedTypeList(){
        $list = Procced::find()->orderBy('procced_id')->all();
        return ArrayHelper::map($list,'procced_id','procced_name');
    }

    public function getBudgetTypeList(){
        $list = BudgetType::find()->orderBy('budget_type_id')->all();
        return ArrayHelper::map($list,'budget_type_id','budget_type_name');
    }

    public function getRealtedSubjectList(){
        $list = RealtedSubject::find()->orderBy('subject_id')->all();
        foreach($list as &$lib){
            $lib->subject_name = $lib->subject_name.' | '.$lib->subject_teacher;
        }
        return ArrayHelper::map($list,'subject_id','subject_name');
    }

    public function getProjectFiles()
    {
        return $this->hasMany(ProjectFiles::className(), ['project_id' => 'project_id']);
    }

    public function ha(){
           return ArrayHelper::map(Strategic::find()
        ->orderBy('strategic_id')
        ->all(),
        'strategic_id',
        'strategic_name');
    }
}
