

   <div class="panel panel-default panel_defaul_custom">
      <div class="panel-heading">Latest Notification</div>
      <div class="panel_body_custom">
       
<?php 
$user_notif_qry = mysqli_query($con,"SELECT * FROM `user_notification` WHERE notif_receiverID = $login_id LIMIT 25");
while ($user_notif_sql = mysqli_fetch_array($user_notif_qry))
{
    $notif_typeID = $user_notif_sql['notif_typeID'];
  $notif_userID = $user_notif_sql['notif_userID'];
  $notif_topicID = $user_notif_sql['notif_topicID'];
  $notif_date = $user_notif_sql['notif_date'];
  $notif_receiverID = $user_notif_sql['notif_receiverID'];
  $notif_state = $user_notif_sql['notif_state'];
  $notif_typeID = stripslashes($notif_typeID);
  $notif_userID = stripslashes($notif_userID);
  $notif_topicID = stripslashes($notif_topicID);
  $notif_date = stripslashes($notif_date);
  $notif_receiverID = stripslashes($notif_receiverID);
  $notif_state = stripslashes($notif_state);
  $notif_typeID = mysqli_real_escape_string($con,$notif_typeID);
  $notif_userID = mysqli_real_escape_string($con,$notif_userID);
  $notif_topicID = mysqli_real_escape_string($con,$notif_topicID);
  $notif_date = mysqli_real_escape_string($con,$notif_date);
  $notif_receiverID = mysqli_real_escape_string($con,$notif_receiverID);
  $notif_state = mysqli_real_escape_string($con,$notif_state);
  //select notification type
  $notif_type_query =  mysqli_query($con,"SELECT * FROM `user_notif_type` WHERE type_ID = $notif_typeID");  
  $notif_type_sql = mysqli_fetch_array($notif_type_query);
  $type_Name = $notif_type_sql['type_Name'];
  $type_Name = stripslashes($type_Name);
  $type_Name = mysqli_real_escape_string($con,$type_Name);


  
  $notif_sender_qry =  mysqli_query($con,"SELECT user_level FROM `user_account` WHERE user_ID = $notif_userID");
  $notif_sender_sql = mysqli_fetch_array($notif_sender_qry);
  
  if ($notif_sender_sql['user_level'] == '1') {
    $user_type = 'student';
  }
  else if ($notif_sender_sql['user_level']  == '2'){
    $user_type = 'teacher';
  }
  else if ($notif_sender_sql['user_level']  == '3'){
    $user_type = 'admin';
  }
  else
  {
    $user_type = '';
  }
  $query_postowner = mysqli_query($con,"SELECT ".$user_type."_img, ".$user_type."_fName,".$user_type."_mName,".$user_type."_lName FROM `user_".$user_type."_detail` WHERE `".$user_type."_userID` = '".$notif_userID."'");
  $res_postowner = mysqli_fetch_array($query_postowner);
  $userimg = $res_postowner[$user_type.'_img'];
  $fname = $res_postowner[$user_type.'_fName'];
  $mname = $res_postowner[$user_type.'_mName'];
  $lname = $res_postowner[$user_type.'_lName'];

  $notif_state_qry = mysqli_query($con,"SELECT status_Desc FROM `user_notif_state` WHERE status_ID = $notif_state");
  $notif_state_sql = mysqli_fetch_array($notif_state_qry);
  $status_Desc = $notif_state_sql['status_Desc'];
  $hash_topic = password_hash($notif_topicID , PASSWORD_DEFAULT);
  $post_qry = mysqli_query($con,"SELECT post_title FROM `forum_topic` WHERE topic_ID = $notif_topicID");
  $post_sql = mysqli_fetch_array($post_qry);
  $post_title = $post_sql['post_title'];

  ?>
        <!-- msg unread-->
        <div class="col-sm-12 panel_item_custom" onclick="myFunction(this)">
            <a class="user-link col-sm-3" href="" >
                <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/profile_img/<?php echo $userimg?>">
            </a>
            <div class="col-sm-9">
                <div class="col-sm-12"><?php echo $fname." ".$mname." ".$lname ?></div>
                <div class="col-sm-12"><?php echo $type_Name." on your"?></div>
                <div class="col-sm-11 panel_item_word_custom"><a href="forum_view.php?post_ID=<?php echo $hash_topic; ?>"><?php echo $post_title ?></a></div>

                <div class="col-sm-12"><?php echo date( "M jS, Y", strtotime( $notif_date)). "<strong> at </strong>".date( 'h:i A', strtotime($notif_date));?></div>
            </div>
        </div>
        <!-- msg unread end-->
         
    



  <?php
//   echo darren $type_Name on franz POST
  //
  //href = "forum_view.php?post_ID=$hash_topic"



}

?>
         
      </div>
      <div class="panel-footer text-center panel_footer_custom"><a href="">See All</a></div>
    </div>


