<?php 
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
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
	      }  
	      
	}


	
	$sql="INSERT INTO `forum_comment` (comment_ID, comment_topicID, comment_userID, comment_content, comment_date)";
	$sql.=" VALUES (NULL, '$verified_id', '$owner', '$comment', CURRENT_TIMESTAMP)";
	$result = mysqli_query($con,$sql);

	echo "<script>alert('Successfully Comment');
						window.location='../forum_view.php?post_ID=$topicID';
					</script>";

	
}
echo "sdasd";
?>