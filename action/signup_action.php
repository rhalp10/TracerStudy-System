<?php 
	$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
	if (isset($_POST['submit-signup_student']))
	{
		// Define $username and $password
		$student_number = $_POST['student_number'];
		$password = $_POST['password'];
		$re_password = $_POST['re_password'];
		$secret_question = $_POST['secret_question'];
		$secret_answer = $_POST['secret_answer'];
		
		
		// To protect MySQL injection for Security purpose
		$student_number = stripslashes($student_number);
		$password = stripslashes($password);
		$re_password = stripslashes($re_password);
		$secret_question = stripslashes($secret_question);
		$secret_answer = stripslashes($secret_answer);
		$student_number = mysqli_real_escape_string($con,$student_number);
		$password = mysqli_real_escape_string($con,$password);
		$re_password = mysqli_real_escape_string($con,$re_password);
		$secret_question = mysqli_real_escape_string($con,$secret_question);
		$secret_answer = mysqli_real_escape_string($con,$secret_answer);

 		//if password submit is equal the verify query perform
		if ($password == $re_password)
		{
			
			
		 	$sql ="SELECT * FROM";
		    $sql.=" `user_student_detail` WHERE `student_IDNumber` = '$student_number' ";
		    $result = mysqli_query($con,$sql) or die(mysqli_error());
		    $res = mysqli_fetch_array($result);
			$res['student_IDNumber'];
			// if student has record perform add query
			if ($student_number == $res['student_IDNumber'])  
			{	
				// if account is not register perform register statement
				if ($res['student_status'] == 'unregister') {
		 			$input = "$password";
		 			include('../md5.php');
					$result = mysqli_query($con,"INSERT INTO `user_account` (user_level, user_name, user_password) VALUES ('1','$student_number','$encrypted')");
					// geting the last insert created account
					$last_id = mysqli_insert_id($con);
					//update of the student info as register
					$result1 = mysqli_query($con,"UPDATE `user_student_detail` SET `student_status` = 'register',`student_secretquestion` = '$secret_question',`student_secretanswer` = '$secret_answer',`student_userID` = '$last_id' WHERE `student_IDNumber` = '$student_number'");

					// add survey record default
					mysqli_query($con,"INSERT INTO `survey_maxcount` (`survey_id`, `survey_ownerID`, `survey_maxattemp`) VALUES (NULL, '$last_id', '2');");
								echo "<script>alert('Register Successfully !');
												window.location='../index.php';
											</script>";
				}
				else
				{
					echo "<script>alert('This account is already register!');
												window.location='../index.php';
											</script>";
				}
			}
			// if student has no record echo register
			else
			{
				echo "<script>alert('You are not allowed to register');
											window.location='../index.php';
										</script>";
			}
		}
		// if password not match echo notmatch!
		else
		{
			echo "<script>alert('Password Not match');
											window.location='../index.php';
										</script>";
		}
		
	}
	if (isset($POST['submit-signup_teacher'])) {
	}

	if (isset($POST['submit-signup_admin'])) {
	}
?>