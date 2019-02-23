<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * This is the model class for table "activity".
 *
 * @property int $activity_id
 * @property int $root_project_id โครงการ
 * @property string $activity_name ชือกิจกรรม
 * @property string $activity_rationale หลักการและเหตุผล
 * @property string $activity_type ลักษณะกิจกรรม
 * @property string $objective วัตถุประสงค์
 * @property string $evaluation การประเมินผล
 * @property string $benefit ประโยช์ที่คาดว่าจะได้รับ
 * @property int $organization_organization_id หน่วยงาน
 * @property int $responsible_by ผู้รับผิดชอบ
 * @property int $activity_consistency_id ความสอดคล่อง
 * @property int $activity_ep_id องค์ประกอบ & ผลผลิต
 * @property int $project_laksana_id ลักษณะโครงการ
 * @property int $project_paomai_id เป้าหมายผลผลิต
 * @property int $project_plan_id กิจกรรมการดำเนินงาน
 * @property int $budget_type_id แหล่งที่มาของงบประมาณ
 * @property int $activity_money งบประมาณ
 * @property string $related_subject
 * @property int $budget_details_id รายละเอียดของงบประมาณ
 * @property int $activity_status สถานะ
 * @property string $activity_key Activity Key
 * @property int $lastpage_id หน้าสุดท้าย
 * @property int $created_by
 * @property string $suggestion ข้อเสนอแนะ
 *
 * @property BudgetDetails $budgetDetails
 * @property BudgetType $budgetType
 * @property Consistency $activityConsistency
 * @property ElementProduct $activityEp
 * @property Lastpage $lastpage
 * @property Managers $createdBy
 * @property Organization $organizationOrganization
 * @property Project $rootProject
 * @property ProjectLaksana $projectLaksana
 * @property ProjectPaomai $projectPaomai
 * @property ProjectPlan $projectPlan
 * @property Responsibler $responsibleBy
 * @property ActivityFiles[] $activityFiles
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
    public $activity_plan;

    public $temp_type;
    public $temp_procced;
    public $temp_project_plan_id;
    public $budget_plan;

    public $paomai_quantity; // เป้าหมายเชิงปริมาณ
    public $paomai_quality; // เป้าหมายเชิงคุณภาพ
    public $paomai_time; // เป้าหมายเชิงคุณภาพ

    public $status1;

    public $temp_max_amount;

    public $lastpage_main;
    public $lastpage_role;
    public $lastpage_name;
    public $lastpage_position;

    public $cons_strategic_id;
    public $cons_goal_id;
    public $cons_strategy_id;
    public $cons_indicator_id;

    public $temp_project_consistency;
    public $temp_element_product;

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
            [['activity_name','activity_money','organization_organization_id','responsible_by','created_by'], 'required'],
            [['activity_type','activity_rationale','benefit','objective'], 'required'],
            [['project_laksana_id','budget_type_id','temp_type', 'temp_procced','suggestion'], 'required'],
            [['activity_temp_files','temp_project_plan_id','activity_plan','temp_project_consistency','temp_element_product'], 'safe'],
            [['temp_max_amount','budget_plan'], 'safe'],
            [['temp_max_amount','activity_money'], 'number'],
            [['root_project_id', 'organization_organization_id','responsible_by', 'lastpage_id','activity_consistency_id'], 'integer'],
            [['activity_rationale', 'objective', 'activity_type', 'evaluation', 'benefit', 'suggestion'], 'string'],
            [['activity_name'], 'string', 'max' => 255],
            [['cons_strategic_id','cons_goal_id','cons_strategy_id','cons_indicator_id'], 'safe'],
            [['activity_key','related_subject'], 'string', 'max' => 255],
            [['temp_type', 'temp_procced', 'paomai_quantity','paomai_quality','paomai_time'], 'safe'],

            [['lastpage_main','lastpage_role','lastpage_name','lastpage_position'], 'safe'],

            ['activity_money', 'validateChildrenFunds'],

          //  [['temp_project_name','temp_organization','temp_strategic','temp_goal','temp_strategy','temp_indicator','temp_element','temp_product'], 'required'],
            [['budget_details_id'], 'exist', 'skipOnError' => true, 'targetClass' => BudgetDetails::className(), 'targetAttribute' => ['budget_details_id' => 'detail_id']],
            [['budget_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BudgetType::className(), 'targetAttribute' => ['budget_type_id' => 'budget_type_id']],
            //[['element_element_id'], 'exist', 'skipOnError' => true, 'targetClass' => Element::className(), 'targetAttribute' => ['element_element_id' => 'element_id']],
            [['organization_organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_organization_id' => 'organization_id']],
            //[['product_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_product_id' => 'product_id']],
            [['root_project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['root_project_id' => 'project_id']],
            [['project_laksana_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectLaksana::className(), 'targetAttribute' => ['project_laksana_id' => 'laksana_id']],
            [['project_paomai_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectPaomai::className(), 'targetAttribute' => ['project_paomai_id' => 'paomai_id']],
            [['project_plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectPlan::className(), 'targetAttribute' => ['project_plan_id' => 'plan_id']],
            [['responsible_by'], 'exist', 'skipOnError' => true, 'targetClass' => Responsibler::className(), 'targetAttribute' => ['responsible_by' => 'responsible_id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Managers::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'activity_rationale' => 'หลักการและเหตุผล',
            'objective' => 'วัตถุประสงค์',
            'activity_type' => ' ลักษณะกิจกรรม',
            'responsible_by' => 'ผู้รับผิดชอบ',
            'evaluation' => 'การประเมินผล',
            'benefit' => 'ประโยชน์ที่คาดว่าจะได้รับ',
            'related_subject' => 'รายวิชาที่สอดคล้อง',
            'organization_organization_id' => 'ชื่อหน่วยงาน',

            'activity_consistency_id' => 'ความสอดคล่อง',
            'activity_ep_id' => 'องค์ประกอบ & ผลผลิต',
            'cons_strategic_id' => 'ยุทธศาสตร์',
            'cons_goal_id' => 'เป้าประสงค์',
            'cons_strategy_id' => 'กลยุทธ์',
            'cons_indicator_id' => 'ตัวชี้วัด',

           // 'element_element_id' => 'องค์ประกอบ',
           // 'product_product_id' => 'ผลผลิต',
            'activity_temp_files' => 'ไฟล์ประกอบ',
            'activity_key' => 'Activity Key',

            'temp_project_name' => 'ชื่อโครงการ',
            'temp_organization' => 'ชื่อหน่วยงาน',
            'temp_strategic' => 'ยุทธศาสตร์',
            'temp_goal' => 'เป้าประสงค์',
            'temp_strategy' => 'กลยุทธ์',
            'temp_indicator' => 'ตัวชี้วัด',
            'temp_element' => 'องค์ประกอบ',
            'temp_product' => 'ผลผลิต',

            'temp_type' => 'ประเภท',
            'temp_procced' => 'วิธีดำเนินงาน',

            'project_laksana_id' => 'ลักษณะโครงการ',
            'project_paomai_id' => 'เป้าหมายผลผลิต',
            'project_plan_id' => 'กิจกรรมการดำเนินงาน',
            'budget_type_id' => 'แหล่งที่มาของงบประมาณ',
            'activity_money' => 'งบประมาณ',
            'budget_details_id' => 'รายละเอียดของงบประมาณ',
            'activity_status' => 'สถานะ',

            'paomai_quantity' => 'เชิงปริมาณ',
            'paomai_quality' => 'เชิงคุณภาพ',
            'paomai_time' => 'เชิงเวลา',

            'created_by' => 'Created By',
            'suggestion' => 'ข้อเสนอแนะ',
        ];
    }


    public function validateChildrenFunds($attribute, $params)
    {
        if ($this->activity_money > $this->getTotal()) {
             $this->addError('activity_money', 'งบประมาณที่เหลือ ฿'.$this->getTotal());
        }
    }

    public function getTotal(){
        $total = 0;
        $project_id = Yii::$app->request->get('proj_id');
        $project = Project::find()->where(['project_id' => $project_id])->one();
        $activities = Activity::find()->where(['root_project_id' => $project_id])->all();
        if (!empty($activities)) {
            foreach ($activities as $activity) {
                $total = $total + $activity->activity_money;
            }
        }
        $total = $project->project_money-$total;
        return $total;
    }

    public function getBudgetDetails()
    {
        return $this->hasOne(BudgetDetails::className(), ['detail_id' => 'budget_details_id']);
    }

    public function getBudgetType()
    {
        return $this->hasOne(BudgetType::className(), ['budget_type_id' => 'budget_type_id']);
    }

    public function getOrganizationOrganization()
    {
        return $this->hasOne(Organization::className(), ['organization_id' => 'organization_organization_id']);
    }

    public function getRealtedSubject()
    {
        return $this->hasOne(RealtedSubject::className(), ['subject_id' => 'realted_subject_id']);
    }

    public function getActivityEp()
    {
        return $this->hasOne(ElementProduct::className(), ['element_product_id' => 'activity_ep_id']);
    }

    public function getRootProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'root_project_id']);
    }

    public function getProjectLaksana()
    {
        return $this->hasOne(ProjectLaksana::className(), ['laksana_id' => 'project_laksana_id']);
    }

    public function getProjectPaomai()
    {
        return $this->hasOne(ProjectPaomai::className(), ['paomai_id' => 'project_paomai_id']);
    }

    public function getProjectPlan()
    {
        return $this->hasOne(ProjectPlan::className(), ['plan_id' => 'project_plan_id']);
    }

    public function getResponsibleBy()
    {
        return $this->hasOne(Responsibler::className(), ['responsible_id' => 'responsible_by']);
    }

    public function getCreatedBy()
    {
        return $this->hasOne(Managers::className(), ['id' => 'created_by']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivityFiles()
    {
        return $this->hasMany(ActivityFiles::className(), ['activity_id' => 'activity_id']);
    }

    public function listDownloadFiles($type){
        $docs_file = '';
            //$data = $type==='activity_temp_files'?$this->activity_temp_files:$this->activity_temp_files;
            $files = Json::decode($type);
            if(is_array($files)){
                $docs_file ='<ul class="list-group-item">';
                foreach ($files as $key => $value) {
                    $docs_file .= '<li class="list-group-item">'.Html::a($value,['/activity-files/download',
                            'id'=>$this->activity_id,
                            'file'=>$key,
                            'file_name'=>$value,
                            //'project_name'=>$project_name,
                        ]).'</li>';
                }
                $docs_file .='</ul>';
            }
        return $docs_file;
    }
    /*
     * <ul class="list-group">
  <li class="list-group-item">First item</li>
  <li class="list-group-item">Second item</li>
  <li class="list-group-item">Third item</li>
</ul>
    */
}
