<?php 
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include('../session.php'); 
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");

if (isset($_POST['submit-comment'])) {
	$comment = $_POST['comment'];
	$owner = $_REQUEST['userID_comment'];
	$topicID = $_REQUEST['comment_topicID'];
	$comment = stripslashes($comment);
	$owner = stripslashes($owner);
	$topicID = stripslashes($topicID);
	$comment = mysqli_real_escape_string($con,$comment);
	$owner = mysqli_real_escape_string($con,$owner);
	$topicID = mysqli_real_escape_string($con,$topicID);
	// requested post data id
	$req_encypted_postID = $topicID;
	/*FOR VERIFYING topic requested HASHED ID*/
	// selecting all data from database
	$query_verify_id = mysqli_query($con,"SELECT * FROM `forum_topic`");
	//while fetching all data
	while ($res_ver_id = mysqli_fetch_array($query_verify_id)) 
	{
	  //each topic id mush be save in temp variable of check_id
	  $check_id = $res_ver_id['topic_ID'];
	    //the requested hash checked original value if match then stored the verified value in verified_id
	    if (password_verify($check_id, $req_encypted_postID)) 
	      {
	      $verified_id = $check_id;//temporary value save to verified_id
	      $post_owner_id = $res_ver_id['post_owner_id'];
	      }  
	      
	}
	
	
	
	$sql="INSERT INTO `forum_comment` (comment_ID, comment_topicID, comment_userID, comment_content, comment_date)";
	$sql.=" VALUES (NULL, '$verified_id', '$owner', '$comment', CURRENT_TIMESTAMP)";
	$result = mysqli_query($con,$sql);
	if ($post_owner_id == $owner) {
		// "if same dont display notif";
	}
	else
	{
		$sql="INSERT INTO `user_notification` (`notif_ID`, `notif_typeID`, `notif_topicID`, `notif_userID`, `notif_receiverID`, `notif_date`, `notif_state`)";
		$sql.=" VALUES (NULL, '3', '$verified_id', '$owner', '$post_owner_id', CURRENT_TIMESTAMP, '0')";
		$result = mysqli_query($con,$sql);

	}

	echo "<script>alert('Successfully Comment');
						window.location='../forum_view.php?post_ID=$topicID';
					</script>";

	
}




?>