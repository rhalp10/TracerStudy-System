<?php 

ini_set('display_errors', 1);
ini_set('error_reporting', E_ERROR);
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
//requested owner id
$ownerID = $_REQUEST['ownerID'];
$ownerID = stripcslashes($ownerID);
$ownerID = mysqli_escape_string($con,$ownerID);

$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$ownerID'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
if ($survey_maxattemp['survey_maxattemp']  =='1') {
	mysqli_query($con,"UPDATE `survey_maxcount` SET `survey_maxattemp` = '0' WHERE `survey_ownerID` = '$ownerID' ");
}
if ($survey_maxattemp['survey_maxattemp']  =='2') {
	mysqli_query($con,"UPDATE `survey_maxcount` SET `survey_maxattemp` = '1' WHERE `survey_ownerID` = '$ownerID' ");
}

if (isset($_POST['submit-survey'])) {

  	if ($survey_maxattemp['survey_maxattemp']  =='0' )
    {
       	echo "<script>alert('You already reach maximum attemp of taking survey');
			window.location='../survey.php';
		</script>";
    }
    else
    {
    	
        mysqli_query($con,"INSERT INTO `survey_forms` (`form_id`, `form_ownerID`, `form_taken`) VALUES (NULL, '$ownerID', CURRENT_TIMESTAMP)");
        $last_id = mysqli_insert_id($con);
        for ($i=1; $i <=15; $i++) { 
			
			
			if ($_POST['U_AB_BS'.$i]) {
				$U_AB_BS = $_POST['U_AB_BS'.$i];
				$U_AB_BS = stripcslashes($U_AB_BS);
				$U_AB_BS = mysqli_escape_string($con,$U_AB_BS);
			

			}
			else
			{
				$U_AB_BS = "";
			}
			if ($_POST['G_MS_MA_PHD'.$i]) {
				$G_MS_MA_PHD = $_POST['G_MS_MA_PHD'.$i];
				$G_MS_MA_PHD = stripcslashes($G_MS_MA_PHD);
				$G_MS_MA_PHD = mysqli_escape_string($con,$G_MS_MA_PHD);
				
			}
			else
			{
				$G_MS_MA_PHD = "";
			}
			if ($i == 15) {
				if ($_POST['Other_q1']) {
					$Other_q1 = $_POST['Other_q1'];
					$Other_q1 = stripcslashes($Other_q1);
					$Other_q1 = mysqli_escape_string($con,$Other_q1);
					
				}
				else
				{

				$Other_q1 = "";
			
				}
					$sql_q1 = "INSERT INTO `survey_question1` (`survey_qID`, `row`, `col1`, `col2`,`survey_formID`) ";
					$sql_q1 .= " VALUES (NULL, '$i', 'other', '$Other_q1','$last_id')";
					mysqli_query($con,$sql_q1);

			}
			else
			{
				
				$sql_q1 = "INSERT INTO `survey_question1` (`survey_qID`, `row`, `col1`, `col2`,`survey_formID`) ";
				$sql_q1 .= " VALUES (NULL, '$i', '$U_AB_BS', '$G_MS_MA_PHD','$last_id')";
				mysqli_query($con,$sql_q1);
			}
			
			

		}

		$Salaries_benefits = $_POST['Salaries_benefits'];//1
		$Career_challenge = $_POST['Career_challenge'];//2
		$Related_to_special_skills = $_POST['Related_to_special_skills'];//3
		$Proximity_to_residence = $_POST['Proximity_to_residence'];//4
		$Other_q2 = $_POST['Other_q2'];//5
		$FJ_RankCleric = $_POST['FJ_RankCleric'];//1 
		$CPJ_RankCleric = $_POST['CPJ_RankCleric'];//1
		$FJ_ProTecSup = $_POST['FJ_ProTecSup'];//2
		$CPJ_ProTecSup = $_POST['CPJ_ProTecSup'];//2
		$FJ_Magex = $_POST['FJ_Magex'];//3
		$CPJ_Magex = $_POST['CPJ_Magex'];//3
		$FJ_SelfEmp = $_POST['FJ_SelfEmp'];//4
		$CPJ_SelfEmp = $_POST['CPJ_SelfEmp'];//4
		$Below5k = $_POST['Below5k']; 
		$k5lessthan10k = $_POST['k5lessthan10k'];//2
		$k10lessthan15k = $_POST['k10_less_than_15k'];//3
		$k15lessthan20k = $_POST['k15_less_than_20k'];//4
		$k20lessthan25k = $_POST['k20_less_than_25k'];//5
		$k25andabove = $_POST['k25_and_above'];//6
		$pre_emp = $_POST['pre_emp'];
		$job= $_POST['job'];
		$pre_stat = $_POST['pre_stat'];

	 	$Communication_skills = $_POST['Communication_skills'];//1
		$HumRelSkills = $_POST['HumRelSkills'];//2
		$EntreSkill = $_POST['EntreSkill'];//3
		$ProbsolbSkill = $_POST['ProbsolbSkill'];//4
		$CritThinkSkill = $_POST['CritThinkSkill'];//5
		$Other_q8 = $_POST['Other_q8'];//6
		$Salaries_benefits = stripslashes($Salaries_benefits);
		$Career_challenge =  stripslashes($Career_challenge);
		$Related_to_special_skills = stripslashes($Related_to_special_skills);
		$Proximity_to_residence =  stripslashes($Proximity_to_residence);
		$Other_q2 =  stripslashes($Other_q2);
		$FJ_RankCleric =  stripslashes($FJ_RankCleric);
		$CPJ_RankCleric = stripslashes($CPJ_RankCleric);
		$FJ_ProTecSup =  stripslashes($FJ_ProTecSup);
		$CPJ_ProTecSup =  stripslashes($CPJ_ProTecSup);
		$FJ_Magex =  stripslashes($FJ_Magex);
		$CPJ_Magex =  stripslashes($CPJ_Magex);
		$FJ_SelfEmp =  stripslashes($FJ_SelfEmp);
		$CPJ_SelfEmp =  stripslashes($CPJ_SelfEmp);
		$Below5k =  stripslashes($Below5k);
		$k5lessthan10k =  stripslashes($k5lessthan10k);
		$k10lessthan15k =  stripslashes($k10lessthan15k);
		$k15lessthan20k =  stripslashes($k15lessthan20k);
		$k20lessthan25k =  stripslashes($k20lessthan25k);
		$k25andabove =  stripslashes($k25andabove);
		$pre_emp = stripslashes($pre_emp);
		$pre_stat = stripslashes($pre_stat);
	 	$Communication_skills =  stripslashes($Communication_skills);
		$HumRelSkills =  stripslashes($HumRelSkills);
		$EntreSkill =  stripslashes($EntreSkill);
		$ProbsolbSkill =  stripslashes($ProbsolbSkill);
		$CritThinkSkill =  stripslashes($CritThinkSkill);
		$Other_q8 =  stripslashes($Other_q8);

		$Salaries_benefits = mysqli_real_escape_string($con,$Salaries_benefits);
		$Career_challenge =  mysqli_real_escape_string($con,$Career_challenge);
		$Related_to_special_skills = mysqli_real_escape_string($con,$Related_to_special_skills);
		$Proximity_to_residence =  mysqli_real_escape_string($con,$Proximity_to_residence);
		$Other_q2 =  mysqli_real_escape_string($con,$Other_q2);
		$FJ_RankCleric =  mysqli_real_escape_string($con,$FJ_RankCleric);
		$CPJ_RankCleric = mysqli_real_escape_string($con,$CPJ_RankCleric);
		$FJ_ProTecSup =  mysqli_real_escape_string($con,$FJ_ProTecSup);
		$CPJ_ProTecSup =  mysqli_real_escape_string($con,$CPJ_ProTecSup);
		$FJ_Magex =  mysqli_real_escape_string($con,$FJ_Magex);
		$CPJ_Magex = mysqli_real_escape_string($con,$CPJ_Magex);
		$FJ_SelfEmp =  mysqli_real_escape_string($con,$FJ_SelfEmp);
		$CPJ_SelfEmp =  mysqli_real_escape_string($con,$CPJ_SelfEmp);
		$Below5k = mysqli_real_escape_string($con,$Below5k);
		$k5lessthan10k =  mysqli_real_escape_string($con,$k5lessthan10k);
		$k10lessthan15k =  mysqli_real_escape_string($con,$k10lessthan15k);
		$k15lessthan20k =  mysqli_real_escape_string($con,$k15lessthan20k);
		$k20lessthan25k =  mysqli_real_escape_string($con,$k20lessthan25k);
		$k25andabove =  mysqli_real_escape_string($con,$k25andabove);
		$pre_emp = mysqli_real_escape_string($con,$pre_emp);
		$pre_stat = mysqli_real_escape_string($con,$pre_stat);
	 	$Communication_skills =  mysqli_real_escape_string($con,$Communication_skills);
		$HumRelSkills =  mysqli_real_escape_string($con,$HumRelSkills);
		$EntreSkill =  mysqli_real_escape_string($con,$EntreSkill);
		$ProbsolbSkill =  mysqli_real_escape_string($con,$ProbsolbSkill);
		$CritThinkSkill =  mysqli_real_escape_string($con,$CritThinkSkill);
		$Other_q8 =  mysqli_real_escape_string($con,$Other_q8);

		
		if ($Salaries_benefits == 'yes') {
			$q2_sql = "INSERT INTO survey_question2(`survey_qID`, `survey_row1`, `survey_col1`,`survey_formID`) ";
			$q2_sql.= "VALUES (NULL, '1', '$Salaries_benefits','$last_id')";
			mysqli_query($con,$q2_sql);
		}
		else
		{
			$q2_sql = "INSERT INTO survey_question2(`survey_qID`, `survey_row1`, `survey_col1`,`survey_formID`) ";
			$q2_sql.= "VALUES (NULL, '1', 'no','$last_id')";
			mysqli_query($con,$q2_sql);
			
		}
		if ($Career_challenge == 'yes') {
			$q2_sql = "INSERT INTO survey_question2(`survey_qID`, `survey_row1`, `survey_col1`,`survey_formID`) ";
			$q2_sql.= "VALUES (NULL, '2', '$Career_challenge','$last_id')";
			mysqli_query($con,$q2_sql);
		}
		else
		{
			$q2_sql = "INSERT INTO survey_question2(`survey_qID`, `survey_row1`, `survey_col1`,`survey_formID`) ";
			$q2_sql.= "VALUES (NULL, '2', 'no','$last_id')";
			mysqli_query($con,$q2_sql);
			
		}
		if ($Related_to_special_skills == 'yes') {
			$q2_sql = "INSERT INTO survey_question2(`survey_qID`, `survey_row1`, `survey_col1`,`survey_formID`) ";
			$q2_sql.= "VALUES (NULL, '3', '$Related_to_special_skills','$last_id')";
			mysqli_query($con,$q2_sql);
		}
		else
		{
			$q2_sql = "INSERT INTO survey_question2(`survey_qID`, `survey_row1`, `survey_col1`,`survey_formID`) ";
			$q2_sql.= "VALUES (NULL, '3', 'no','$last_id')";
			mysqli_query($con,$q2_sql);
			
		}
		if ($Proximity_to_residence == 'yes') {
			$q2_sql = "INSERT INTO survey_question2(`survey_qID`, `survey_row1`, `survey_col1`,`survey_formID`) ";
			$q2_sql.= "VALUES (NULL, '4', '$Proximity_to_residence','$last_id')";
			mysqli_query($con,$q2_sql);
		}
		else
		{
			$q2_sql = "INSERT INTO survey_question2(`survey_qID`, `survey_row1`, `survey_col1`,`survey_formID`) ";
			$q2_sql.= "VALUES (NULL, '4', 'no','$last_id')";
			mysqli_query($con,$q2_sql);
			
		}
		
			$q2_sql = "INSERT INTO survey_question2(`survey_qID`, `survey_row1`, `survey_col1`,`survey_formID`) ";
			$q2_sql.= "VALUES (NULL, '5', '$Other_q2','$last_id')";
			mysqli_query($con,$q2_sql);
		
		

		

			$q3_sql = "INSERT INTO survey_question3 (`survey_qID`, `row`, `col1`, `col2`,`survey_formID`) ";
			$q3_sql.= "VALUES (NULL, '1', '$FJ_RankCleric','$CPJ_RankCleric','$last_id')";
			mysqli_query($con,$q3_sql);
			$q3_sql = "INSERT INTO survey_question3 (`survey_qID`, `row`, `col1`, `col2`,`survey_formID`) ";
			$q3_sql.= "VALUES (NULL, '2', '$FJ_ProTecSup','$CPJ_ProTecSup','$last_id')";
			mysqli_query($con,$q3_sql);
			$q3_sql = "INSERT INTO survey_question3 (`survey_qID`, `row`, `col1`, `col2`,`survey_formID`) ";
			$q3_sql.= "VALUES (NULL, '3', '$FJ_Magex','$CPJ_Magex','$last_id')";
			mysqli_query($con,$q3_sql);
			$q3_sql = "INSERT INTO survey_question3 (`survey_qID`, `row`, `col1`, `col2`,`survey_formID`) ";
			$q3_sql.= "VALUES (NULL, '4', '$FJ_SelfEmp','$CPJ_SelfEmp','$last_id')";
			mysqli_query($con,$q3_sql);

		
		$q4_sql = "INSERT INTO survey_question4 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
		$q4_sql.= "VALUES (NULL, '1', '$Below5k','$last_id')";
		mysqli_query($con,$q4_sql);
		$q4_sql = "INSERT INTO survey_question4 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
		$q4_sql.= "VALUES (NULL, '2', '$k5lessthan10k','$last_id')";
		mysqli_query($con,$q4_sql);
		$q4_sql = "INSERT INTO survey_question4 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
		$q4_sql.= "VALUES (NULL, '3', '$k10lessthan15k','$last_id')";
		mysqli_query($con,$q4_sql);
		$q4_sql = "INSERT INTO survey_question4 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
		$q4_sql.= "VALUES (NULL, '4', '$k15lessthan20k','$last_id')";
		mysqli_query($con,$q4_sql);
		$q4_sql = "INSERT INTO survey_question4 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
		$q4_sql.= "VALUES (NULL, '5', '$k20lessthan25k','$last_id')";
		mysqli_query($con,$q4_sql);
		$q4_sql = "INSERT INTO survey_question4 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
		$q4_sql.= "VALUES (NULL, '6', '$k25andabove','$last_id')";
		mysqli_query($con,$q4_sql);
		$q5_sql = "INSERT INTO survey_question5 (`survey_qID`, `ans`,`survey_formID`) ";
		$q5_sql.= "VALUES (NULL, '$pre_emp','$last_id')";
		mysqli_query($con,$q5_sql);
		$q6_sql = "INSERT INTO survey_question6 (`survey_qID`, `ans`,`survey_formID`,`job`) ";
		$q6_sql.= "VALUES (NULL, '$pre_stat','$last_id','$job')";
		mysqli_query($con,$q6_sql);

		

		if (!empty($Communication_skills) || !empty($HumRelSkills)  || !empty($EntreSkill) || !empty($ProbsolbSkill) || !empty($CritThinkSkill) || !empty($Other_q8)) {
				$q7_sql = "INSERT INTO survey_question7 (`survey_qID`, `survey_ans`,`survey_formID`) ";
				$q7_sql.= "VALUES (NULL, '1','$last_id')";
				mysqli_query($con,$q7_sql);

			 	$q8_sql = "INSERT INTO survey_question8 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
				$q8_sql.= "VALUES (NULL, '1', '$Communication_skills','$last_id')";
				mysqli_query($con,$q8_sql);
				$q8_sql = "INSERT INTO survey_question8 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
				$q8_sql.= "VALUES (NULL, '2', '$HumRelSkills','$last_id')";
				mysqli_query($con,$q8_sql);
				$q8_sql = "INSERT INTO survey_question8 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
				$q8_sql.= "VALUES (NULL, '3', '$EntreSkill','$last_id')";
				mysqli_query($con,$q8_sql);
				$q8_sql = "INSERT INTO survey_question8 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
				$q8_sql.= "VALUES (NULL, '4', '$ProbsolbSkill','$last_id')";
				mysqli_query($con,$q8_sql);
				$q8_sql = "INSERT INTO survey_question8 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
				$q8_sql.= "VALUES (NULL, '5', '$CritThinkSkill','$last_id')";
				mysqli_query($con,$q8_sql);
				$q8_sql = "INSERT INTO survey_question8 (`survey_qID`, `row1`, `col1`,`survey_formID`) ";
				$q8_sql.= "VALUES (NULL, '6', '$Other_q8','$last_id')";
				mysqli_query($con,$q8_sql);
				

		}
		// all data filled on question 8 is all empty  
		if (empty($Communication_skills) && empty($HumRelSkills)  && empty($EntreSkill) && empty($ProbsolbSkill) && empty($CritThinkSkill) && empty($Other_q8)) 
		{
			$q7_sql = "INSERT INTO survey_question7 (`survey_qID`, `survey_ans`,`survey_formID`) ";
				$q7_sql.= "VALUES (NULL, '0','$last_id')";
				mysqli_query($con,$q7_sql);
		}
		echo "<script>alert('Thank you for taking time out to fill out this questionnaire.');
			window.location='../surveyview.php';
		</script>";
		


    }

	

}
?>
