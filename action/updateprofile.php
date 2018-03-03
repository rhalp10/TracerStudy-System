<?php 
include('../session.php'); 
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
if ($login_level == '1') {
	$user_type = "student";
}
if ($login_level == '2') {
	$user_type = "teacher";
}
if ($login_level == '3') {
	$user_type = "admin";
}
if (isset($_POST['update_picture'])) {
	# code...update_picture
}
else if (isset($_POST['update_name'])) {
	# code...update_name
	$update_fname = $_POST['update_fname'];
	$update_mname = $_POST['update_mname'];
	$update_lname = $_POST['update_lname'];
	$update_fname = stripslashes($update_fname);
	$update_mname = stripslashes($update_mname);
	$update_lname = stripslashes($update_lname);
	$update_fname = mysqli_real_escape_string($con,$update_fname);
	$update_mname = mysqli_real_escape_string($con,$update_mname);
	$update_lname = mysqli_real_escape_string($con,$update_lname);
	$sql = "UPDATE `user_".$user_type."_detail` SET `".$user_type."_fName` = '$update_fname',`".$user_type."_mName` = '$update_mname',`".$user_type."_lName` = '$update_lname' WHERE `".$user_type."_userID` = '$login_id'";
	mysqli_query($con,$sql);

	// echo "<script>alert('successfully Update!');
	// 			window.location='../profile.php';
	// 		</script>";
}

else if (isset($_POST['update_gender'])) {
	# code...update_gender
	$selected_gender = $_POST['selected_gender'];
	$selected_gender = stripslashes($selected_gender);
	$selected_gender = mysqli_real_escape_string($con,$selected_gender);
	$sql = "UPDATE `user_".$user_type."_detail` SET `".$user_type."_gender` = '$selected_gender' WHERE `".$user_type."_userID` = '$login_id'";
	mysqli_query($con,$sql);
	
	// echo "<script>alert('successfully Update!');
	// 			window.location='../profile.php';
	// 		</script>";
}
else if (isset($_POST['update_password'])) {
	# code...update_password
	$new_password = $_POST['new_password'];
	$new_repassword = $_POST['new_repassword'];
	$new_password = stripslashes($new_password);
	$new_repassword = stripslashes($new_repassword);
	$new_password = mysqli_real_escape_string($con,$new_password);
	$new_repassword = mysqli_real_escape_string($con,$new_repassword);

	if (empty($new_password) || empty($new_repassword)) 
	{
		// echo "<script>alert('Empty!');
		// 		window.location='../index.php';
		// 	</script>";
	}
	else if ($new_password == $new_repassword) {
		$input = "$new_password";
		include('../md5.php');
		mysqli_query($con,"UPDATE `user_account` SET `user_password` = '$encrypted' WHERE `user_ID` = '$login_id'");
		// echo "<script>alert('Password successfully change!');
		// 		window.location='../index.php';
		// 	</script>";
	}
	else
	{
		echo "<script>alert('Password not match!');
				window.location='../index.php';
			</script>";
	}
}
else if (isset($_POST['update_address'])) {
	# code...update_address
	$new_address = $_POST['new_address'];
	$new_address = stripslashes($new_address);
	$new_address = mysqli_real_escape_string($con,$new_address);
	$sql = "UPDATE `user_".$user_type."_detail` SET `".$user_type."_address` = '$new_address' WHERE `".$user_type."_userID` = '$login_id'";
	mysqli_query($con,$sql);
	
	// echo "<script>alert('successfully Update!');
	// 			window.location='../profile.php';
	// 		</script>";
}
else if (isset($_POST['update_cstatus'])) {
	# code...update_cstatus
	$selected_cstatus = $_POST['selected_cstatus'];
	$selected_cstatus = stripslashes($selected_cstatus);
	$selected_cstatus = mysqli_real_escape_string($con,$selected_cstatus);
	$sql = "UPDATE `user_".$user_type."_detail` SET `".$user_type."_civilStat` = '$selected_cstatus' WHERE `".$user_type."_userID` = '$login_id'";
	mysqli_query($con,$sql);
	
	// echo "<script>alert('successfully Update!');
	// 			window.location='../profile.php';
	// 		</script>";
}
else if (isset($_POST['update_bday'])) {
	# code...update_bday
	$new_bday = $_POST['new_bday'];
	$new_bday = stripslashes($new_bday);
	$new_bday = mysqli_real_escape_string($con,$new_bday);
	$sql = "UPDATE `user_".$user_type."_detail` SET `".$user_type."_dob` = '$new_bday' WHERE `".$user_type."_userID` = '$login_id'";
	mysqli_query($con,$sql);
	
	// echo "<script>alert('successfully Update!');
	// 			window.location='../profile.php';
	// 		</script>";
}
else if (isset($_POST['update_contact'])) {
	# code...update_contact
	$new_contact = $_POST['new_contact'];
	$new_contact = stripslashes($new_contact);
	$new_contact = mysqli_real_escape_string($con,$new_contact);
	$sql = "UPDATE `user_".$user_type."_detail` SET `".$user_type."_contact` = '$new_contact' WHERE `".$user_type."_userID` = '$login_id'";
	mysqli_query($con,$sql);
	
	// echo "<script>alert('successfully Update!');
	// 			window.location='../profile.php';
	// 		</script>";
}
else if (isset($_POST['update_squestion'])) {
	# code... update_squestion
	$new_squestion = $_POST['new_squestion'];
	$new_sanswer = $_POST['new_sanswer'];
	$new_squestion = stripslashes($new_squestion);
	$new_sanswer = stripslashes($new_sanswer);
	$new_squestion = mysqli_real_escape_string($con,$new_squestion);
	$new_sanswer = mysqli_real_escape_string($con,$new_sanswer);
	$sql = "UPDATE `user_".$user_type."_detail` SET `".$user_type."_secretquestion` = '$new_squestion',`".$user_type."_secretanswer` = '$new_sanswer' WHERE `".$user_type."_userID` = '$login_id'";
	mysqli_query($con,$sql);
	// echo "<script>alert('successfully Update!');
	// 			window.location='../profile.php';
	// 		</script>";

}

else
{
  // echo "<script>alert('!');
  //     window.location='../index.php';
  //   </script>";
}
?>