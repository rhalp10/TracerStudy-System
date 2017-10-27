
<?php 
include('session.php'); 
include('db.php');
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
                    <!--         <?php 
                           // $thread_participant  = "1 2 3 4 5 6";
                            // $pieces = explode(" ", $thread_participant);
                            // echo "<br>";
                            // $query_participant = "SELECT * FROM user_student_detail WHERE ";

                            // $numItems = count($pieces);
                            // $i = 0;
                            // foreach($pieces as $participant) {
                            //     $participant = trim($participant);
                            //     if(++$i === $numItems) {
                            //       $query_participant.="student_ID=".$participant;
                            //     }
                            //     else
                            //     {
                            //       $query_participant.="student_ID=".$participant." OR ";
                            //     }

                            // }
                            // echo $query_participant;
                           ?> 
                           <input id="car" type="text" list="colors" />
                            <datalist id="colors">
                                <option value="Red">
                                <option value="Green">
                                <option value="Yellow">
                            </datalist> -->
                           
                           d ko pa alam lalagay ko ahhahaha
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
