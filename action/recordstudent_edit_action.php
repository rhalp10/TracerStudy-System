<?php 
	$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
	if (isset($_POST['Submit'])) {
		$studentID = $_REQUEST['studentID'];
		// Defining post variable names 
		echo $student_sinumber = $_POST['student_sinumber'];
		echo $student_firstname = $_POST['student_firstname'];
		echo $student_middlename = $_POST['student_middlename'];
		echo $student_lastname = $_POST['student_lastname'];
		echo $student_adress = $_POST['student_adress'];
		echo $student_year_grad = $_POST['student_year_grad'];
		echo $student_year_admission = $_POST['student_year_admission'];
		echo $student_department = $_POST['student_department'];
		echo $student_civil = $_POST['student_civil'];
		echo $student_contact = $_POST['student_contact'];
		// To protect MySQL injection for Security purpose
		$student_sinumber = stripslashes($student_sinumber);
		$student_firstname = stripslashes($student_firstname);
		$student_middlename = stripslashes($student_middlename);
		$student_lastname = stripslashes($student_lastname);
		$student_adress = stripslashes($student_adress);
		$student_year_grad = stripslashes($student_year_grad);
		$student_year_admission = stripslashes($student_year_admission);
		$student_department = stripslashes($student_department);
		$student_contact = stripslashes($student_contact);
		$student_civil = stripslashes($student_civil);

		$student_sinumber = mysqli_real_escape_string($con,$student_sinumber);
		$student_firstname = mysqli_real_escape_string($con,$student_firstname);
		$student_middlename = mysqli_real_escape_string($con,$student_middlename);
		$student_lastname = mysqli_real_escape_string($con,$student_lastname);
		$student_adress = mysqli_real_escape_string($con,$student_adress);
		$student_year_grad = mysqli_real_escape_string($con,$student_year_grad);
		$student_year_admission = mysqli_real_escape_string($con,$student_year_admission);
		$student_department = mysqli_real_escape_string($con,$student_department);
		$student_contact = mysqli_real_escape_string($con,$student_contact);
		$student_civil = mysqli_real_escape_string($con,$student_civil);

if (empty($student_sinumber) || empty($student_firstname)|| empty($student_middlename)|| empty($student_lastname)|| empty($student_adress)|| empty($student_year_grad)|| empty($student_year_admission)|| empty($student_department)) {
	if (empty($student_sinumber) ) {
		echo "<script>alert('Empty student_sinumber !');
												window.location='../recordstudent.php';
											</script>";
	}
	if (empty($student_firstname)) {
		echo "<script>alert('Empty student_firstname !');
												window.location='../recordstudent.php';
											</script>";
	}
	if (empty($student_middlename)) {
		echo "<script>alert('Empty student_middlename !');
												window.location='../recordstudent.php';
											</script>";
	}
	if (empty($student_lastname)) {
		echo "<script>alert('Empty student_lastname !');
												window.location='../recordstudent.php';
											</script>";
	}
	if (empty($student_adress)) {
		echo "<script>alert('Empty student_adress !');
												window.location='../recordstudent.php';
											</script>";
	}
	if (empty($student_year_grad)) {
		echo "<script>alert('Empty student_year_grad !');
												window.location='../recordstudent.php';
											</script>";
	}
	if (empty($student_year_admission)) {
		echo "<script>alert('Empty student_year_admission !');
												window.location='../recordstudent.php';
											</script>";
	}
	if (empty($student_department)) {
		echo "<script>alert('Empty student_department !');
												window.location='../recordstudent.php';
											</script>";
	}
}
else{
		


		$chk = "UPDATE `user_student_detail` 
				SET `student_IDNumber` = '$student_sinumber' WHERE `user_student_detail`.`student_ID` = $studentID";
		
		if ($chk = mysqli_query($con,$chk)){

			

			//insert query
			$sql = "UPDATE `user_student_detail` SET  student_IDNumber = '$student_sinumber', student_fName = '$student_firstname', student_mName = '$student_middlename', student_lName = '$student_lastname', student_address = '$student_adress', student_admission = '$student_year_admission', student_year_grad = '$student_year_grad', student_department = '$student_department',student_contact = $student_contact, student_civilStat = '$student_civil'";

			$sql.= "  WHERE `user_student_detail`.`student_ID` = $studentID;";
			$res = mysqli_query($con,$sql);
			
			echo "<script>alert('Successfully Update!');
													window.location='../recordstudent.php';
												</script>";
			
			
		}
		else{
			echo "<script>alert('Faculty Id Must be unique!');
															window.location='../recordstudent.php';
														</script>";
		}
}
	
	}
?>