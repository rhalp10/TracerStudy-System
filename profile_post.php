
<?php 
include('session.php'); 
include('db.php');
$page = 'forum';

if ($login_level == '1')
{
    $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['student_img']; 
}
else if ($login_level == '2')
{
    $result = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE teacher_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['teacher_img']; 
}
else if ($login_level == '3')
{
    $result = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE admin_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['admin_img']; 
}
else
{
}
?>


<!DOCTYPE html>
<html>  
  <head>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
    <title>Dashboard</title>
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
                    else if ($login_level == '2')
                    {
                        include('sidebar_teacher.php');
                    }
                    else if ($login_level == '3')
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
                              <li class="breadcrumb-item active"> Forum</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">

                            <h3>List Of Your Post</h3>
                            <table  id="alumniIT" class="table table-bordered table-advance table-hover  dataTable">
                                <thead>
                                <th></th>
                                </thead>
                                <tbody>
                                <?php 
                                $query = mysqli_query($con,"SELECT * FROM `forum_topic` WHERE `post_owner_id` = '$login_id' ");
                                while ($data = mysqli_fetch_array($query))
                                 {
                                    
                                     $query2 = mysqli_query($con,"SELECT `view_count` FROM `view_counter` WHERE `view_topicID` = ".$data['topic_ID']);
                                     $res2 = mysqli_fetch_assoc($query2);
                                ?>
                                <tr onclick="self.location.href='forum_view.php?post_ID=<?php echo password_hash($data['topic_ID'], PASSWORD_DEFAULT);?>'">
                                  <td class="forum-td" >
                                  <div class="forum-list-hover col-sm-1" >
                                  <i class="fa fa-comment"></i>
                                    </div>
                                    <div class="col-sm-6 forum-list-content">
                                   <strong><a href="forum_view.php?post_ID=<?php echo password_hash($res['topic_ID'], PASSWORD_DEFAULT);?>"><?php echo $data['post_title']; ?>
                                    </a></strong>
                                    <br>
                                    by <a href=""><?php 
                                    $post_owner = $login_id;
                                    if($query_postowner = mysqli_query($con,"SELECT student_fName,student_mName,student_lName FROM `user_student_detail` WHERE `student_userID` = '$post_owner'")) {
                                       $res_postowner = mysqli_fetch_assoc($query_postowner);
                                       echo $res_postowner['student_fName'].
                                       " ".$res_postowner['student_mName'].
                                       " ".$res_postowner['student_lName'];
                                    }
                                    if($query_postowner = mysqli_query($con,"SELECT teacher_fName,teacher_mName,teacher_lName FROM `user_teacher_detail` WHERE `teacher_userID` = '$post_owner'")) {
                                       $res_postowner = mysqli_fetch_assoc($query_postowner);
                                       echo $res_postowner['teacher_fName'].
                                       " ".$res_postowner['teacher_mName'].
                                       " ".$res_postowner['teacher_lName'];
                                    }
                                    if($query_postowner = mysqli_query($con,"SELECT admin_fName,admin_mName,admin_lName FROM `user_admin_detail` WHERE `admin_userID` = '$post_owner'")) {
                                       $res_postowner = mysqli_fetch_assoc($query_postowner);
                                       echo $res_postowner['admin_fName'].
                                       " ".$res_postowner['admin_mName'].
                                       " ".$res_postowner['admin_lName'];
                                    } ?></a>
                                    </div>
                                    <div class="col-sm-2 forum-list-content-stat">
                                    <?php echo $res2['view_count'] ;?> <i class="fa fa-eye"></i>
                                    <br>
                                    2 <i class="fa fa-comment"></i>
                                    </div>
                                    <div class="col-sm-3" style="background-color: #444444;color: white;"><br>&nbsp;
                                    </div>

                                    </td>
                                  </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                           
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->

                    <!-- /#right -->
            </div>

            <!-- /#wrap -->
            <?php include('footer.php');?>
            <!-- /#footer -->
            <?php include ('script.php');?>
        </body>

</html>
