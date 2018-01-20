<?php 
include ('db.php');

class json
    {
     public $value = 0;
     function EncodeParsing($parse){
        $j_encode = json_encode($parse);
        return $j_encode;
      }
     function DataCount($count){

        $total_count = mysqli_num_rows($count);
        return $total_count;
      }
     function DataCountPercent($countVal, $totalCount){
    	$dataCount_Percent = (($countVal / $totalCount) * 100);
		return $dataCount_Percent;
    }   

     function stackValue($val)
      {
          $this->value += $val;
      }
     
     function getSum()
      {
          return $this->value . "<br />";
      }
     function addtoString($str, $item) {
    $parts = explode(',', $str);
    $parts[] = $item;

    return implode(',', $parts);
    }
 

   
    }
$json = new json;
$form_id_date = "AND survey_formID = survey_formID";
$saf = "SELECT * FROM";
//general count of question 1
echo "<H1>1. )PURSUING DEGREE REASON</H1>";
$table = "`survey_question1`";
$row = "`row`";
$col1 = "`col1`";
$col2 = "`col2`";
$totalqa1 = mysqli_query($con,$saf.$table);
$totalqa1_rc_1_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='1' AND ".$col1." != ''");
$totalqa1_rc_2_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='2' AND ".$col1." != ''");
$totalqa1_rc_3_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='3' AND ".$col1." != ''");
$totalqa1_rc_4_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='4' AND ".$col1." != ''");
$totalqa1_rc_5_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='5' AND ".$col1." != ''");
$totalqa1_rc_6_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='6' AND ".$col1." != ''");
$totalqa1_rc_7_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='7' AND ".$col1." != ''");
$totalqa1_rc_8_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='8' AND ".$col1." != ''");
$totalqa1_rc_9_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='9' AND ".$col1." != ''");
$totalqa1_rc_10_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='10' AND ".$col1." != ''");
$totalqa1_rc_11_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='11' AND ".$col1." != ''");
$totalqa1_rc_12_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='12' AND ".$col1." != ''");
$totalqa1_rc_13_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='13' AND ".$col1." != ''");
$totalqa1_rc_14_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='14' AND ".$col1." != ''");
$totalqa1_rc_15_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='15' AND ".$col1." != ''");

$totalqa1_rc_1_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='1' AND ".$col1." = ''");
$totalqa1_rc_2_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='2' AND ".$col1." = ''");
$totalqa1_rc_3_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='3' AND ".$col1." = ''");
$totalqa1_rc_4_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='4' AND ".$col1." = ''");
$totalqa1_rc_5_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='5' AND ".$col1." = ''");
$totalqa1_rc_6_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='6' AND ".$col1." = ''");
$totalqa1_rc_7_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='7' AND ".$col1." = ''");
$totalqa1_rc_8_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='8' AND ".$col1." = ''");
$totalqa1_rc_9_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='9' AND ".$col1." = ''");
$totalqa1_rc_10_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='10' AND ".$col1." = ''");
$totalqa1_rc_11_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='11' AND ".$col1." = ''");
$totalqa1_rc_12_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='12' AND ".$col1." = ''");
$totalqa1_rc_13_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='13' AND ".$col1." = ''");
$totalqa1_rc_14_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='14' AND ".$col1." = ''");
$totalqa1_rc_15_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='15' AND ".$col1." = ''");

$totalqa1_rcc_1_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='1' AND ".$col2." != ''");
$totalqa1_rcc_2_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='2' AND ".$col2." != ''");
$totalqa1_rcc_3_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='3' AND ".$col2." != ''");
$totalqa1_rcc_4_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='4' AND ".$col2." != ''");
$totalqa1_rcc_5_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='5' AND ".$col2." != ''");
$totalqa1_rcc_6_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='6' AND ".$col2." != ''");
$totalqa1_rcc_7_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='7' AND ".$col2." != ''");
$totalqa1_rcc_8_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='8' AND ".$col2." != ''");
$totalqa1_rcc_9_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='9' AND ".$col2." != ''");
$totalqa1_rcc_10_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='10' AND ".$col2." != ''");
$totalqa1_rcc_11_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='11' AND ".$col2." != ''");
$totalqa1_rcc_12_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='12' AND ".$col2." != ''");
$totalqa1_rcc_13_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='13' AND ".$col2." != ''");
$totalqa1_rcc_14_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='14' AND ".$col2." != ''");
$totalqa1_rcc_15_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='15' AND ".$col2." != ''");

$totalqa1_rcc_1_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='1' AND ".$col2." = ''");
$totalqa1_rcc_2_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='2' AND ".$col2." = ''");
$totalqa1_rcc_3_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='3' AND ".$col2." = ''");
$totalqa1_rcc_4_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='4' AND ".$col2." = ''");
$totalqa1_rcc_5_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='5' AND ".$col2." = ''");
$totalqa1_rcc_6_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='6' AND ".$col2." = ''");
$totalqa1_rcc_7_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='7' AND ".$col2." = ''");
$totalqa1_rcc_8_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='8' AND ".$col2." = ''");
$totalqa1_rcc_9_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='9' AND ".$col2." = ''");
$totalqa1_rcc_10_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='10' AND ".$col2." = ''");
$totalqa1_rcc_11_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='11' AND ".$col2." = ''");
$totalqa1_rcc_12_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='12' AND ".$col2." = ''");
$totalqa1_rcc_13_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='13' AND ".$col2." = ''");
$totalqa1_rcc_14_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='14' AND ".$col2." = ''");
$totalqa1_rcc_15_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='15' AND ".$col2." = ''");

$totalqa1_rbcc_1_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='1' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_2_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='2' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_3_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='3' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_4_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='4' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_5_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='5' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_6_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='6' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_7_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='7' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_8_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='8' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_9_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='9' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_10_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='10' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_11_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='11' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_12_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='12' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_13_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='13' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_14_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='14' AND ".$col1." != '' AND ".$col2." != ''");
$totalqa1_rbcc_15_true = mysqli_query($con,$saf." ".$table." WHERE ".$row."='15' AND ".$col1." != '' AND ".$col2." != ''");

$totalqa1_rbcc_1_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='1' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_2_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='2' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_3_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='3' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_4_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='4' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_5_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='5' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_6_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='6' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_7_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='7' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_8_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='8' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_9_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='9' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_10_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='10' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_11_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='11' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_12_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='12' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_13_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='13' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_14_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='14' AND ".$col1." = '' AND ".$col2." = ''");
$totalqa1_rbcc_15_false = mysqli_query($con,$saf." ".$table." WHERE ".$row."='15' AND ".$col1." = '' AND ".$col2." = ''");


$countqa1 = $json->DataCount($totalqa1);

$count_total_qa1_rc_1_true= $json->DataCount($totalqa1_rc_1_true);
$count_total_qa1_rc_2_true= $json->DataCount($totalqa1_rc_2_true);
$count_total_qa1_rc_3_true= $json->DataCount($totalqa1_rc_3_true);
$count_total_qa1_rc_4_true= $json->DataCount($totalqa1_rc_4_true);
$count_total_qa1_rc_5_true= $json->DataCount($totalqa1_rc_5_true);
$count_total_qa1_rc_6_true= $json->DataCount($totalqa1_rc_6_true);
$count_total_qa1_rc_7_true= $json->DataCount($totalqa1_rc_7_true);
$count_total_qa1_rc_8_true= $json->DataCount($totalqa1_rc_8_true);
$count_total_qa1_rc_9_true= $json->DataCount($totalqa1_rc_9_true);
$count_total_qa1_rc_10_true= $json->DataCount($totalqa1_rc_10_true);
$count_total_qa1_rc_11_true= $json->DataCount($totalqa1_rc_11_true);
$count_total_qa1_rc_12_true= $json->DataCount($totalqa1_rc_12_true);
$count_total_qa1_rc_13_true= $json->DataCount($totalqa1_rc_13_true);
$count_total_qa1_rc_14_true= $json->DataCount($totalqa1_rc_14_true);
$count_total_qa1_rc_15_true= $json->DataCount($totalqa1_rc_15_true);

$count_total_qa1_rc_1_false= $json->DataCount($totalqa1_rc_1_false);
$count_total_qa1_rc_2_false= $json->DataCount($totalqa1_rc_2_false);
$count_total_qa1_rc_3_false= $json->DataCount($totalqa1_rc_3_false);
$count_total_qa1_rc_4_false= $json->DataCount($totalqa1_rc_4_false);
$count_total_qa1_rc_5_false= $json->DataCount($totalqa1_rc_5_false);
$count_total_qa1_rc_6_false= $json->DataCount($totalqa1_rc_6_false);
$count_total_qa1_rc_7_false= $json->DataCount($totalqa1_rc_7_false);
$count_total_qa1_rc_8_false= $json->DataCount($totalqa1_rc_8_false);
$count_total_qa1_rc_9_false= $json->DataCount($totalqa1_rc_9_false);
$count_total_qa1_rc_10_false= $json->DataCount($totalqa1_rc_10_false);
$count_total_qa1_rc_11_false= $json->DataCount($totalqa1_rc_11_false);
$count_total_qa1_rc_12_false= $json->DataCount($totalqa1_rc_12_false);
$count_total_qa1_rc_13_false= $json->DataCount($totalqa1_rc_13_false);
$count_total_qa1_rc_14_false= $json->DataCount($totalqa1_rc_14_false);
$count_total_qa1_rc_15_false= $json->DataCount($totalqa1_rc_15_false);

$count_total_qa1_rcc_1_true= $json->DataCount($totalqa1_rcc_1_true);
$count_total_qa1_rcc_2_true= $json->DataCount($totalqa1_rcc_2_true);
$count_total_qa1_rcc_3_true= $json->DataCount($totalqa1_rcc_3_true);
$count_total_qa1_rcc_4_true= $json->DataCount($totalqa1_rcc_4_true);
$count_total_qa1_rcc_5_true= $json->DataCount($totalqa1_rcc_5_true);
$count_total_qa1_rcc_6_true= $json->DataCount($totalqa1_rcc_6_true);
$count_total_qa1_rcc_7_true= $json->DataCount($totalqa1_rcc_7_true);
$count_total_qa1_rcc_8_true= $json->DataCount($totalqa1_rcc_8_true);
$count_total_qa1_rcc_9_true= $json->DataCount($totalqa1_rcc_9_true);
$count_total_qa1_rcc_10_true= $json->DataCount($totalqa1_rcc_10_true);
$count_total_qa1_rcc_11_true= $json->DataCount($totalqa1_rcc_11_true);
$count_total_qa1_rcc_12_true= $json->DataCount($totalqa1_rcc_12_true);
$count_total_qa1_rcc_13_true= $json->DataCount($totalqa1_rcc_13_true);
$count_total_qa1_rcc_14_true= $json->DataCount($totalqa1_rcc_14_true);
$count_total_qa1_rcc_15_true= $json->DataCount($totalqa1_rcc_15_true);

$count_total_qa1_rcc_1_false= $json->DataCount($totalqa1_rcc_1_false);
$count_total_qa1_rcc_2_false= $json->DataCount($totalqa1_rcc_2_false);
$count_total_qa1_rcc_3_false= $json->DataCount($totalqa1_rcc_3_false);
$count_total_qa1_rcc_4_false= $json->DataCount($totalqa1_rcc_4_false);
$count_total_qa1_rcc_5_false= $json->DataCount($totalqa1_rcc_5_false);
$count_total_qa1_rcc_6_false= $json->DataCount($totalqa1_rcc_6_false);
$count_total_qa1_rcc_7_false= $json->DataCount($totalqa1_rcc_7_false);
$count_total_qa1_rcc_8_false= $json->DataCount($totalqa1_rcc_8_false);
$count_total_qa1_rcc_9_false= $json->DataCount($totalqa1_rcc_9_false);
$count_total_qa1_rcc_10_false= $json->DataCount($totalqa1_rcc_10_false);
$count_total_qa1_rcc_11_false= $json->DataCount($totalqa1_rcc_11_false);
$count_total_qa1_rcc_12_false= $json->DataCount($totalqa1_rcc_12_false);
$count_total_qa1_rcc_13_false= $json->DataCount($totalqa1_rcc_13_false);
$count_total_qa1_rcc_14_false= $json->DataCount($totalqa1_rcc_14_false);
$count_total_qa1_rcc_15_false= $json->DataCount($totalqa1_rcc_15_false);

$count_total_qa1_rbcc_1_true= $json->DataCount($totalqa1_rbcc_1_true);
$count_total_qa1_rbcc_2_true= $json->DataCount($totalqa1_rbcc_2_true);
$count_total_qa1_rbcc_3_true= $json->DataCount($totalqa1_rbcc_3_true);
$count_total_qa1_rbcc_4_true= $json->DataCount($totalqa1_rbcc_4_true);
$count_total_qa1_rbcc_5_true= $json->DataCount($totalqa1_rbcc_5_true);
$count_total_qa1_rbcc_6_true= $json->DataCount($totalqa1_rbcc_6_true);
$count_total_qa1_rbcc_7_true= $json->DataCount($totalqa1_rbcc_7_true);
$count_total_qa1_rbcc_8_true= $json->DataCount($totalqa1_rbcc_8_true);
$count_total_qa1_rbcc_9_true= $json->DataCount($totalqa1_rbcc_9_true);
$count_total_qa1_rbcc_10_true= $json->DataCount($totalqa1_rbcc_10_true);
$count_total_qa1_rbcc_11_true= $json->DataCount($totalqa1_rbcc_11_true);
$count_total_qa1_rbcc_12_true= $json->DataCount($totalqa1_rbcc_12_true);
$count_total_qa1_rbcc_13_true= $json->DataCount($totalqa1_rbcc_13_true);
$count_total_qa1_rbcc_14_true= $json->DataCount($totalqa1_rbcc_14_true);
$count_total_qa1_rbcc_15_true= $json->DataCount($totalqa1_rbcc_15_true);

$count_total_qa1_rbcc_1_false= $json->DataCount($totalqa1_rbcc_1_false);
$count_total_qa1_rbcc_2_false= $json->DataCount($totalqa1_rbcc_2_false);
$count_total_qa1_rbcc_3_false= $json->DataCount($totalqa1_rbcc_3_false);
$count_total_qa1_rbcc_4_false= $json->DataCount($totalqa1_rbcc_4_false);
$count_total_qa1_rbcc_5_false= $json->DataCount($totalqa1_rbcc_5_false);
$count_total_qa1_rbcc_6_false= $json->DataCount($totalqa1_rbcc_6_false);
$count_total_qa1_rbcc_7_false= $json->DataCount($totalqa1_rbcc_7_false);
$count_total_qa1_rbcc_8_false= $json->DataCount($totalqa1_rbcc_8_false);
$count_total_qa1_rbcc_9_false= $json->DataCount($totalqa1_rbcc_9_false);
$count_total_qa1_rbcc_10_false= $json->DataCount($totalqa1_rbcc_10_false);
$count_total_qa1_rbcc_11_false= $json->DataCount($totalqa1_rbcc_11_false);
$count_total_qa1_rbcc_12_false= $json->DataCount($totalqa1_rbcc_12_false);
$count_total_qa1_rbcc_13_false= $json->DataCount($totalqa1_rbcc_13_false);
$count_total_qa1_rbcc_14_false= $json->DataCount($totalqa1_rbcc_14_false);
$count_total_qa1_rbcc_15_false= $json->DataCount($totalqa1_rbcc_15_false);


echo $total_qa1_rc_1_true_percent = $json->DataCountPercent($count_total_qa1_rc_1_true,$countqa1);
echo $total_qa1_rc_2_true_percent = $json->DataCountPercent($count_total_qa1_rc_2_true,$countqa1);
echo $total_qa1_rc_3_true_percent = $json->DataCountPercent($count_total_qa1_rc_3_true,$countqa1);
echo $total_qa1_rc_4_true_percent = $json->DataCountPercent($count_total_qa1_rc_4_true,$countqa1);
echo $total_qa1_rc_5_true_percent = $json->DataCountPercent($count_total_qa1_rc_5_true,$countqa1);
$total_qa1_rc_6_true_percent = $json->DataCountPercent($count_total_qa1_rc_6_true,$countqa1);
$total_qa1_rc_7_true_percent = $json->DataCountPercent($count_total_qa1_rc_7_true,$countqa1);
$total_qa1_rc_8_true_percent = $json->DataCountPercent($count_total_qa1_rc_8_true,$countqa1);
$total_qa1_rc_9_true_percent = $json->DataCountPercent($count_total_qa1_rc_9_true,$countqa1);
$total_qa1_rc_10_true_percent = $json->DataCountPercent($count_total_qa1_rc_10_true,$countqa1);
$total_qa1_rc_11_true_percent = $json->DataCountPercent($count_total_qa1_rc_11_true,$countqa1);
$total_qa1_rc_12_true_percent = $json->DataCountPercent($count_total_qa1_rc_12_true,$countqa1);
$total_qa1_rc_13_true_percent = $json->DataCountPercent($count_total_qa1_rc_13_true,$countqa1);
$total_qa1_rc_14_true_percent = $json->DataCountPercent($count_total_qa1_rc_14_true,$countqa1);
$total_qa1_rc_15_true_percent = $json->DataCountPercent($count_total_qa1_rc_15_true,$countqa1);

$total_qa1_rc_1_false_percent = $json->DataCountPercent($count_total_qa1_rc_1_false,$countqa1);
$total_qa1_rc_2_false_percent = $json->DataCountPercent($count_total_qa1_rc_2_false,$countqa1);
$total_qa1_rc_3_false_percent = $json->DataCountPercent($count_total_qa1_rc_3_false,$countqa1);
$total_qa1_rc_4_false_percent = $json->DataCountPercent($count_total_qa1_rc_4_false,$countqa1);
$total_qa1_rc_5_false_percent = $json->DataCountPercent($count_total_qa1_rc_5_false,$countqa1);
$total_qa1_rc_6_false_percent = $json->DataCountPercent($count_total_qa1_rc_6_false,$countqa1);
$total_qa1_rc_7_false_percent = $json->DataCountPercent($count_total_qa1_rc_7_false,$countqa1);
$total_qa1_rc_8_false_percent = $json->DataCountPercent($count_total_qa1_rc_8_false,$countqa1);
$total_qa1_rc_9_false_percent = $json->DataCountPercent($count_total_qa1_rc_9_false,$countqa1);
$total_qa1_rc_10_false_percent = $json->DataCountPercent($count_total_qa1_rc_10_false,$countqa1);
$total_qa1_rc_11_false_percent = $json->DataCountPercent($count_total_qa1_rc_11_false,$countqa1);
$total_qa1_rc_12_false_percent = $json->DataCountPercent($count_total_qa1_rc_12_false,$countqa1);
$total_qa1_rc_13_false_percent = $json->DataCountPercent($count_total_qa1_rc_13_false,$countqa1);
$total_qa1_rc_14_false_percent = $json->DataCountPercent($count_total_qa1_rc_14_false,$countqa1);
$total_qa1_rc_15_false_percent = $json->DataCountPercent($count_total_qa1_rc_15_false,$countqa1);

$total_qa1_rcc_1_true_percent = $json->DataCountPercent($count_total_qa1_rcc_1_true,$countqa1);
$total_qa1_rcc_2_true_percent = $json->DataCountPercent($count_total_qa1_rcc_2_true,$countqa1);
$total_qa1_rcc_3_true_percent = $json->DataCountPercent($count_total_qa1_rcc_3_true,$countqa1);
$total_qa1_rcc_4_true_percent = $json->DataCountPercent($count_total_qa1_rcc_4_true,$countqa1);
$total_qa1_rcc_5_true_percent = $json->DataCountPercent($count_total_qa1_rcc_5_true,$countqa1);
$total_qa1_rcc_6_true_percent = $json->DataCountPercent($count_total_qa1_rcc_6_true,$countqa1);
$total_qa1_rcc_7_true_percent = $json->DataCountPercent($count_total_qa1_rcc_7_true,$countqa1);
$total_qa1_rcc_8_true_percent = $json->DataCountPercent($count_total_qa1_rcc_8_true,$countqa1);
$total_qa1_rcc_9_true_percent = $json->DataCountPercent($count_total_qa1_rcc_9_true,$countqa1);
$total_qa1_rcc_10_true_percent = $json->DataCountPercent($count_total_qa1_rcc_10_true,$countqa1);
$total_qa1_rcc_11_true_percent = $json->DataCountPercent($count_total_qa1_rcc_11_true,$countqa1);
$total_qa1_rcc_12_true_percent = $json->DataCountPercent($count_total_qa1_rcc_12_true,$countqa1);
$total_qa1_rcc_13_true_percent = $json->DataCountPercent($count_total_qa1_rcc_13_true,$countqa1);
$total_qa1_rcc_14_true_percent = $json->DataCountPercent($count_total_qa1_rcc_14_true,$countqa1);
$total_qa1_rcc_15_true_percent = $json->DataCountPercent($count_total_qa1_rcc_15_true,$countqa1);

$total_qa1_rcc_1_false_percent = $json->DataCountPercent($count_total_qa1_rcc_1_false,$countqa1);
$total_qa1_rcc_2_false_percent = $json->DataCountPercent($count_total_qa1_rcc_2_false,$countqa1);
$total_qa1_rcc_3_false_percent = $json->DataCountPercent($count_total_qa1_rcc_3_false,$countqa1);
$total_qa1_rcc_4_false_percent = $json->DataCountPercent($count_total_qa1_rcc_4_false,$countqa1);
$total_qa1_rcc_5_false_percent = $json->DataCountPercent($count_total_qa1_rcc_5_false,$countqa1);
$total_qa1_rcc_6_false_percent = $json->DataCountPercent($count_total_qa1_rcc_6_false,$countqa1);
$total_qa1_rcc_7_false_percent = $json->DataCountPercent($count_total_qa1_rcc_7_false,$countqa1);
$total_qa1_rcc_8_false_percent = $json->DataCountPercent($count_total_qa1_rcc_8_false,$countqa1);
$total_qa1_rcc_9_false_percent = $json->DataCountPercent($count_total_qa1_rcc_9_false,$countqa1);
$total_qa1_rcc_10_false_percent = $json->DataCountPercent($count_total_qa1_rcc_10_false,$countqa1);
$total_qa1_rcc_11_false_percent = $json->DataCountPercent($count_total_qa1_rcc_11_false,$countqa1);
$total_qa1_rcc_12_false_percent = $json->DataCountPercent($count_total_qa1_rcc_12_false,$countqa1);
$total_qa1_rcc_13_false_percent = $json->DataCountPercent($count_total_qa1_rcc_13_false,$countqa1);
$total_qa1_rcc_14_false_percent = $json->DataCountPercent($count_total_qa1_rcc_14_false,$countqa1);
$total_qa1_rcc_15_false_percent = $json->DataCountPercent($count_total_qa1_rcc_15_false,$countqa1);

$total_qa1_rbcc_1_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_1_true,$countqa1);
$total_qa1_rbcc_2_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_2_true,$countqa1);
$total_qa1_rbcc_3_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_3_true,$countqa1);
$total_qa1_rbcc_4_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_4_true,$countqa1);
$total_qa1_rbcc_5_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_5_true,$countqa1);
$total_qa1_rbcc_6_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_6_true,$countqa1);
$total_qa1_rbcc_7_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_7_true,$countqa1);
$total_qa1_rbcc_8_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_8_true,$countqa1);
$total_qa1_rbcc_9_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_9_true,$countqa1);
$total_qa1_rbcc_10_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_10_true,$countqa1);
$total_qa1_rbcc_11_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_11_true,$countqa1);
$total_qa1_rbcc_12_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_12_true,$countqa1);
$total_qa1_rbcc_13_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_13_true,$countqa1);
$total_qa1_rbcc_14_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_14_true,$countqa1);
$total_qa1_rbcc_15_true_percent = $json->DataCountPercent($count_total_qa1_rbcc_15_true,$countqa1);

$total_qa1_rbcc_1_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_1_false,$countqa1);
$total_qa1_rbcc_2_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_2_false,$countqa1);
$total_qa1_rbcc_3_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_3_false,$countqa1);
$total_qa1_rbcc_4_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_4_false,$countqa1);
$total_qa1_rbcc_5_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_5_false,$countqa1);
$total_qa1_rbcc_6_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_6_false,$countqa1);
$total_qa1_rbcc_7_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_7_false,$countqa1);
$total_qa1_rbcc_8_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_8_false,$countqa1);
$total_qa1_rbcc_9_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_9_false,$countqa1);
$total_qa1_rbcc_10_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_10_false,$countqa1);
$total_qa1_rbcc_11_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_11_false,$countqa1);
$total_qa1_rbcc_12_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_12_false,$countqa1);
$total_qa1_rbcc_13_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_13_false,$countqa1);
$total_qa1_rbcc_14_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_14_false,$countqa1);
$total_qa1_rbcc_15_false_percent = $json->DataCountPercent($count_total_qa1_rbcc_15_false,$countqa1);

echo "<br><hr><br>";
echo "<H1>2. )ACCEPTING JOB REASON</H1>";
//general count of question 2
$table = "`survey_question2`";
$row = "`survey_row1`";
$col = "`survey_col1`";
$totalqa2 = mysqli_query($con,$saf.$table);
$totalqa2_rc_1_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row." = '1' && ".$col." = 'yes'");
$totalqa2_rc_2_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row." = '2' && ".$col." = 'yes'");
$totalqa2_rc_3_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row." = '3' && ".$col." = 'yes'");
$totalqa2_rc_4_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row." = '4' && ".$col." = 'yes'");
$totalqa2_rc_5_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row." = '5' && ".$col." != 'no'");

$totalqa2_rc_1_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row." = '1' && ".$col." = 'no'");
$totalqa2_rc_2_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row." = '2' && ".$col." = 'no'");
$totalqa2_rc_3_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row." = '3' && ".$col." = 'no'");
$totalqa2_rc_4_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row." = '4' && ".$col." = 'no'");
$totalqa2_rc_5_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row." = '5' && ".$col." = 'no'");

$countqa2= $json->DataCount($totalqa2);
$count_total_qa2_rc_1_true= $json->DataCount($totalqa2_rc_1_true);
$count_total_qa2_rc_2_true= $json->DataCount($totalqa2_rc_2_true);
$count_total_qa2_rc_3_true= $json->DataCount($totalqa2_rc_3_true);
$count_total_qa2_rc_4_true= $json->DataCount($totalqa2_rc_4_true);
$count_total_qa2_rc_5_true= $json->DataCount($totalqa2_rc_5_true);

$count_total_qa2_rc_1_false= $json->DataCount($totalqa2_rc_1_false);
$count_total_qa2_rc_2_false= $json->DataCount($totalqa2_rc_2_false);
$count_total_qa2_rc_3_false= $json->DataCount($totalqa2_rc_3_false);
$count_total_qa2_rc_4_false= $json->DataCount($totalqa2_rc_4_false);
$count_total_qa2_rc_5_false= $json->DataCount($totalqa2_rc_5_false);
echo "all question number 2 checked answered <br>";
$total_qa2_rc_1_true_percent = $json->DataCountPercent($count_total_qa2_rc_1_true,$countqa2);
$total_qa2_rc_2_true_percent = $json->DataCountPercent($count_total_qa2_rc_2_true,$countqa2);
$total_qa2_rc_3_true_percent = $json->DataCountPercent($count_total_qa2_rc_3_true,$countqa2);
$total_qa2_rc_4_true_percent = $json->DataCountPercent($count_total_qa2_rc_4_true,$countqa2);
$total_qa2_rc_5_true_percent = $json->DataCountPercent($count_total_qa2_rc_5_true,$countqa2);
echo $total_qa2_rc_1_true_percent." %<br>";
echo $total_qa2_rc_2_true_percent." %<br>";
echo $total_qa2_rc_3_true_percent." %<br>";
echo $total_qa2_rc_4_true_percent." %<br>";
echo $total_qa2_rc_5_true_percent." %<br>";

echo "all question number 2 uncheck unanswered <br>";
$total_qa2_rc_1_false_percent = $json->DataCountPercent($count_total_qa2_rc_1_false,$countqa2);
$total_qa2_rc_2_false_percent = $json->DataCountPercent($count_total_qa2_rc_2_false,$countqa2);
$total_qa2_rc_3_false_percent = $json->DataCountPercent($count_total_qa2_rc_3_false,$countqa2);
$total_qa2_rc_4_false_percent = $json->DataCountPercent($count_total_qa2_rc_4_false,$countqa2);
$total_qa2_rc_5_false_percent = $json->DataCountPercent($count_total_qa2_rc_5_false,$countqa2);
echo $total_qa2_rc_1_false_percent." %<br>";
echo $total_qa2_rc_2_false_percent." %<br>";
echo $total_qa2_rc_3_false_percent." %<br>";
echo $total_qa2_rc_4_false_percent." %<br>";
echo $total_qa2_rc_5_false_percent." %<br>";

$totalpercent_a2 = ($total_qa2_rc_1_true_percent + 
$total_qa2_rc_2_true_percent + 
$total_qa2_rc_3_true_percent + 
$total_qa2_rc_4_true_percent + 
$total_qa2_rc_5_true_percent + 
$total_qa2_rc_1_false_percent + 
$total_qa2_rc_2_false_percent + 
$total_qa2_rc_3_false_percent + 
$total_qa2_rc_4_false_percent + 
$total_qa2_rc_5_false_percent);

echo "<br>TOTAL PERCENT : $totalpercent_a2 %<br>";


// $totalo1Percentage_RegisterJS="$totalo1_percent";
// $js_out_totalo1Percentage = json_encode($totalo1Percentage_RegisterJS);
// $totalo2Percentage_RegisterJS="$totalo2_percent";
// $js_out_totalo2Percentage = json_encode($totalo2Percentage_RegisterJS);
// $totalo3Percentage_RegisterJS="$totalo3_percent";
// $js_out_totalo3Percentage = json_encode($totalo3Percentage_RegisterJS);
// $totalo4Percentage_RegisterJS="$totalo4_percent";
// $js_out_totalo4Percentage = json_encode($totalo4Percentage_RegisterJS);
// $totalo5Percentage_RegisterJS="$totalo5_percent";
// $js_out_totalo5Percentage = json_encode($totalo5Percentage_RegisterJS);

echo "<br><hr><br>";
//general count of question 3
echo "<H1>3. )JOB LEVEL POSITION</H1>";
$table = "`survey_question3`"; 
$col1 = "`col1`";
$col2 = "`col2`";
$totalqa3 = mysqli_query($con,$saf.$table);
$total_c1_true = mysqli_query($con,$saf." ".$table." WHERE ".$col1." = '1'");
$total_c1_false = mysqli_query($con,$saf." ".$table." WHERE ".$col1." = ''");

$total_c2_true = mysqli_query($con,$saf." ".$table." WHERE ".$col2." = '1'");
$total_c2_false = mysqli_query($con,$saf." ".$table." WHERE ".$col2." = ''");

$total_cboth_true = mysqli_query($con,$saf." ".$table." WHERE ".$col1." = '1' AND ".$col2." = '1'");
$total_cboth_false = mysqli_query($con,$saf." ".$table." WHERE ".$col1." = '' AND ".$col2." = ''");

$countqa3 = $json->DataCount($totalqa3);
$count_total_c1_true = $json->DataCount($total_c1_true);
$count_total_c1_false = $json->DataCount($total_c1_false);
$count_total_c2_true = $json->DataCount($total_c2_true);
$count_total_c2_false = $json->DataCount($total_c2_false);
$count_total_cboth_true = $json->DataCount($total_cboth_true);
$count_total_cboth_false = $json->DataCount($total_cboth_false);

$total_qa3_c1_true_percent = $json->DataCountPercent($count_total_c1_true,$countqa3);
$total_qa3_c1_false_percent = $json->DataCountPercent($count_total_c1_false,$countqa3);
$total_qa3_c2_true_percent = $json->DataCountPercent($count_total_c2_true,$countqa3);
$total_qa3_c2_false_percent = $json->DataCountPercent($count_total_c2_false,$countqa3);
$total_qa3_cboth_true_percent = $json->DataCountPercent($count_total_cboth_true,$countqa3);
$total_qa3_cboth_false_percent = $json->DataCountPercent($count_total_cboth_false,$countqa3);

$total_c1_percent = ($total_qa3_c1_true_percent + $total_qa3_c1_false_percent);
$total_c2_percent = ($total_qa3_c2_true_percent + $total_qa3_c2_false_percent);
$total_cboth_percent = ($total_qa3_cboth_true_percent + $total_qa3_cboth_false_percent);

$totalpercent_of_a3 = ($total_c1_percent + $total_c1_percent + $total_cboth_percent);

$total_qa3_percent_f1 = $json->DataCountPercent($total_qa3_c1_true_percent,$totalpercent_of_a3);
$total_qa3_percent_f2 = $json->DataCountPercent($total_qa3_c1_false_percent,$totalpercent_of_a3);
$total_qa3_percent_f3 = $json->DataCountPercent($total_qa3_c2_true_percent,$totalpercent_of_a3);
$total_qa3_percent_f4 = $json->DataCountPercent($total_qa3_c2_false_percent,$totalpercent_of_a3);
$total_qa3_percent_f5 = $json->DataCountPercent($total_qa3_cboth_true_percent,$totalpercent_of_a3);
$total_qa3_percent_f6 = $json->DataCountPercent($total_qa3_cboth_false_percent,$totalpercent_of_a3);
echo "count: ".$count_total_c1_true."/".$total_qa3_percent_f1." %<br>";
echo "count: ".$count_total_c1_false."/".$total_qa3_percent_f2." %<br>";
echo "count: ".$count_total_c2_true."/".$total_qa3_percent_f3." %<br>";
echo "count: ".$count_total_c2_false."/".$total_qa3_percent_f4." %<br>";
echo "count: ".$count_total_cboth_true."/".$total_qa3_percent_f5." %<br>";
echo "count: ".$count_total_cboth_false."/".$total_qa3_percent_f6." %<br>";
$totalpercent_a3 = ($total_qa3_percent_f1 + 
$total_qa3_percent_f2 + 
$total_qa3_percent_f3 + 
$total_qa3_percent_f4 + 
$total_qa3_percent_f5 + 
$total_qa3_percent_f6 );
echo "<br>TOTAL PERCENT : ".$totalpercent_a3."%<br>";

echo "<br><hr><br>";
echo "<H1>4. )INITIAL GROSS MONTHLY EARNING IN YOUR FIRST JOB</H1>";
//general count of question 4
$table = "`survey_question4`";
$row = "`row1`";
$col = "`col1`";
$totalqa4 = mysqli_query($con,$saf." `survey_question4`");
$totalqa4_rc_1_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '1' AND ".$col." = '1'");
$totalqa4_rc_2_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '2' AND ".$col." = '1'");
$totalqa4_rc_3_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '3' AND ".$col." = '1'");
$totalqa4_rc_4_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '4' AND ".$col." = '1'");
$totalqa4_rc_5_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '5' AND ".$col." = '1'");
$totalqa4_rc_6_true =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '6' AND ".$col." = '1'");

$totalqa4_rc_1_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '1' AND ".$col." = ''");
$totalqa4_rc_2_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '2' AND ".$col." = ''");
$totalqa4_rc_3_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '3' AND ".$col." = ''");
$totalqa4_rc_4_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '4' AND ".$col." = ''");
$totalqa4_rc_5_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '5' AND ".$col." = ''");
$totalqa4_rc_6_false =  mysqli_query($con,$saf." ".$table." WHERE ".$row."= '6' AND ".$col." = ''");

$countqa4 = $json->DataCount($totalqa4);
$count_total_qa4_1_true = $json->DataCount($totalqa4_rc_1_true);
$count_total_qa4_2_true = $json->DataCount($totalqa4_rc_2_true);
$count_total_qa4_3_true = $json->DataCount($totalqa4_rc_3_true);
$count_total_qa4_4_true = $json->DataCount($totalqa4_rc_4_true);
$count_total_qa4_5_true = $json->DataCount($totalqa4_rc_5_true);
$count_total_qa4_6_true = $json->DataCount($totalqa4_rc_6_true);

$count_total_qa4_1_false = $json->DataCount($totalqa4_rc_1_false);
$count_total_qa4_2_false = $json->DataCount($totalqa4_rc_2_false);
$count_total_qa4_3_false = $json->DataCount($totalqa4_rc_3_false);
$count_total_qa4_4_false = $json->DataCount($totalqa4_rc_4_false);
$count_total_qa4_5_false = $json->DataCount($totalqa4_rc_5_false);
$count_total_qa4_6_false = $json->DataCount($totalqa4_rc_6_false);
echo "all question number 4 checked answered <br>";
$total_qa4_1_true_percent = $json->DataCountPercent($count_total_qa4_1_true,$countqa4);
$total_qa4_2_true_percent = $json->DataCountPercent($count_total_qa4_2_true,$countqa4);
$total_qa4_3_true_percent = $json->DataCountPercent($count_total_qa4_3_true,$countqa4);
$total_qa4_4_true_percent = $json->DataCountPercent($count_total_qa4_4_true,$countqa4);
$total_qa4_5_true_percent = $json->DataCountPercent($count_total_qa4_5_true,$countqa4);
$total_qa4_6_true_percent = $json->DataCountPercent($count_total_qa4_6_true,$countqa4);


$total_qa4_1_false_percent = $json->DataCountPercent($count_total_qa4_1_false,$countqa4);
$total_qa4_2_false_percent = $json->DataCountPercent($count_total_qa4_2_false,$countqa4);
$total_qa4_3_false_percent = $json->DataCountPercent($count_total_qa4_3_false,$countqa4);
$total_qa4_4_false_percent = $json->DataCountPercent($count_total_qa4_4_false,$countqa4);
$total_qa4_5_false_percent = $json->DataCountPercent($count_total_qa4_5_false,$countqa4);
$total_qa4_6_false_percent = $json->DataCountPercent($count_total_qa4_6_false,$countqa4);
echo "count: ".$count_total_qa4_1_true."/".$total_qa4_1_true_percent." %<br>";
echo "count: ".$count_total_qa4_2_true."/".$total_qa4_2_true_percent." %<br>";
echo "count: ".$count_total_qa4_3_true."/".$total_qa4_3_true_percent." %<br>";
echo "count: ".$count_total_qa4_4_true."/".$total_qa4_4_true_percent." %<br>";
echo "count: ".$count_total_qa4_5_true."/".$total_qa4_5_true_percent." %<br>";
echo "count: ".$count_total_qa4_6_true."/".$total_qa4_6_true_percent." %<br>";

echo "count: ".$count_total_qa4_1_false."/".$total_qa4_1_false_percent." %<br>";
echo "count: ".$count_total_qa4_2_false."/".$total_qa4_2_false_percent." %<br>";
echo "count: ".$count_total_qa4_3_false."/".$total_qa4_3_false_percent." %<br>";
echo "count: ".$count_total_qa4_4_false."/".$total_qa4_4_false_percent." %<br>";
echo "count: ".$count_total_qa4_5_false."/".$total_qa4_5_false_percent." %<br>";
echo "count: ".$count_total_qa4_6_false."/".$total_qa4_6_false_percent." %<br>";

$totalpercent_a4 = ($total_qa4_1_true_percent +
$total_qa4_2_true_percent +
$total_qa4_3_true_percent +
$total_qa4_4_true_percent +
$total_qa4_5_true_percent +
$total_qa4_6_true_percent +
$total_qa4_1_false_percent +
$total_qa4_2_false_percent +
$total_qa4_3_false_percent +
$total_qa4_4_false_percent +
$total_qa4_5_false_percent +
$total_qa4_6_false_percent);
echo "<br>TOTAL PERCENT : ".$totalpercent_a4."%<br>";
echo "<br><hr><br>";
echo "<H1>5. )PRESENT EMPLOYEE STATUS</H1>";
//general count of question 5
$table = "`survey_question5`";
$col = "`ans`";
$totalaq5 = mysqli_query($con,$saf." `survey_question5`");
$totalqa5_rc1_true =  mysqli_query($con,$saf." ".$table." WHERE ".$col." = 'yes'");
$totalqa5_rc1_false =  mysqli_query($con,$saf." ".$table." WHERE ".$col." = 'no'");

$countqa5 = $json->DataCount($totalaq5);
$count_total_qa5_1_true = $json->DataCount($totalqa5_rc1_true);
$count_total_qa5_1_false = $json->DataCount($totalqa5_rc1_false);
$total_qa5_1_true_percent = $json->DataCountPercent($count_total_qa5_1_true,$countqa5);
$total_qa5_1_false_percent = $json->DataCountPercent($count_total_qa5_1_false,$countqa5);
echo "count: ".$count_total_qa5_1_true."/".$total_qa5_1_true_percent." %<br>";
echo "count: ".$count_total_qa5_1_false."/".$total_qa5_1_false_percent." %<br>";
$totalpercent_a5 = ($total_qa5_1_true_percent + $total_qa5_1_false_percent);

echo "<br>TOTAL PERCENT : ".$totalpercent_a5."%<br>";
echo "<br><hr><br>";
echo "<H1>6. ) Present Employment Status</H1>";
//general count of question 6
$table = "`survey_question6`";
$col = "`ans`";
$totalqa6 = mysqli_query($con,$saf.$table);
$totalqa6_rc1 =  mysqli_query($con,$saf." ".$table." WHERE ".$col." =  'rop'");
$totalqa6_rc2 =  mysqli_query($con,$saf." ".$table."  WHERE ".$col." =  'temp'");
$totalqa6_rc3 =  mysqli_query($con,$saf." ".$table."  WHERE ".$col." =  'con'");
$totalqa6_rc4 =  mysqli_query($con,$saf." ".$table."  WHERE ".$col." =  'cas'");
$totalqa6_rc5 =  mysqli_query($con,$saf." ".$table."  WHERE ".$col." =  'self'");


$countqa6 = $json->DataCount($totalqa6);
$count_total_qa6_1 = $json->DataCount($totalqa6_rc1);
$count_total_qa6_2 = $json->DataCount($totalqa6_rc2);
$count_total_qa6_3 = $json->DataCount($totalqa6_rc3);
$count_total_qa6_4 = $json->DataCount($totalqa6_rc4);
$count_total_qa6_5 = $json->DataCount($totalqa6_rc5);

$total_qa6_1_percent = $json->DataCountPercent($count_total_qa6_1,$countqa6);
$total_qa6_2_percent = $json->DataCountPercent($count_total_qa6_2,$countqa6);
$total_qa6_3_percent = $json->DataCountPercent($count_total_qa6_3,$countqa6);
$total_qa6_4_percent = $json->DataCountPercent($count_total_qa6_4,$countqa6);
$total_qa6_5_percent = $json->DataCountPercent($count_total_qa6_5,$countqa6);

echo "count: ".$count_total_qa6_1."/".$total_qa6_1_percent." %<br>";
echo "count: ".$count_total_qa6_2."/".$total_qa6_2_percent." %<br>";
echo "count: ".$count_total_qa6_3."/".$total_qa6_3_percent." %<br>";
echo "count: ".$count_total_qa6_4."/".$total_qa6_4_percent." %<br>";
echo "count: ".$count_total_qa6_5."/".$total_qa6_5_percent." %<br>";

$totalpercent_a6 = ($total_qa6_1_percent  + 
$total_qa6_2_percent +
$total_qa6_3_percent +
$total_qa6_4_percent +
$total_qa6_5_percent 
);

echo "<br>TOTAL PERCENT : ".$totalpercent_a6."%<br>";
echo "<br><hr><br>";
echo "<H1>7. )IS YOUR COLLEGE CURRICULUM RELEVANT TO YOUR JOB</H1>";
//general count of question 7
$table = "`survey_question7`";
$col = "`survey_ans`";
$totalqa7 = mysqli_query($con,$saf." ".$table."");
$totalqa7_rc1_true = mysqli_query($con,$saf." ".$table." WHERE ".$col." = '1'");
$totalqa7_rc1_false = mysqli_query($con,$saf." ".$table." WHERE ".$col."= '0'");

$countaq7 = $json->DataCount($totalqa7);
$count_total_qa7_1_true = $json->DataCount($totalqa7_rc1_true);
$count_total_qa7_1_false = $json->DataCount($totalqa7_rc1_false);

$total_qa7_1_true_percent = $json->DataCountPercent($count_total_qa7_1_true,$countaq7);
$total_qa7_1_false_percent = $json->DataCountPercent($count_total_qa7_1_false,$countaq7);

echo "count: ".$count_total_qa7_1_true."/".$total_qa7_1_true_percent." %<br>";
echo "count: ".$count_total_qa7_1_false."/".$total_qa7_1_false_percent." %<br>";

$totalpercent_a7 = ($total_qa7_1_true_percent + $total_qa7_1_false_percent);
echo "<br>TOTAL PERCENT : ".$totalpercent_a7."%<br>";
echo "<br><hr><br>";
echo "<H1>8. )USEFUL COMPETENCIES LEARNED FOR YOUR JOB</H1>";
//general count of question 8

$table = "`survey_question8`";
$row = "`row1`";
$col = "`col1`";
$totalqa8 = mysqli_query($con,$saf." ".$table." ");
$totalqa8_rc1_true = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '1' AND ".$col." = '1'");
$totalqa8_rc2_true = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '2' AND ".$col." = '1'");
$totalqa8_rc3_true = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '3' AND ".$col." = '1'");
$totalqa8_rc4_true = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '4' AND ".$col." = '1'");
$totalqa8_rc5_true = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '5' AND ".$col." = '1'");
$totalqa8_rc6_true = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '6' AND ".$col." != ''");

$totalqa8_rc1_false = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '1' AND ".$col." = ''");
$totalqa8_rc2_false = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '2' AND ".$col." = ''");
$totalqa8_rc3_false = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '3' AND ".$col." = ''");
$totalqa8_rc4_false = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '4' AND ".$col." = ''");
$totalqa8_rc5_false = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '5' AND ".$col." = ''");
$totalqa8_rc6_false = mysqli_query($con,$saf." ".$table." WHERE ".$row." = '6' AND ".$col." = ''");


$countqa8 = $json->DataCount($totalqa8);
$count_total_qa8_1_true = $json->DataCount($totalqa8_rc1_true);
$count_total_qa8_2_true = $json->DataCount($totalqa8_rc2_true);
$count_total_qa8_3_true = $json->DataCount($totalqa8_rc3_true);
$count_total_qa8_4_true = $json->DataCount($totalqa8_rc4_true);
$count_total_qa8_5_true = $json->DataCount($totalqa8_rc5_true);
$count_total_qa8_6_true = $json->DataCount($totalqa8_rc6_true);


$count_total_qa8_1_false = $json->DataCount($totalqa8_rc1_false);
$count_total_qa8_2_false = $json->DataCount($totalqa8_rc2_false);
$count_total_qa8_3_false = $json->DataCount($totalqa8_rc3_false);
$count_total_qa8_4_false = $json->DataCount($totalqa8_rc4_false);
$count_total_qa8_5_false = $json->DataCount($totalqa8_rc5_false);
$count_total_qa8_6_false = $json->DataCount($totalqa8_rc6_false);

$total_qa8_1_true_percent = $json->DataCountPercent($count_total_qa8_1_true,$countqa8);
$total_qa8_2_true_percent = $json->DataCountPercent($count_total_qa8_2_true,$countqa8);
$total_qa8_3_true_percent = $json->DataCountPercent($count_total_qa8_3_true,$countqa8);
$total_qa8_4_true_percent = $json->DataCountPercent($count_total_qa8_4_true,$countqa8);
$total_qa8_5_true_percent = $json->DataCountPercent($count_total_qa8_5_true,$countqa8);
$total_qa8_6_true_percent = $json->DataCountPercent($count_total_qa8_6_true,$countqa8);


$total_qa8_1_false_percent = $json->DataCountPercent($count_total_qa8_1_false,$countqa8);
$total_qa8_2_false_percent = $json->DataCountPercent($count_total_qa8_2_false,$countqa8);
$total_qa8_3_false_percent = $json->DataCountPercent($count_total_qa8_3_false,$countqa8);
$total_qa8_4_false_percent = $json->DataCountPercent($count_total_qa8_4_false,$countqa8);
$total_qa8_5_false_percent = $json->DataCountPercent($count_total_qa8_5_false,$countqa8);
$total_qa8_6_false_percent = $json->DataCountPercent($count_total_qa8_6_false,$countqa8);

echo "count: ".$count_total_qa8_1_true."/".$total_qa8_1_true_percent." %<br>";
echo "count: ".$count_total_qa8_2_true."/".$total_qa8_2_true_percent." %<br>";
echo "count: ".$count_total_qa8_3_true."/".$total_qa8_3_true_percent." %<br>";
echo "count: ".$count_total_qa8_4_true."/".$total_qa8_4_true_percent." %<br>";
echo "count: ".$count_total_qa8_5_true."/".$total_qa8_5_true_percent." %<br>";
echo "count: ".$count_total_qa8_6_true."/".$total_qa8_6_true_percent." %<br>";
echo "count: ".$count_total_qa8_1_false."/".$total_qa8_1_false_percent." %<br>";
echo "count: ".$count_total_qa8_2_false."/".$total_qa8_2_false_percent." %<br>";
echo "count: ".$count_total_qa8_3_false."/".$total_qa8_3_false_percent." %<br>";
echo "count: ".$count_total_qa8_4_false."/".$total_qa8_4_false_percent." %<br>";
echo "count: ".$count_total_qa8_5_false."/".$total_qa8_5_false_percent." %<br>";
echo "count: ".$count_total_qa8_6_false."/".$total_qa8_6_false_percent." %<br>";
$totalpercent_a8 = ($total_qa8_1_true_percent + 
$total_qa8_2_true_percent + 
$total_qa8_3_true_percent + 
$total_qa8_4_true_percent + 
$total_qa8_5_true_percent + 
$total_qa8_6_true_percent + 
$total_qa8_1_false_percent +
$total_qa8_2_false_percent +
$total_qa8_3_false_percent +
$total_qa8_4_false_percent +
$total_qa8_5_false_percent +
$total_qa8_6_false_percent 
);
echo "<br>TOTAL PERCENT : ".$totalpercent_a8."%<br>";
echo "<br><hr><br>";


?>