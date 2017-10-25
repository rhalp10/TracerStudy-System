<?php 
// $json = $_REQUEST['result'];
// $survey_result	 = json_decode($json);
// access name of $survey object
// JavaScript: value

// echo $survey_result->Region_of_Origin .'<br/>';
// echo $survey_result->Location_of_Residence .'<br/>';
// $survey_result->Educ_Dec_only ;
// $survey_result->Pro_Exa_pass ;
// $survey_result->Reason_pusue_degree ;



// columns{  Degree_Specialization
//   College_or_University
//   Year_Graduate
//   Honors_Awards_Received
// }


// foreach ($survey_result->Educ_Dec_only) {
//     echo $survey_result->Educ_Dec_only['Degree_Specialization'];
//     echo $survey_result->Educ_Dec_only['College_or_University'];
//     echo $survey_result->Educ_Dec_only['Year_Graduate'];
//     echo $survey_result->Educ_Dec_only['Honors_Awards_Received'];
// }

// $json = <<<JSON
// {
//     "title":"A Title Here",
//     "images":[
//         {
//             "coverType":"fanart",
//             "url":"some_random_file_here.jpg"
//         },
//         {
//             "coverType":"banner",
//             "url":"another_random_file_here.jpg"
//         },
//         {
//             "coverType":"poster",
//             "url":"yet_another_random_file_here.jpg"
//         }
//     ]
// }
// JSON;
// print_r($json);
// $a=0;
// foreach ($survey_result->Educ_Dec_only as $data)
// {
	//each
		// echo "index of array".$a++.'<br/>';
  //       echo 'Degree_Specialization: ' .$data->Degree_Specialization .'<br/>';
  //       echo 'College_or_University: ' .$data->College_or_University .'<br/>';
  //       echo 'Honors_Awards_Received: ' .$data->Honors_Awards_Received .'<br/>';
    //add query
// }
// $a=0;
// foreach ($survey_result->Pro_Exa_pass as $data)
// {
	//each
		// echo "index of array".$a++.'<br/>';
  //       echo 'Degree_Specialization: ' .$data->Name_of_Examination .'<br/>';
  //       echo 'College_or_University: ' .$data->Date_Taken .'<br/>';
  //       echo 'Honors_Awards_Received: ' .$data->Rating .'<br/>';
    	//add query
// }
// foreach ($survey_result->Pro_Exa_pass as $data)
// {
	//each
		// echo "index of array".$a++.'<br/>';
  //       echo 'Degree_Specialization: ' .$data->Name_of_Examination .'<br/>';
  //       echo 'College_or_University: ' .$data->Date_Taken .'<br/>';
  //       echo 'Honors_Awards_Received: ' .$data->Rating .'<br/>';
    	//add query
// }
ini_set('display_errors', 1);
ini_set('error_reporting', E_ERROR);
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
//requested owner id
$ownerID = $_REQUEST['ownerID'];
$ownerID = stripcslashes($ownerID);
$ownerID = mysqli_escape_string($con,$ownerID);

if (isset($_POST['submit-survey'])) {
	$sql = mysqli_query($con,"SELECT survey_maxattemp as maxattemp FROM `survey_result` WHERE survey_ownerID = '2';");
	$attemp = mysqli_fetch_array($sql);

	if ($attemp['maxattemp'] != 0 ) 
	{
	for ($i=1; $i <15; $i++) { 
			
			
			if ($_POST['U_AB_BS'.$i]) {
				$U_AB_BS = $_POST['U_AB_BS'.$i];
				$U_AB_BS = stripcslashes($U_AB_BS);
				$U_AB_BS = mysqli_escape_string($con,$U_AB_BS);
			echo  $U_AB_BS."<br>";
			}
			else
			{
				echo "empty<br>";
			}
			if ($_POST['G_MS_MA_PHD'.$i]) {
				$G_MS_MA_PHD = $_POST['G_MS_MA_PHD'.$i];
				$G_MS_MA_PHD = stripcslashes($G_MS_MA_PHD);
				$G_MS_MA_PHD = mysqli_escape_string($con,$G_MS_MA_PHD);
				echo  $G_MS_MA_PHD ."<br>";
			}
			else
			{
				echo "empty<br>";
			}
			echo $i."<br>";
			if ($i+1 == 15) {
				if ($_POST['Other_q2']) {
					$Other_q2 = $_POST['Other_q2'];
					$Other_q2 = stripcslashes($Other_q2);
					$Other_q2 = mysqli_escape_string($con,$Other_q2);
					echo $Other_q2."<br>";
					$sql_q1 = "INSERT INTO `survey_question1` (`survey_qID`, `survey_ownerID`, `row`, `col1`, `col2`) ";
					$sql_q1 .= " VALUES (NULL, '', '15', 'other', '$Other_q2') ";

				}
				else
				{

				echo "empty_other<br>";
			
				}
			}
			$sql_q1 = "INSERT INTO `survey_question1` (`survey_qID`, `survey_ownerID`, `row`, `col1`, `col2`) ";
			$sql_q1 .= " VALUES (NULL, '', '$i', '$U_AB_B', '$G_MS_MA_PHD')";
			

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
	 	$Communication_skills = $_POST['Communication_skills'];//1
		$HumRelSkills = $_POST['HumRelSkills'];//2
		$EntreSkill = $_POST['EntreSkill'];//3
		$ProbsolbSkill = $_POST['ProbsolbSkill'];//4
		$CritThinkSkill = $_POST['CritThinkSkill'];//5
		$Other_q6 = $_POST['Other_q6'];//6
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
		$Below5k =  stripslashes($SalariBelow5kes_benefits);
		$k5lessthan10k =  stripslashes($k5lessthan10k);
		$k10lessthan15k =  stripslashes($k10lessthan15k);
		$k15lessthan20k =  stripslashes($k15lessthan20k);
		$k20lessthan25k =  stripslashes($k20lessthan25k);
		$k25andabove =  stripslashes($k25andabove);
	 	$Communication_skills =  stripslashes($Communication_skills);
		$HumRelSkills =  stripslashes($HumRelSkills);
		$EntreSkill =  stripslashes($EntreSkill);
		$ProbsolbSkill =  stripslashes($ProbsolbSkill);
		$CritThinkSkill =  stripslashes($CritThinkSkill);
		$Other_q6 =  stripslashes($Other_q6);

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
	 	$Communication_skills =  mysqli_real_escape_string($con,$Communication_skills);
		$HumRelSkills =  mysqli_real_escape_string($con,$HumRelSkills);
		$EntreSkill =  mysqli_real_escape_string($con,$EntreSkill);
		$ProbsolbSkill =  mysqli_real_escape_string($con,$ProbsolbSkill);
		$CritThinkSkill =  mysqli_real_escape_string($con,$CritThinkSkill);
		$Other_q6 =  mysqli_real_escape_string($con,$Other_q6);

		echo "QUESTION NO.2<br>";
		
		if ($Salaries_benefits == 'yes') {
			echo  $Salaries_benefits."<br>";
		}
		else
		{
			echo "NO<br>";
		}
		if ($Career_challenge == 'yes') {
			echo  $Career_challenge."<br>";
		}
		else
		{
			echo "NO<br>";
		}
		if ($Related_to_special_skills == 'yes') {
			echo  $Related_to_special_skills."<br>";
		}
		else
		{
			echo "NO<br>";
		}
		if ($Proximity_to_residence == 'yes') {
			echo  $Proximity_to_residence."<br>";
		}
		else
		{
			echo "NO<br>";
		}
		if (!empty($Other_q2)) {
			echo  $Other_q2."<br>";
		}
		else
		{
			echo "empty_other<br>";
		}

		echo "QUESTION NO.3<br>";
		
		
		if ($FJ_RankCleric == '1') {
			echo  $FJ_RankCleric."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($CPJ_RankCleric == '1') {
			echo  $CPJ_RankCleric."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($FJ_ProTecSup == '1') {
			echo  $FJ_ProTecSup."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($CPJ_ProTecSup == '1') {
			echo  $CPJ_RankCleric."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($FJ_Magex == '1') {
			echo  $FJ_Magex."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($CPJ_Magex == '1') {
			echo  $CPJ_Magex."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($FJ_SelfEmp == '1') {
			echo  $FJ_SelfEmp."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($CPJ_SelfEmp == '1') {
			echo  $CPJ_SelfEmp."<br>";
		}
		else
		{
			echo "empty<br>";
		}

		echo "QUESTION NO.4: <br>";
		if ($Below5k == '1') {
			echo  $Below5k."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($k5lessthan10k == '1') {
				echo $k5lessthan10k."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($k10lessthan15k == '1') {
			echo  $k10lessthan15k."<br>";
		}
		else
		{
			echo "empty<br>";
			
		}
		if ($k15lessthan20k == '1') {
			echo  $k15lessthan20k."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($k20lessthan25k == '1') {
			echo  $k20lessthan25k."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($k25andabove == '1') {
			echo  $k25andabove."<br>";
		}
		else
		{
			echo "empty<br>";
		}

if (!empty($Communication_skills) || !empty($HumRelSkills)  || !empty($EntreSkill) || !empty($ProbsolbSkill) || !empty($CritThinkSkill) || !empty($Other_q6)) {
			 echo "QUESTION NO.5: <br>";
			 echo "YES <br>";
			 echo "QUESTION NO.6: <br>";
		if ($Communication_skills  == '1') {
			# code...
		}
		else
		{
			echo "empty<br>";
		}
		if ($Communication_skills  == '1') {
			
			echo $Communication_skills."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($HumRelSkills  == '1') {
			echo $HumRelSkills."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($EntreSkill  == '1') {
			echo $EntreSkill."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($ProbsolbSkill  == '1') {
			echo $ProbsolbSkill."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		if ($Other_q6  == '1') {
			echo $Other_q6."<br>";
		}
		else
		{
			echo "empty<br>";
		}
		}
		
		
		// if already perform
		//SELECT survey_maxattemp as maxattemp FROM survey_result WHERE WHERE survey_ownerID = '$ownerID;
		//$update_maxattemp = attemp['data'];
		// $update_maxattemp -= 1;
		//UPDATE `survey_result` SET `survey_maxattemp` = '$update_maxattemp' WHERE survey_ownerID = '$ownerID';
	}
	else
	{
		
	  	echo "<script>alert('Exceed the maximum attemp!');
	      window.location='../index.php';
	    </script>";
	}
	

}





?>
