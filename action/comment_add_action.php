<?php 
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");

if (isset($_POST['submit'])) {
	$comment = $_POST['comment'];
	$owner = $_REQUEST['userID_comment'];
	$topicID = $_REQUEST['comment_topicID'];

	$comment = stripslashes($comment);
	$owner = stripslashes($owner);
	$topicID = stripslashes($topicID);
	$comment = mysqli_real_escape_string($con,$comment);
	$owner = mysqli_real_escape_string($con,$owner);
	$topicID = mysqli_real_escape_string($con,$topicID);
	$result = mysqli_query($con,"INSERT INTO `forum_comment` (`comment_ID`, `comment_topicID`, `comment_userID`, `comment_content`, `comment_date`) VALUES (NULL, '$topicID', '$owner', '$comment', CURRENT_TIMESTAMP)");

	echo "<script>alert('Successfully Comment');
						window.location='../index.php';
					</script>";

	
}
echo "sdasd";
?>