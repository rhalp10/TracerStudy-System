 
<?php 
include('session.php'); 
include('db.php');

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
$req_encypted_postID = $_REQUEST['req_encypted_postID'];
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
?>
<!DOCTYPE html>
<html>  
  <head>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
    <title></title>
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
                    <div class="outer">
                        <header class="head">
                            <div class="main-bar">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                              <li class="breadcrumb-item"><a href="forum.php">Forum</a></li>
                              <li class="breadcrumb-item active"> Update Posted Topic</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                             <div class="col-sm-12">
                              <form class="form-group" method="post" action="action/updatepost_action.php?post_ID=<?php echo $post_ID ;?>">
                              <br>
                              <input type="text" class="form-control" placeholder="Click here to set title" name="updatepost_title" value="<?php echo $post_title ?>">
                              <br>
                              <textarea id="ckeditor" class="ckeditor" placeholder="Type post content here" name="updatepost_content"><?php echo $post_content; ?></textarea>
                              <br>
                              <input class="btn btn-primary pull-right" type="submit" name="submit_updatetopic" value="Update Post">
                              <br><br>
                              </form>
                            </div>
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->
            </div>
            <!-- /#wrap -->
            <?php include('footer.php');?>
            <!-- /#footer -->
            <?php include ('script.php');?>
        </body>

</html>
