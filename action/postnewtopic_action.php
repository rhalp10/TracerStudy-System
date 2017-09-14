<?php 
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
$post_owner_id = $_REQUEST['userID'];

if (isset($_POST['submit_postnewtopic']))
 {
 	// Defining post variable names 
 	$post_title = $_POST['post_title'];
 	$post_content = $_POST['post_content'];
	// To protect MySQL injection for Security purpose
 	$post_title = stripslashes($post_title);
 	$post_content = stripslashes($post_content);
	$post_title = mysqli_real_escape_string($con,$post_title);
	$post_content = mysqli_real_escape_string($con,$post_content);

	//insert query for add new topic 
 	$res = mysqli_query($con,"INSERT INTO `forum_topic` (post_title, post_owner_id, post_date, post_content, post_status) VALUES ('$post_title', '$post_owner_id', CURRENT_TIMESTAMP, '$post_content', 'UNPIN')");
	// geting the last insert created account
	$last_id = mysqli_insert_id($con);
	// insert view counter
 	$res1 = mysqli_query($con,"INSERT INTO `view_counter` (view_ID, view_topicID, view_count)  VALUES (NULL, '$last_id', '0')");
 	$post_ID  = password_hash($last_id, PASSWORD_DEFAULT); 
 	echo "<script>alert('Successfully Posted!');
												window.location='../forum_view.php?post_ID=$post_ID';
											</script>";
 }

?>