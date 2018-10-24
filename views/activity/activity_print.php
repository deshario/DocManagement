<html>
<head>
    <title></title>
</head>
<body>
<?php

use app\models\Activity;
use app\models\BudgetDetails;

    $activity_name =  $model->activity_name;
    $rationale =  $model->activity_rationale;
    $objective =  $model->objective;
    $year =  $model->rootProject->project_year;
    /*
     * $all_budget = BudgetDetails::find()->where(['activity_id' => $item->activity_id])->all();
            $activity_price = 0;
            foreach($all_budget as $budget){
                $activity_price = $activity_price+$budget->detail_price;
            }
    */
?>


<?php
echo '<p align="center">'.$activity_name.' <br/> วิทยาลัยสงฆ์นครน่าน มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย <br/> เฉลิมพระเกียรติสมเด็จพระเทพรัตนราชสุดา สยามบรมราชกุมารี <br/>  ปีงบประมาณ พ.ศ. '.$year.' <br/> *************************************************</p>';

    echo '<h1>หลักการและเหตุผล</h1>';
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rationale;

    echo '<h1>วัตถุประสงค์</h1>';
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$objective;


    echo '<h1>รายละเอียดงบประมาณ</h1>';
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
        ";
    }


?>
    </tbody>

</table>

</body>

</html>