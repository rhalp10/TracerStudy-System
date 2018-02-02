<?php 
	$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
	if (isset($_POST['Submit'])) {
		echo $teacherID = $_REQUEST['teacherID'];
		// Defining post variable names 
		echo $teacher_tfinumber = $_POST['teacher_tfinumber'];
		echo $teacher_firstname = $_POST['teacher_firstname'];
		$teacher_middlename = $_POST['teacher_middlename'];
		$teacher_lastname = $_POST['teacher_lastname'];
		$teacher_gender = $_POST['teacher_gender'];
		$teacher_bday = $_POST['teacher_bday'];
		$teacher_adress = $_POST['teacher_adress'];
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

		$teacher_tfinumber = mysqli_real_escape_string($con,$teacher_tfinumber);
		$teacher_firstname = mysqli_real_escape_string($con,$teacher_firstname);
		$teacher_middlename = mysqli_real_escape_string($con,$teacher_middlename);
		$teacher_lastname = mysqli_real_escape_string($con,$teacher_lastname);
		$teacher_adress = mysqli_real_escape_string($con,$teacher_adress);
		$teacher_gender = mysqli_real_escape_string($con,$teacher_gender);
		$teacher_bday = mysqli_real_escape_string($con,$teacher_bday);
		$teacher_department = mysqli_real_escape_string($con,$teacher_department);

if (empty($teacher_tfinumber) || empty($teacher_firstname)|| empty($teacher_middlename)|| empty($teacher_lastname)|| empty($teacher_adress)|| empty($teacher_year_grad)|| empty($teacher_year_admission)|| empty($teacher_department)) {
	if (empty($teacher_tfinumber) ) {
		echo "<script>alert('Empty teacher_tfinumber !');
												window.location='../recordteacher.php';
											</script>";
	}
	if (empty($teacher_firstname)) {
		echo "<script>alert('Empty teacher_firstname !');
												window.location='../recordteacher.php';
											</script>";
	}
	if (empty($teacher_middlename)) {
		echo "<script>alert('Empty teacher_middlename !');
												window.location='../recordteacher.php';
											</script>";
	}
	if (empty($teacher_lastname)) {
		echo "<script>alert('Empty teacher_lastname !');
												window.location='../recordteacher.php';
											</script>";
	}
	if (empty($teacher_adress)) {
		echo "<script>alert('Empty teacher_adress !');
												window.location='../recordteacher.php';
											</script>";
	}
	if (empty($teacher_department)) {
		echo "<script>alert('Empty teacher_department !');
												window.location='../recordteacher.php';
											</script>";
	}
}
else{
		//insert query
		$sql = "UPDATE `user_teacher_detail` SET  teacher_facultyID = '$teacher_tfinumber', teacher_fName = '$teacher_firstname', teacher_mName = '$teacher_middlename', teacher_lName = '$teacher_lastname', teacher_address = '$teacher_adress',  teacher_department = '$teacher_department'";

		$sql.= "  WHERE `user_teacher_detail`.`teacher_ID` = $teacherID;";
		$res = mysqli_query($con,$sql);
		
		echo "<script>alert('Successfully Update!');
												window.location='../recordteacher.php';
											</script>";
}
	
	}
?>