<?php 
	$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
	if (isset($_POST['submit_recordteacher'])) {

		// Defining post variable names 
		$teacher_username = $_POST['teacher_username'];
		$teacher_Password = $_POST['teacher_Password'];
		$teacher_rePassword = $_POST['teacher_rePassword'];
		$teacher_finumber = $_POST['teacher_finumber'];
		$teacher_firstname = $_POST['teacher_firstname'];
		$teacher_middlename = $_POST['teacher_middlename'];
		$teacher_lastname = $_POST['teacher_lastname'];
		$teacher_adress = $_POST['teacher_adress'];
		$teacher_department = $_POST['teacher_department'];
		// To protect MySQL injection for Security purpose
		$teacher_username = stripslashes($teacher_username);
		$teacher_Password = stripslashes($teacher_Password);
		$teacher_rePassword = stripslashes($teacher_rePassword);
		$teacher_finumber = stripslashes($teacher_finumber);
		$teacher_firstname = stripslashes($teacher_firstname);
		$teacher_middlename = stripslashes($teacher_middlename);
		$teacher_lastname = stripslashes($teacher_lastname);
		$teacher_adress = stripslashes($teacher_adress);
		$teacher_department = stripslashes($teacher_department);

		$teacher_username = mysqli_real_escape_string($con,$teacher_username);
		$teacher_Password = mysqli_real_escape_string($con,$teacher_Password);
		$teacher_rePassword = mysqli_real_escape_string($con,$teacher_rePassword);
		$teacher_finumber = mysqli_real_escape_string($con,$teacher_finumber);
		$teacher_firstname = mysqli_real_escape_string($con,$teacher_firstname);
		$teacher_middlename = mysqli_real_escape_string($con,$teacher_middlename);
		$teacher_lastname = mysqli_real_escape_string($con,$teacher_lastname);
		$teacher_adress = mysqli_real_escape_string($con,$teacher_adress);
		$teacher_department = mysqli_real_escape_string($con,$teacher_department);

		//insert query
		$sql = "INSERT INTO `user_teacher_detail` (teacher_ID, teacher_userID, teacher_img, teacher_facultyID, teacher_fName, teacher_mName, teacher_lName, teacher_address,teacher_department, teacher_status) ";
		$sql.= " VALUES (NULL, '2', 'temp.gif', '$teacher_finumber', '$teacher_firstname', '$teacher_middlename', '$teacher_lastname', '$teacher_adress', '$teacher_department', 'register')";
		// geting the last insert created account
		$last_id = mysqli_insert_id($con);

		$res = mysqli_query($con,$sql);
		echo "<script>alert('Successfully Added!');
												window.location='../recordteacher.php';
											</script>";
		
	}
?>