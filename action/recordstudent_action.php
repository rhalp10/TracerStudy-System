<?php  
	$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
	if (isset($_POST['submit_recordstudent'])) {

		// Defining post variable names 
		$student_sinumber = $_POST['student_sinumber'];
		$student_firstname = $_POST['student_firstname'];
		$student_middlename = $_POST['student_middlename'];
		$student_lastname = $_POST['student_lastname'];
		$student_dob = $_POST['student_dob'];
		$student_contact = $_POST['student_contact'];
		$student_gender = $_POST['student_gender'];
		$student_civilStat = $_POST['student_civil'];
		$student_adress = $_POST['student_adress'];
		$student_department = $_POST['student_department'];
		$student_year_grad = $_POST['student_year_grad'];
		$student_year_admission = $_POST['student_year_admission'];

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
			//insert query
			

		
				$sql = "INSERT INTO `user_student_detail` (
				`student_ID`,
				 `student_userID`,
				  `student_img`,
				   `student_IDNumber`,
				    `student_fName`,
				     `student_mName`,
				      `student_lName`,
				       `student_address`,
				        `student_civilStat`,
				         `student_dob`,
				          `student_gender`,
				           `student_contact`,
				            `student_admission`,
				             `student_year_grad`,
				              `student_department`,
				               `student_status`,
				                `student_secretquestion`,
				                 `student_secretanswer`) 

				VALUES (
				NULL,
				 '0',
				  'temp.gif',
				   '$student_sinumber',
				    '$student_firstname' ,
				     '$student_middlename' ,
				      '$student_lastname',
				       '$student_adress' ,
				        '$student_civilStat',
				         '$student_dob',
				          '$student_gender',
				          '$student_contact' ,
				            '$student_year_admission',
				             '$student_year_grad',
				              '$student_department',
				               'unregister',
				                NULL,
				                 NULL);";
				$res = mysqli_query($con,$sql);
				$last_id = mysqli_insert_id($con);
				$chk = "UPDATE `user_student_detail` 
						SET `student_IDNumber` = '$student_sinumber' WHERE `user_student_detail`.`student_ID` = $last_id";
				
				echo "<script>alert('Successfully Update!');
																	window.location='../recordstudent.php';
																</script>";
		}
				
				
		
	
}
?>