<html>
<head>
    <title></title>
</head>
<body>
<?php

use app\models\Activity;
use app\models\ProjectKpi;
use app\models\ProjectPlan;

    $project_name =  $model->project_name;
    $project_money =  $model->project_money;
    $rationale =  $model->rationale;
    $objective =  $model->objective;
    $year =  $model->project_year;
    $budget_type =  $model->budgetBudgetType->budget_type_name;
    $organization = $model->organization->organization_name;
    $responsible_by = $model->responsibler->responsible_by;
    $type = $model->projectLaksana->projectType->type_name;
    $procced = $model->projectLaksana->procced->procced_name;
    $strategic = $model->strategic->strategic_name;
    $goal_name = $model->goal->goal_name;
    $strategy = $model->strategy->strategy_name;
    $indicator_name = $model->indicator->indicator_name;
    $realted_sub = $model->realtedSubject->subject_name;
    $element_name = $model->element->element_name;
    $product_name = $model->product->product_name;
    $quantity = $model->projectiPaomai->project_quantity;
    $quality = $model->projectiPaomai->project_quality;
    $lakshana_activity = $model->lakshana_activity;
    $duration = $model->project_duration;
    $project_location = $model->project_location;
    $project_evaluation = $model->project_evaluation;
    $project_benefit = $model->project_benefit;
    $creator = $model->createdBy->username;
    $space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
?>


<?php
    echo '<p align="center">'.$project_name.' <br/> วิทยาลัยสงฆ์นครน่าน มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย <br/> เฉลิมพระเกียรติสมเด็จพระเทพรัตนราชสุดา สยามบรมราชกุมารี <br/>  ปีงบประมาณ พ.ศ. '.$year.' <br/> *************************************************</p>';

    echo '<p><strong>๑.ชื่อโครงการ</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$project_name.'</p>';

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
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rationale;

    echo '<p><strong>๘. วัตถุประสงค์</strong></p>';
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$objective;

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
    if(!empty($kpi)){
        $i=1;
        foreach($kpi as $item){
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
            '.$quantity.'</p>';

    echo '<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ๑๐.๒ เชิงคุณภาพ</strong></p>';
    echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                '.$quality.'</p>';

    echo '<p><strong>๑๑. ลักษณะกิจกรรม</strong></p>';
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$lakshana_activity;



    $activity = Activity::find()->where(['root_project_id' => $model->project_id])->all();
    if(!empty($activity)){
        $i=1;
        $total_price = 0;

        foreach($activity as $item){
            $total_price = $total_price+$item->activity_money;
            $i++;
        }

        echo '<p><strong>๑๒. แหล่งที่มาของงบประมาณ</strong></p>';
        echo '<p><strong>'.$space.'งบประมาณดำเนินการ ปีงบประมาณ พ.ศ. '.$year.'</strong></p>';
        echo '<p><strong>'.$space.'แหล่งที่มา '.$budget_type.'</strong></p>';
        echo '<p><strong>'.$space.$space.'๑๒.๑ งบประมาณรายรับ '.$project_money.' บาท</strong></p>';
        echo '<p><strong>'.$space.$space.'๑๒.๒ งบประมาณรายจ่าย '.$total_price.' บาท</strong></p>';

        echo "<table class='table table-striped' border='1'>
    <thead>
    <tr>
        <th style='padding: 10px'>ลำดับที่</th>
        <th style='padding: 10px'>รายการ</th>
        <th style='padding: 10px'>จำนวนเงิน</th>
    </tr>
    </thead>
    ";

        foreach($activity as $item){
            echo "<tr>
                <td align='center'>$i</td>
                <td>$item->activity_name</td>
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


    echo '<p><strong>๑๔. ระยะเวลาดำเนินการ</strong></p>';
    echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$duration.'</p>';

    echo '<p><strong>๑๕. สถานที่ดำเนินการ</strong></p>';
    echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$project_location.'</p>';

    echo '<p><strong>๑๖. หน่วยงานที่รับผิดชอบ</strong></p>';
    echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$organization.'</p>';

    echo '<p><strong>๑๗. การประเมินผล</strong></p>';
    echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$project_evaluation.'</p>';

    echo '<p><strong>๑๘. ประโยชน์ที่คาดว่าจะได้รับ</strong></p>';
    echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$project_benefit.'</p>';

?>

<p align="center" style="margin-top:50px">ลงชื่อ ....................................... ผู้เห็นชอบโดยโครงการ</p>
<p align="center">(<?php echo $creator; ?>)</p>
<p align="center">ผู้อำนวยการสำนักงานวิทยาลัย</p>
<p align="center">
    ความคิดเห็น ...................................................................................................................................................<br/>
    ..........................................................................................................................................................
</p>




<p align="center" style="margin-top:200px">ลงชื่อ ....................................... ผู้เห็นชอบโดยโครงการ</p>
<p align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
<p align="center">ผู้อำนวยการสำนักงานวิชาการ</p>
<p align="center">
    ความคิดเห็น ...................................................................................................................................................<br/>
    ..........................................................................................................................................................
</p>




<p align="center" style="margin-top:200px">ลงชื่อ ....................................... ผู้เห็นชอบโดยโครงการ</p>
<p align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
<p align="center">ผู้อำนวยการสำนักงานวิชาการ</p>
<p align="center">
    ความคิดเห็น ...................................................................................................................................................<br/>
    ..........................................................................................................................................................
</p>




<p align="center" style="margin-top:200px">ลงชื่อ ....................................... ผู้เห็นชอบโดยโครงการ</p>
<p align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
<p align="center">ผู้อำนวยการสำนักงานวิชาการ</p>
<p align="center">
    ความคิดเห็น ...................................................................................................................................................<br/>
    ..........................................................................................................................................................
</p>



<p align="center" style="margin-top:200px">ลงชื่อ ....................................... ผู้เห็นชอบโดยโครงการ</p>
<p align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
<p align="center">ผู้อำนวยการสำนักงานวิชาการ</p>
<p align="center">
    ความคิดเห็น ...................................................................................................................................................<br/>
    ..........................................................................................................................................................
</p>



<p align="center" style="margin-top:200px">ลงชื่อ ....................................... ผู้เห็นชอบโดยโครงการ</p>
<p align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</p>
<p align="center">ผู้อำนวยการสำนักงานวิชาการ</p>
<p align="center">
    ความคิดเห็น ...................................................................................................................................................<br/>
    ..........................................................................................................................................................
</p>



</body>

</html>