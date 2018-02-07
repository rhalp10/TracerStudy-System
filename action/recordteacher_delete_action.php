<?php 
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
$teacherID = $_REQUEST['teacherID'];
$verfy_sql = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE teacher_ID = '$teacherID'");
$verfy_qry = mysqli_fetch_array($verfy_sql);
$teacher_userID = $verfy_qry['teacher_userID'];
if ($teacher_userID == 0) {
	mysqli_query($con,"DELETE FROM `user_teacher_detail` WHERE `teacher_ID` = '$teacherID'");
}
else
{
	mysqli_query($con,"DELETE FROM `user_teacher_detail` WHERE `teacher_ID` = '$teacherID'");
	mysqli_query($con,"DELETE FROM `user_account` WHERE `user_ID` = '$teacher_userID'");
}


echo "<script>alert('Successfully Deleted');
						window.location='../recordteacher.php';
					</script>";


?>