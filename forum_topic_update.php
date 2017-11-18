 
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

                    <div id="right" class="onoffcanvas is-right is-fixed bg-light" aria-expanded=false>
                        <a class="onoffcanvas-toggler" href="#right" data-toggle=onoffcanvas aria-expanded=false></a>
                        <br>
                        <br>
                        <div class="well well-small dark">
                            <ul class="list-unstyled">
                                <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span></li>
                                <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span></li>
                                <li>Popularity <span class="dynamicbar pull-right">Loading..</span></li>
                                <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span></li>
                            </ul>
                        </div>
                        <!-- /.well well-small -->
                        <!-- .well well-small -->
                        <div class="well well-small dark">
                            <button class="btn btn-block">Default</button>
                            <button class="btn btn-primary btn-block">Primary</button>
                            <button class="btn btn-info btn-block">Info</button>
                            <button class="btn btn-success btn-block">Success</button>
                            <button class="btn btn-danger btn-block">Danger</button>
                            <button class="btn btn-warning btn-block">Warning</button>
                            <button class="btn btn-inverse btn-block">Inverse</button>
                            <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
                            <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
                            <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
                            <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
                            <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
                            <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
                        </div>
                        <!-- /.well well-small -->
                        <!-- .well well-small -->
                        <div class="well well-small dark">
                            <span>Default</span><span class="pull-right"><small>20%</small></span>
                        
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-info" style="width: 20%"></div>
                            </div>
                            <span>Success</span><span class="pull-right"><small>40%</small></span>
                        
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-success" style="width: 40%"></div>
                            </div>
                            <span>warning</span><span class="pull-right"><small>60%</small></span>
                        
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
                            </div>
                            <span>Danger</span><span class="pull-right"><small>80%</small></span>
                        
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /#right -->
            </div>
            <!-- /#wrap -->
            <?php include('footer.php');?>
            <!-- /#footer -->
            <?php include ('script.php');?>
        </body>

</html>
