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

$totalqa1_rc_true = array();
$totalqa1_rc_false = array();
$totalqa1_rcc_true = array();
$totalqa1_rcc_false = array();
$totalqa1_rbcc_true = array();
$totalqa1_rbcc_false = array();

$count_total_qa1_rc_true = array();
$count_total_qa1_rc_false = array();
$count_total_qa1_rcc_true = array();
$count_total_qa1_rcc_false = array();
$count_total_qa1_rbcc_true = array();
$count_total_qa1_rbcc_false = array();

$total_qa1_rc_true_percent = array();
$total_qa1_rc_false_percent = array();
$total_qa1_rcc_true_percent = array();
$total_qa1_rcc_false_percent = array();
$total_qa1_rbcc_true_percent = array();
$total_qa1_rbcc_false_percent = array();

for ($i=0; $i < 15; $i++) { 
	$a = $i+1;
	$totalqa1_rc_true[$i] = mysqli_query($con,$saf." ".$table." WHERE ".$row."='$a' AND ".$col1." != ''");
	$totalqa1_rc_false[$i] = mysqli_query($con,$saf." ".$table." WHERE ".$row."='$a' AND ".$col1." = ''");
	$totalqa1_rcc_true[$i] = mysqli_query($con,$saf." ".$table." WHERE ".$row."='$a' AND ".$col2." != ''");
	$totalqa1_rcc_false[$i] = mysqli_query($con,$saf." ".$table." WHERE ".$row."='$a' AND ".$col2." = ''");
	$totalqa1_rbcc_true[$i] = mysqli_query($con,$saf." ".$table." WHERE ".$row."='$a' AND ".$col1." != '' AND ".$col2." != ''");
	$totalqa1_rbcc_false[$i] = mysqli_query($con,$saf." ".$table." WHERE ".$row."='$a' AND ".$col1." = '' AND ".$col2." = ''");

}
//total of all recorded answer on number 1.
$countqa1 = $json->DataCount($totalqa1);
//for each column 1 row 1 - 15 true value
foreach ($totalqa1_rc_true as $rc_true) {
	
	$count_total_qa1_rc_true[] = $json->DataCount($rc_true);
	 
}
//for each column 1 row 1 - 15 false value
foreach ($totalqa1_rc_false as $rc_false) {
	$count_total_qa1_rc_false[] = $json->DataCount($rc_false);
	
}
//for each column 2 row 1 - 15 true value
foreach ($totalqa1_rcc_true as $rcc_true) {
	
	$count_total_qa1_rcc_true[] = $json->DataCount($rcc_true);
	 
}
//for each column 2 row 1 - 15 false value
foreach ($totalqa1_rcc_false as $rcc_false) {
	$count_total_qa1_rcc_false[] = $json->DataCount($rcc_false);

}
//for each column 1 and column 2 row 1 - 15 true value
foreach ($totalqa1_rbcc_true as $rbcc_true) {
	
	$count_total_qa1_rbcc_true[] = $json->DataCount($rbcc_true);
	 
}
//for each column 1 and column 2 row 1 - 15 false value
foreach ($totalqa1_rbcc_false as $rbcc_false) {
	$count_total_qa1_rbcc_false[] = $json->DataCount($rbcc_false);
	 
}


foreach ($count_total_qa1_rc_true as $total_qa1_rc_true) {
	echo $total_qa1_rc_true_percent[] = $json->DataCountPercent($total_qa1_rc_true,$countqa1);
	echo "<br>";
}
foreach ($count_total_qa1_rc_false as $total_qa1_rc_false) {
	echo $total_qa1_rc_false_percent[] = $json->DataCountPercent($total_qa1_rc_false,$countqa1);
	echo "<br>";
}
foreach ($count_total_qa1_rcc_true as $total_qa1_rcc_true) {
	echo $total_qa1_rcc_true_percent[] = $json->DataCountPercent($total_qa1_rcc_true,$countqa1);
	echo "<br>";
}
foreach ($count_total_qa1_rcc_false as $total_qa1_rcc_false) {
	echo $total_qa1_rcc_false_percent[] = $json->DataCountPercent($total_qa1_rcc_false,$countqa1);
	echo "<br>";
}
foreach ($count_total_qa1_rc_true as $total_qa1_rbcc_true) {
	echo $total_qa1_rbcc_true_percent[] = $json->DataCountPercent($total_qa1_rbcc_true,$countqa1);
	echo "<br>";
}
foreach ($count_total_qa1_rc_false as $total_qa1_rbcc_false) {
	echo $total_qa1_rbcc_false_percent[] = $json->DataCountPercent($total_qa1_rbcc_false,$countqa1);
	echo "<br>";
}


?>