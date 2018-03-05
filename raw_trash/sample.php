<?php 

$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
class json
 	{
 	public $value = 0;
    public function EncodeParsing($parse){
      	$j_encode = json_encode($parse);
      	return $j_encode;
      }
    public function DataCount($count){

      	$total_count = mysqli_num_rows($count);
      	return $total_count;
      }
       
	public function stackValue($val)
	  {
	      $this->value += $val;
	  }
	 
	public function getSum()
	  {
	      return $this->value . "<br />";
	  }
	public function addtoString($str, $item) {
    $parts = explode(',', $str);
    $parts[] = $item;

    return implode(',', $parts);
    }
 

   
    }
$json = new json;


$totalresult_ofStudent = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'register'");
$totalresult_ofTeacher = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'register'");
$totalresult_ofAdmin = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'register'");

$totalAcc_register_asStudent = $json->DataCount($totalresult_ofStudent);
$totalAcc_register_asTeacher = $json->DataCount($totalresult_ofTeacher);
$totalAcc_register_asAdmin = $json->DataCount($totalresult_ofAdmin);
echo "register account<br>";
echo "student:".$json->EncodeParsing($totalAcc_register_asStudent);
echo "teacher".$json->EncodeParsing($totalAcc_register_asTeacher);
echo "admin".$json->EncodeParsing($totalAcc_register_asAdmin);
echo "<br>";
echo "<hr>";
$year_selected = mysqli_query($con,"SELECT * FROM `survey_forms` WHERE form_taken like '2017%'");

while ($data_yrselected = mysqli_fetch_array($year_selected))
{	
	$survey_formID = $data_yrselected['form_id'];
	$arr = array();
	$arr[] = $survey_formID;
	for ($i=1; $i <15; $i++) { 
		$totalresult_col1 = mysqli_query($con,"SELECT * FROM `survey_question1` WHERE `row` = '$i' AND `col1` = 'U_AB_BS$i' AND `survey_formID` = '$survey_formID'");
		mysqli_query($con,"SELECT * FROM `survey_question1` WHERE `row` = '$i' AND `col2` = 'G_MS_MA_PHD$i' AND `survey_formID` = '$survey_formID'");
		mysqli_query($con,"SELECT * FROM `survey_question1` WHERE `row` = '$i' AND `col1` = 'U_AB_BS$i' AND  `col2` = 'G_MS_MA_PHD$i' AND `survey_formID` = '$survey_formID'");

		$total_col1 = $json->DataCount($totalresult_col1);
		echo "Count co1umn $i: ". $json->EncodeParsing($total_col1)."<br>";
		$col_count = $json->EncodeParsing($total_col1);
		$json->stackValue($json->EncodeParsing($total_col1));
		echo $json->getSum();
		// $json->stackValue(-$col_count);

	}
		


	
	// $totalresult_row15_null = mysqli_query($con,"SELECT * FROM `survey_question1` WHERE `row` = '15' AND `col2` = '$survey_formID'");
	
	
}
	echo "<hr>";
	
echo array_count_values( $arr);
?>

