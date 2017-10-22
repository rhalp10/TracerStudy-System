<?php 

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");

if (isset($_POST['validate-answer'])) {
	$verify_user = $_REQUEST['user'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];
	$verify_user = stripslashes($verify_user);
	$password = stripslashes($password);
	$re_password = stripslashes($re_password);
	$verify_user = mysqli_real_escape_string($con,$verify_user);
	$password = mysqli_real_escape_string($con,$password);
	$re_password = mysqli_real_escape_string($con,$re_password);


	$ver = mysqli_query($con,"SELECT `user_ID`,`user_name` FROM `user_account` WHERE `user_name` = '$verify_user'");
	$ver_res = mysqli_fetch_array($ver);
	$user_ID = $ver_res['user_ID'];
	if ($password == $re_password) {
		$input = "$password";
		include('../md5.php');
		mysqli_query($con,"UPDATE `user_account` SET `user_password` = '$encrypted' WHERE `user_ID` = '$user_ID'");
		echo "<script>alert('Password successfully change!');
				window.location='../index.php';
			</script>";
	}

}
//if post is not submited and olny type on the url
else
{

  echo "<script>alert('!');
      window.location='../index.php';
    </script>";

}

?>