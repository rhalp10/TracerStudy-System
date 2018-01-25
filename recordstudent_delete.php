
<?php 
include('session.php'); 
include('db.php');

$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'dashboard';

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

$studentID = $_REQUEST['studentID'];

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
                            <center><h1>DELETE</h1></center>
<center>
<div class="btn-group">
  <a href="action/recordstudent_delete_action.php?studentID=<?php echo $studentID;?>" class="btn btn-primary">Submit</a>
  <a href="recordstudent.php"  class="btn btn-danger" >Cancel</a>
</div>
</center>
<br><br>
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
