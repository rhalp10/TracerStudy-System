<?php 
	$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
	if (isset($_POST['Submit'])) {
		 $teacherID = $_REQUEST['teacherID'];
		// Defining post variable names 
		 $teacher_tfinumber = $_POST['teacher_tfinumber'];
		 $teacher_firstname = $_POST['teacher_firstname'];
		 $teacher_middlename = $_POST['teacher_middlename'];
		 $teacher_lastname = $_POST['teacher_lastname'];
		 $teacher_gender = $_POST['teacher_gender'];
		 $teacher_bday = $_POST['teacher_bday'];
		 $teacher_contact = $_POST['teacher_contact'];
		 $teacher_adress = $_POST['teacher_adress'];
		 $teacher_civilStat = $_POST['teacher_civilStat'];
		 $teacher_department = $_POST['teacher_department'];
		// To protect MySQL injection for Security purpose
		$teacher_tfinumber = stripslashes($teacher_tfinumber);
		$teacher_firstname = stripslashes($teacher_firstname);
		$teacher_middlename = stripslashes($teacher_middlename);
		$teacher_lastname = stripslashes($teacher_lastname);
		$teacher_gender = stripslashes($teacher_gender);
		$teacher_bday = stripslashes($teacher_bday);
		$teacher_adress = stripslashes($teacher_adress);
		$teacher_department = stripslashes($teacher_department);
		$teacher_contact = stripslashes($teacher_contact);
		$teacher_civilStat = stripslashes($teacher_civilStat);

		$teacher_tfinumber = mysqli_real_escape_string($con,$teacher_tfinumber);
		$teacher_firstname = mysqli_real_escape_string($con,$teacher_firstname);
		$teacher_middlename = mysqli_real_escape_string($con,$teacher_middlename);
		$teacher_lastname = mysqli_real_escape_string($con,$teacher_lastname);
		$teacher_adress = mysqli_real_escape_string($con,$teacher_adress);
		$teacher_gender = mysqli_real_escape_string($con,$teacher_gender);
		$teacher_bday = mysqli_real_escape_string($con,$teacher_bday);
		$teacher_department = mysqli_real_escape_string($con,$teacher_department);
		$teacher_contact = mysqli_real_escape_string($con,$teacher_contact);
		$teacher_civilStat = mysqli_real_escape_string($con,$teacher_civilStat);


		$chk = "UPDATE `user_teacher_detail` 
				SET `teacher_facultyID` = '$teacher_tfinumber' WHERE `user_teacher_detail`.`teacher_ID` = $teacherID";
		$chk1 = mysqli_query($con,"SELECT teacher_facultyID FROM teacher_facultyID WHERE  teacher_facultyID = $teacher_tfinumber");
		$chk1 = mysqli_fetch_array($chk1);
		
		if ($chk = mysqli_query($con,$chk)){

			

			$sql = "UPDATE `user_teacher_detail` 
				SET 
				`teacher_facultyID` = '$teacher_tfinumber' ,
				`teacher_fName` = '$teacher_firstname' ,
				`teacher_mName` = '$teacher_middlename' ,
				`teacher_lName` = '$teacher_lastname' ,
				`teacher_gender` = '$teacher_gender' ,
				`teacher_dob` = '$teacher_bday' ,
				`teacher_contact` = '$teacher_contact' ,
				`teacher_address` = '$teacher_adress' ,
				`teacher_civilStat` = '' ,
				`teacher_department` = '$teacher_department' 
				";
					$sql.= "WHERE `user_teacher_detail`.`teacher_ID` = $teacherID";
					$res = mysqli_query($con,$sql);
					
					echo "<script>alert('Successfully Update!');
															window.location='../recordteacher.php';
														</script>";
			
			
		}
		else{
			echo "<script>alert('Faculty Id Must be unique!');
															window.location='../recordteacher.php';
														</script>";
		}
		
		
	
		
	}
?>