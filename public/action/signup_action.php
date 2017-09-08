<?php 
	
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = mysql_connect("localhost", "root", "");
	// Selecting Database
	$db = mysql_select_db("tracerdata", $connection);
	if (isset($_POST['submit-signup_student']))
	{
		// Define $username and $password
		$student_number = $_POST['student_number'];
		$password = $_POST['password'];
		$re_password = $_POST['re_password'];
		// To protect MySQL injection for Security purpose
		$student_number = stripslashes($student_number);
		$password = stripslashes($password);
		$re_password = stripslashes($re_password);
		$student_number = mysql_real_escape_string($student_number);
		$password = mysql_real_escape_string($password);
		$re_password = mysql_real_escape_string($re_password);

 		//if password submit is equal the verify query perform
		if ($password == $re_password)
		{
			
			
		 	$sql ="SELECT * FROM";
		    $sql.=" `user_student_detail` WHERE `student_IDNumber` = '$student_number' ";
		    $result = mysql_query($sql) or die(mysql_error());
		    $res = mysql_fetch_array($result);
			$res['student_IDNumber'];
			// if student has record perform add query
			if ($student_number == $res['student_IDNumber'])  
			{
				// if account is not register perform register statement
				if ($res['student_status'] == 'unregister') {
		 			$input = "$password";
		 			include('../md5.php');
					$result = mysql_query("INSERT INTO `user_account` (user_level, user_name, user_password) VALUES ('1','$student_number','$encrypted')");
					// geting the last insert created account
					$last_id = mysql_query("SELECT LAST_INSERT_ID()");
					//update of the student info as register
					$result1 = mysql_query("UPDATE `user_student_detail` SET `student_status` = 'register' WHERE `student_userID` = '$last_id'");
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