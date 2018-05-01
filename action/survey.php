<?php 
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
session_start(); 
if (isset($_POST['add-survey'])) {

	$surveyname = $_POST['surveyname'];
	mysqli_query($con,"INSERT INTO `survey` (`survey_ID`, `survey_name`, `survey_date`, `visibility`) VALUES (NULL, '$surveyname', CURRENT_TIMESTAMP, 0);");
	echo "<script>alert('Succesfully Add Survey !');
		window.location='../survey_mng.php';
	</script>";
}
if (isset($_POST['update-surveyName'])) {
	$id = $_POST['ID'];
	$surveyname = $_POST['surveyname'];
	mysqli_query($con,"UPDATE `survey` SET `survey_name` = '$surveyname' WHERE `survey`.`survey_ID` = $id;");
	echo "<script>alert('Succesfully Updated !');
		window.location='../try1.php';
	</script>";
}
if (isset($_POST['delete-survey'])) {
	$id = $_POST['id'];
	mysqli_query($con,"DELETE FROM `survey` WHERE `survey`.`survey_ID` = $id;");
	echo "<script>alert('Succesfully Delete Survey !');
		window.location='../survey_mng.php';
	</script>";
}
if (isset($_POST['set-survey'])) {
	$id = $_POST['id'];
	mysqli_query($con,"UPDATE `survey` SET `visibility` = '0'");
	mysqli_query($con,"UPDATE `survey` SET `visibility` = '1' WHERE `survey`.`survey_ID` = $id;
	");
	echo "<script>alert('Succesfully Set Survey !');
		window.location='../survey_mng.php';
	</script>";
}
if (isset($_POST['add-question'])) {
	$s_ID = $_POST['s_ID'];
	$question = $_POST['question'];
	$options = $_POST['options'];
	$sql = mysqli_query($con,"INSERT INTO `survey_questionnaire` (`survey_qID`, `survey_ID`, `question`) VALUES (NULL, '$s_ID', '$question');");
	$last_id = mysqli_insert_id($con);
	foreach ($options as $key => $value) {
		if ($value == "" or $value == NULL) {
			mysqli_query($con,"INSERT INTO `survey_anweroptions` (`survey_aID`, `survey_qID`, `answer`) VALUES (NULL, '$last_id', '$value');");
		}
		else{
			mysqli_query($con,"INSERT INTO `survey_anweroptions` (`survey_aID`, `survey_qID`, `answer`) VALUES (NULL, '$last_id', '$value');");
		}
		
	}
	echo "<script>alert('Succesfully Add Question!');
		window.location='../survey_mng.php';
	</script>";

}
if (isset($_POST['submit-survey'])) {
	$answer = $_POST['answer'];
	$opID = $_POST['opID'];
	$option = $_POST['optionz'];
	$i = 0;
	
	$u_ID =  $_SESSION['login_id'];
	$zxc = array();
	$zxc1 = array();
	foreach ($opID as $key => $value) {
		if ($value == "" || $value == null) {
			
		}
		else{
		$zxc[] =  $value;
		}

	}
	$o = 0;
	foreach ($option as $key => $value) {
		if ($value == "" || $value == null) {
			
		}
		else{
		$zxc1[] =  $value;
		}

	}
	foreach ($answer as $key => $value) {
		if ($value == "other") {

			$option =  $zxc1[$i];
			$opID =  $zxc[$o];
			mysqli_query($con,"INSERT INTO `survey_answer_other` (`ao_ID`, `survey_aString`,`survey_aID`, `user_ID`) VALUES (NULL, '$option', '$opID', '$u_ID');");
			
			
		$o++;
		}
		else{
			mysqli_query($con,"INSERT INTO `survey_answer` (`a_ID`, `survey_aID`, `user_ID`) VALUES (NULL, $value, '$u_ID');");
		}
		$i++;
	}
	echo "<script>alert('Thank you for taking your time!');
		window.location='../survey.php';
	</script>";
}
?>