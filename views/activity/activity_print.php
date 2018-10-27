<html>
<head>
    <title></title>
</head>
<body>
<?php

use app\models\Activity;
use app\models\BudgetDetails;
use app\models\LastPage;
use app\models\ProjectPlan;

$activity_name =  $model->activity_name;
$activity_money =  $model->activity_money;
$budget_type =  $model->budgetType->budget_type_name;
$organization = $model->organizationOrganization->organization_name;
$responsible_by = $model->responsibleBy->responsible_by;
$type = $model->projectLaksana->projectType->type_name;
$procced = $model->projectLaksana->procced->procced_name;

$strategic = $model->strategicStrategic->strategic_name;
$goal_name = $model->goalGoal->goal_name;
$strategy = $model->strategyStrategy->strategy_name;
$indicator_name = $model->indicatorIndicator->indicator_name;
$realted_sub = $model->realtedSubject->subject_name;
$element_name = $model->elementElement->element_name;
$product_name = $model->productProduct->product_name;
$rationale =  $model->activity_rationale;
$objective =  $model->objective;
$year =  $model->rootProject->project_year;
$lakshana_activity = $model->activity_type;
$quantity = $model->projectPaomai->project_quantity;
$quality = $model->projectPaomai->project_quality;
$creator = $model->rootProject->createdBy->username;
$benefit = $model->benefit;
$space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
?>


<?php
echo '<p align="center">'.$activity_name.' <br/> วิทยาลัยสงฆ์นครน่าน มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย <br/> เฉลิมพระเกียรติสมเด็จพระเทพรัตนราชสุดา สยามบรมราชกุมารี <br/>  ปีงบประมาณ พ.ศ. '.$year.' <br/> *************************************************</p>';

echo '<p><strong>๑.ชื่อกิจกรรม</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$activity_name.'</p>';

echo '<p><strong>๒. ชื่อหน่วยงาน</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$organization.'</p>';

echo '<p><strong>๓. ผู้รับผิดชอบโครงการ </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$responsible_by.'</p>';

echo '<p><strong>๔. ลักษณะโครงการ</strong></p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประเภท : '.$type.'</p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วิธีดำเนินงาน : '.$procced.'</p>';

echo '<p><strong>๕. ความสอดคล้อง</strong></p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ยุทธศาสตร์ : '.$strategic.'</p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เปาประสงค์ : '.$goal_name.'</p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กลยุทธ์ : '.$strategy.'</p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตัวชี้วัด : '.$indicator_name.'</p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;องค์ประกอบ : '.$element_name.'</p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายวิชาที่สอดคล้อง/อาจารย์ที่ปรึกษา : '.$realted_sub.'</p>';

echo '<p><strong>๖. ผลผลิต </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$product_name.'</p>';

echo '<p><strong>๗. หลักการและเหตุผล</strong></p>';
echo $space.$rationale;

echo '<p><strong>๘. วัตถุประสงค์</strong></p>';
echo $space.$objective;

echo '<p><strong>๙. ลักษณะกิจกรรม</strong></p>';
echo $space.$lakshana_activity;

echo '<p><strong>๑๐. เป้าหมายผลผลิต</strong></p>';
echo '<p><strong>'.$space.'๑๐.๑ เชิงปริมาณ</strong></p>';
echo '<p>'.$space.$space.$space.$quantity.'</p>';

echo '<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ๑๐.๒ เชิงคุณภาพ</strong></p>';
echo '<p>'.$space.$space.$space.$quality.'</p>';

echo '<p><strong>๑๑. งบประมาณดำเนินการ ปีงบประมาณ พ.ศ. '.$year.'</strong></p>';
echo '<p><strong>'.$space.'๑๑.๑ แหล่งที่มา '.$budget_type.'</strong></p>';
echo '<p><strong>'.$space.'๑๑.๒ งบประมาณรายรับ '.$activity_money.' บาท</strong></p>';
echo '<p><strong>'.$space.'๑๑.๓ รายละเอียดของงบประมาณ</strong></p>';
echo "<table class='table table-striped' border='1'>
    <thead>
    <tr>
        <th style='padding: 10px'>ลำดับที่</th>
        <th style='padding: 10px'>รายละเอียดงบประมาณ</th>
        <th style='padding: 10px'>จำนวนเงิน</th>
    </tr>
    ";

$all_budget = BudgetDetails::find()->where(['activity_key' => $model->activity_key])->all();
$activity_price = 0;

if(!empty($all_budget)){
    $i=1;
    $activity_price = 0;
    foreach($all_budget as $budget){
        $activity_price = $activity_price+$budget->detail_price;
        echo "
                <tr>
                    <td align='center'>$i</td>
                    <td>$budget->detail_name</td>
                    <td align='center'>$budget->detail_price</td>
                </tr>";
        $i++;
    }
    echo "
            <tr>
               <td colspan='2' align='center'>รวมจำนวนทั้งสิ้น</td>
               <td align='center'> $activity_price </td>
            </tr>
            </table>
        ";
}

echo '<p><strong>๑๒. กิจกรรมการดำเนินงาน</strong></p>';
echo "<table class='table table-striped' border='1'>
        <thead>
        <tr>
            <th style='padding: 10px'>ขั้นตอนการดำเนินงาน</th>
            <th style='padding: 10px'>รายละเอียดการดำเนินงาน</th>
            <th style='padding: 10px'>วันที่ดำเนินงาน</th>
            <th style='padding: 10px'>สถานที่ดำเนินงาน</th>
        </tr>
        </thead>
        ";

$project_plan = ProjectPlan::find()
    ->where(['plan_project_key' => $model->activity_key])
    ->orderBy('plan_process')
    ->all();
if(!empty($project_plan)){
    $i=1;
    foreach($project_plan as $item){
        if($item->plan_process == 1){
            $temp = 'ชั้นว่างแผน (Plan)';
        }else if($item->plan_process == 2){
            $temp = 'ชั้นตรวจสอบ (Check)';
        }else{
            $temp = 'ชั้นปรับปรุง (Act)';
        }
        echo "<tr> 
                    <td>$temp</td>
                    <td>$item->plan_detail</td>
                    <td align='center'>$item->plan_date</td>
                    <td align='center'>$item->plan_place</td>
                </tr>";
        $i++;
    }
}
echo '</table>';


echo '<p><strong>๑๓. ประโยชน์ที่ได้รับจากการดำเนินกิจกรรม</strong></p>';
echo '<p>'.$space.$benefit.'</p>';

?>

<?php
$lastpages = LastPage::find()->where(['project_act_key' => $model->activity_key])->all();
if (!empty($lastpages)) {
    foreach ($lastpages as $item) {
        $type = $item->last_role;
        if($type == 1){
            $tit = "ผู้เสนอโครงการ/กิจกรรม";
        }else if($type == 3){
            $tit = "ผู้อนุมัติโครงการ/กิจกรรม";
        }else{
            $tit = "ผู้เห็นชอบโครงการ/กิจกรรม";
        }

        if($type != 1){
            ?>

            <p align="center" style="margin-top: 80px">
                ความคิดเห็น
                ...................................................................................................................................................<br/>
                ..........................................................................................................................................................
            </p>
        <?php } ?>

        <p align="center">ลงชื่อ ....................................... <?php echo $tit; ?></p>
        <p align="center">(<?php echo $item->last_user; ?>)</p>
        <p align="center"><?php echo $item->last_position; ?></p>

        <?php
    }
}
?>

</body>

</html>