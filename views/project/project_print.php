<html>
<head>
    <title></title>
</head>
<body>
<?php

use app\models\Activity;
use app\models\ProjectKpi;
use app\models\ProjectPlan;
use app\models\LastPage;
use app\models\Consistency;

$project_name = $model->project_name;
$project_money = $model->project_money;
$rationale = $model->rationale;
$objective = $model->objective;
$year = $model->project_year;
$budget_type = $model->budgetBudgetType->budget_type_name;
$organization = $model->organization->organization_name;
$responsible_by = $model->responsibler->responsible_by;
$type = $model->projectLaksana->projectType->type_name;
$procced = $model->projectLaksana->procced->procced_name;

//$strategic = $model->strategic->strategic_name;
//$goal_name = $model->goal->goal_name;
//$strategy = $model->strategy->strategy_name;
//$indicator_name = $model->indicator->indicator_name;

$realted_sub = $model->related_subject;
$element_name = $model->element->element_name;
$product_name = $model->product->product_name;
$quantity = $model->projectiPaomai->project_quantity;
$quality = $model->projectiPaomai->project_quality;
$time = $model->projectiPaomai->project_time;
$lakshana_activity = $model->lakshana_activity;
$duration = $model->project_start.' ถึง '.$model->project_end;
$project_location = $model->project_location;
$project_evaluation = $model->project_evaluation;
$suggestion = $model->suggestion;
$project_benefit = $model->project_benefit;
$creator = $model->createdBy->username;
$space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
?>


<?php
echo '<p align="center">' . $project_name . ' <br/> วิทยาลัยสงฆ์นครน่าน มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย <br/> เฉลิมพระเกียรติสมเด็จพระเทพรัตนราชสุดา สยามบรมราชกุมารี <br/>  ปีงบประมาณ พ.ศ. ' . $year . ' <br/> *************************************************</p>';

echo '<p><strong>๑. ชื่อโครงการ</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $project_name . '</p>';


echo '<p><strong>๒. ชื่อหน่วยงาน</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $organization . '</p>';

echo '<p><strong>๓. ผู้รับผิดชอบโครงการ </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $responsible_by . '</p>';

echo '<p><strong>๔. ลักษณะโครงการ</strong></p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประเภท : ' . $type . '</p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วิธีดำเนินงาน : ' . $procced . '</p>';

echo '<p><strong>๕. ความสอดคล้อง</strong></p>';

$consistency = Consistency::find()->where(['project_act_key' => $model->project_key])->all();
if (!empty($consistency)) {
    foreach ($consistency as $item) {
        if(!empty($item->consStrategic->strategic_name)){
            echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;ยุทธศาสตร์&nbsp;:&nbsp;&nbsp;&nbsp; '.$item->consStrategic->strategic_name.'</p>';
        }
    }

    foreach ($consistency as $item) {
        if(!empty($item->consGoal->goal_name)){
            echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;เป้าประสงค์&nbsp;:&nbsp;&nbsp;&nbsp; '.$item->consGoal->goal_name.'</p>';
        }
    }

    foreach ($consistency as $item) {
        if(!empty($item->consStrategy->strategy_name)){
            echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;กลยุทธ์&nbsp;:&nbsp;&nbsp;&nbsp; '.$item->consStrategy->strategy_name.'</p>';
        }
    }

    foreach ($consistency as $item) {
        if(!empty($item->consIndicator->indicator_name)){
            echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;ตัวชี้วัด&nbsp;:&nbsp;&nbsp;&nbsp; '.$item->consIndicator->indicator_name.'</p>';
        }
    }
}

//echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ยุทธศาสตร์ : ' . $strategic . '</p>';
//echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เปาประสงค์ : ' . $goal_name . '</p>';
//echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กลยุทธ์ : ' . $strategy . '</p>';
//echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตัวชี้วัด : ' . $indicator_name . '</p>';

echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;องค์ประกอบ : ' . $element_name . '</p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายวิชาที่สอดคล้อง/อาจารย์ที่ปรึกษา : ' . $realted_sub . '</p>';

echo '<p><strong>๖. ผลผลิต </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $product_name . '</p>';

echo '<p><strong>๗. หลักการและเหตุผล</strong></p>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $rationale;

echo '<p><strong>๘. วัตถุประสงค์</strong></p>';
$newObjective = explode("\n", $objective);
foreach($newObjective as $value) {
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $value.'<br/>';
}

echo '<p><strong>๙. เป้าหมายตัวชี้วัด</strong></p>';
echo "<table class='table table-striped' border='1'>
        <thead>
        <tr>
            <th style='padding: 10px'>ตัวชี้วัด(KPI)</th>
            <th style='padding: 10px'>เป้าหมาย</th>
        </tr>
        </thead>
        ";

$kpi = ProjectKpi::find()->where(['kpi_project_key' => $model->project_key])->all();
if (!empty($kpi)) {
    $i = 1;
    foreach ($kpi as $item) {
        echo "<tr> 
                <td>$item->kpi_name</td>
                <td align='center'>$item->kpi_goal</td>
            </tr>";
        $i++;
    }
}
echo "</table>";

echo '<p><strong>๑๐. เป้าหมาย</strong></p>';
echo '<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ๑๐.๑ เชิงปริมาณ</strong></p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ' . $quantity . '</p>';

echo '<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ๑๐.๒ เชิงคุณภาพ</strong></p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ' . $quality . '</p>';

echo '<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ๑๐.๓ เชิงเวลา</strong></p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ' . $time . '</p>';

echo '<p><strong>๑๑. ลักษณะกิจกรรม</strong></p>';
$newlakshana_activity = explode("\n", $lakshana_activity);
foreach($newlakshana_activity as $lakshana_activity) {
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $lakshana_activity.'<br/>';
}


$activity = Activity::find()->where(['root_project_id' => $model->project_id])->all();
if (!empty($activity)) {
    $i = 1;
    $total_price = 0;

    foreach ($activity as $item) {
        $total_price = $total_price + $item->activity_money;
    }

    echo '<p><strong>๑๒. แหล่งที่มาของงบประมาณ</strong></p>';
    echo '<p><strong>' . $space . 'งบประมาณดำเนินการ ปีงบประมาณ พ.ศ. ' . $year . '</strong></p>';
    echo '<p><strong>' . $space . 'แหล่งที่มา ' . $budget_type . '</strong></p>';
    echo '<p><strong>' . $space . $space . '๑๒.๑ งบประมาณรายรับ ' . $project_money . ' บาท</strong></p>';
    echo '<p><strong>' . $space . $space . '๑๒.๒ งบประมาณรายจ่าย ' . $total_price . ' บาท</strong></p>';

    echo "<table class='table table-striped' border='1'>
    <thead>
    <tr>
        <th style='padding: 10px'>ลำดับที่</th>
        <th style='padding: 10px'>รายการ</th>
        <th style='padding: 10px'>จำนวนเงิน</th>
    </tr>
    </thead>
    ";

    foreach ($activity as $item) {
        echo "<tr>
                <td align='center'>$i</td>
                <td align='left'>$item->activity_name</td>
                <td align='center'>$item->activity_money</td>
            </tr>";
        $i++;
    }
    echo "
            <tr>
               <td colspan='2' align='center'>รวมจำนวนทั้งสิ้น</td>
               <td align='center'> $total_price </td>
            </tr>
            </table>
        ";
}

echo '<p><strong>๑๓. แผนปฏิบัติการกิจกรรม</strong></p>';
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
    ->where(['plan_project_key' => $model->project_key])
    ->orderBy('plan_process')
    ->all();
if (!empty($project_plan)) {
    $i = 1;
    foreach ($project_plan as $item) {
        if ($item->plan_process == 1) {
            $temp = 'ชั้นว่างแผน (Plan)';
        } else if ($item->plan_process == 2) {
            $temp = 'ชั้นดำเนินงาน (Do)';
        } else if ($item->plan_process == 3) {
            $temp = 'ชั้นตรวจสอบ (Check)';
        } else {
            $temp = 'ชั้นปรับปรุง (Act)';
        }
        echo "<tr> 
                    <td>$temp</td>
                    <td align='left'>$item->plan_detail</td>
                    <td align='center'>$item->plan_date</td>
                    <td align='center'>$item->plan_place</td>
                </tr>";
        $i++;
    }
}
echo '</table>';


echo '<p><strong>๑๔. ระยะเวลาดำเนินการ</strong></p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $duration . '</p>';

echo '<p><strong>๑๕. สถานที่ดำเนินการ</strong></p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $project_location . '</p>';

echo '<p><strong>๑๖. หน่วยงานที่รับผิดชอบ</strong></p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $organization . '</p>';

echo '<p><strong>๑๗. การประเมินผล</strong></p>';
echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $project_evaluation . '</p>';

echo '<p><strong>๑๘. ประโยชน์ที่คาดว่าจะได้รับ</strong></p>';
$newProjectBenefit = explode("\n", $project_benefit);
foreach($newProjectBenefit as $value) {
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $value.'<br/>';
}

echo '<p><strong>๑๙. ข้อเสนอแนะ</strong></p>';
$newsuggestion = explode("\n", $suggestion);
foreach($newsuggestion as $suggestion) {
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $suggestion.'<br/>';

}

?>

<?php
$lastpages = LastPage::find()->where(['project_act_key' => $model->project_key])->all();
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

<!--        <br/>-->
        <p align="center">ลงชื่อ ....................................... <?php echo $tit; ?></p>
        <p align="left" style="margin-left:30%">(<?php echo $item->last_user; ?>)</p>
        <p align="left" style="margin-left:30%"><?php echo $item->last_position; ?></p>

        <?php
    }
}
?>

</body>

</html>