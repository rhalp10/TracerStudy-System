<?php 
	$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
	if (isset($_POST['submit_recordstudent'])) {

		// Defining post variable names 
		$student_sinumber = $_POST['student_sinumber'];
		$student_firstname = $_POST['student_firstname'];
		$student_middlename = $_POST['student_middlename'];
		$student_lastname = $_POST['student_lastname'];
		$student_adress = $_POST['student_adress'];
		$student_year_grad = $_POST['student_year_grad'];
		$student_year_admission = $_POST['student_year_admission'];
		$student_department = $_POST['student_department'];
		// To protect MySQL injection for Security purpose
		$student_sinumber = stripslashes($student_sinumber);
		$student_firstname = stripslashes($student_firstname);
		$student_middlename = stripslashes($student_middlename);
		$student_lastname = stripslashes($student_lastname);
		$student_adress = stripslashes($student_adress);
		$student_year_grad = stripslashes($student_year_grad);
		$student_year_admission = stripslashes($student_year_admission);
		$student_department = stripslashes($student_department);

		$student_sinumber = mysqli_real_escape_string($con,$student_sinumber);
		$student_firstname = mysqli_real_escape_string($con,$student_firstname);
		$student_middlename = mysqli_real_escape_string($con,$student_middlename);
		$student_lastname = mysqli_real_escape_string($con,$student_lastname);
		$student_adress = mysqli_real_escape_string($con,$student_adress);
		$student_year_grad = mysqli_real_escape_string($con,$student_year_grad);
		$student_year_admission = mysqli_real_escape_string($con,$student_year_admission);
		$student_department = mysqli_real_escape_string($con,$student_department);

		//insert query
		$sql = "INSERT INTO `user_student_detail` (student_ID, student_userID, student_img, student_IDNumber, student_fName, student_mName, student_lName, student_address, student_admission, student_year_grad, student_department, student_status) ";
		$sql.= " VALUES (NULL, '0', 'temp.gif', '$student_sinumber', '$student_firstname', '$student_middlename', '$student_lastname', '$student_adress', '$student_year_grad', '$student_year_admission', '$student_department', 'unregister')";
		$res = mysqli_query($con,$sql);
		echo "<script>alert('Successfully Added!');
												window.location='../recordstudent.php';
											</script>";
	}
?>