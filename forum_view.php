
<?php 
include('session.php'); //for login session if you are not logged in you will go back in index.php
require('db.php');//database connection

$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'forum';

if ($login_level == '1')//for student access
{
    $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_userID` = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['student_img']; 
}
else if ($login_level == '2')//for teacher access
{
    $result = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_userID` = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['teacher_img']; 
}
else if ($login_level == '3')//for admin access
{
    $result = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_userID` = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['admin_img']; 
}
else
{
}

// requested post data id
$req_encypted_postID = $_REQUEST['post_ID'];
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
//selected data topic to be fetch
$query = mysqli_query($con,"SELECT * FROM `forum_topic` WHERE `topic_id` = '$verified_id'");
$res = mysqli_fetch_array($query);
  $post_ID = $res['topic_ID'];
  $post_title = $res['post_title'];
  $post_owner = $res['post_owner_id'];
  $post_date  = $res['post_date'];
  $post_content = $res['post_content'];
  $post_status = $res['post_status'];
//Counte view
mysqli_query($con,"UPDATE `view_counter` SET `view_count` = `view_count`+1 WHERE `view_topicID` = '$verified_id'");
$query_viewcount  = mysqli_query($con,"SELECT `view_count` FROM `view_counter`WHERE `view_topicID` = '$verified_id'");
$result_viewcount = mysqli_fetch_assoc($query_viewcount);
?>
<!DOCTYPE html>
<html>  
  <head>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
    <title><?php $post_title ;?></title>
  </head>
        <body class=" menu-affix">
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <?php include ('top_navbar.php');?>
                </div>
                <!-- /#top -->
                 <?php  
                    if ($login_level == '1')
                    {
                        include('sidebar_student.php');
                    }
                    if ($login_level == '2')
                    {
                        include('sidebar_teacher.php');
                    }
                    elseif ($login_level == '3')
                    {
                        include('sidebar_admin.php');
                    }
                    else
                    {
                    }
                    ?>    
                    <!-- /#left -->
                <div id="content">

                        <?php 
                        if (password_verify($post_ID, $req_encypted_postID)) 
                          {
                            include('forum_view_content.php');
                            
                          } 
                        else 
                          {
                            include('forum_view_notfound.php');
                          }
                        ?>

                </div>
                <!-- /#content -->

            </div>

            <!-- /#wrap -->
            <?php include('footer.php');?>
            <!-- /#footer -->
            <?php include ('script.php');?>

            <script>
$(document).ready(function(){
  
  $(document).on('click', '#getUser', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'getComment.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#dynamic-content').html('');    
      $('#dynamic-content').html(data); // load response 
      $('#modal-loader').hide();      // hide ajax loader 
    })
    .fail(function(){
      $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
    });
    
  });
  
});

</script>

        </body>

</html>
