<?php 

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include('../session.php'); 
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
// requested post data id
$request_ID = $_REQUEST['request_ID'];
$request_ID = stripslashes($request_ID);
$request_ID = mysqli_real_escape_string($con,$request_ID);
/*FOR VERIFYING topic requested HASHED ID*/




$result = mysqli_query($con,"DELETE FROM `user_student_detail` WHERE `user_student_detail`.`student_ID` = '$request_ID'");
$result = mysqli_query($con,"DELETE  FROM `view_counter` WHERE `view_topicID` = '$request_ID'");
$result = mysqli_query($con,"DELETE  FROM `forum_comment` WHERE `comment_topicID` = '$request_ID'");
$result = mysqli_query($con,"DELETE  FROM `survey_result` WHERE `survey_ownerID` = '$request_ID'");

echo "<script>alert('Successfully Deleted');
						window.location='../studentrecord.php';
					</script>";

?>
