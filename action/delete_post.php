<?php 

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include('../session.php'); 
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
// requested post data id
$req_encypted_postID = $_REQUEST['req_encypted_postID'];
$req_encypted_postID = stripslashes($req_encypted_postID);
$req_encypted_postID = mysqli_real_escape_string($con,$req_encypted_postID);
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


$result = mysqli_query($con,"DELETE  FROM `forum_topic` WHERE `topic_ID` = '$verified_id'");
$result = mysqli_query($con,"DELETE  FROM `view_counter` WHERE `view_topicID` = '$verified_id'");
$result = mysqli_query($con,"DELETE  FROM `forum_comment` WHERE `comment_topicID` = '$verified_id'");
echo "<script>alert('Successfully Deleted');
						window.location='../forum.php';
					</script>";

?>
