<html>
<head>
    <title></title>
</head>
<body>
<?php

use app\models\Activity;
use app\models\BudgetDetails;

    $project_name =  $model->project_name;
    $rationale =  $model->rationale;
    $objective =  $model->objective;
    $year =  $model->project_year;
    $budget_type =  $model->budgetBudgetType->budget_type_name;


    /*
     * $all_budget = BudgetDetails::find()->where(['activity_id' => $item->activity_id])->all();
            $activity_price = 0;
            foreach($all_budget as $budget){
                $activity_price = $activity_price+$budget->detail_price;
            }
    */
?>


<?php
    echo '<p align="center">'.$project_name.' <br/> วิทยาลัยสงฆ์นครน่าน มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย <br/> เฉลิมพระเกียรติสมเด็จพระเทพรัตนราชสุดา สยามบรมราชกุมารี <br/>  ปีงบประมาณ พ.ศ. '.$year.' <br/> *************************************************</p>';

    echo '<h1>หลักการและเหตุผล</h1>';
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rationale;

    echo '<h1>วัตถุประสงค์</h1>';
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$objective;


    echo '<h1>แหล่งที่มาของงบประมาณ</h1>';
    echo '<p>'.$budget_type.' ปีงบประมาณ '.$year.'</p>';
    echo "<table class='table table-striped' border='1'>
    <thead>
    <tr>
        <th style='padding: 10px'>ลำดับที่</th>
        <th style='padding: 10px'>รายการ</th>
        <th style='padding: 10px'>จำนวนเงิน</th>
    </tr>
    ";

    $activity = Activity::find()->where(['root_project_id' => $model->project_id])->all();
    if(!empty($activity)){
        $i=1;
        $total_price = 0;
        foreach($activity as $item){
            $total_price = $total_price+$item->activity_money;
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
        ";
    }

?>
    </tbody>

</table>

</body>

</html>