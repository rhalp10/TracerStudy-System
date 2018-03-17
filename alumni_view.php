
<?php 
include('session.php'); 
include('db.php');
$page = 'alumni';
$req_course = $_REQUEST['course'];
$req_year = $_REQUEST['year'];
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
                              <li class="breadcrumb-item"><a href="alumni.php">Dashboard</a></li>
                              <li class="breadcrumb-item "><a href="alumni.php"> Alumni</a></li>
                              <li class="breadcrumb-item active"> Alumni View</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                           <div class="col-sm-12">
                                <h2 class="text-center">
                                <?php 
                                if ($req_course == 1) {
                                  echo "Computer Science";
                                }
                                if ($req_course == 2) {
                                    
                                    echo "Information Technology";
                                }
                                if ($req_course == 3) {
                                    echo "Office Addministration";
                                }
                                ?>
                                </h2>
                               <h1 class="text-center">Batch of <?php echo $req_year?></h1>
                               <hr>
                               <a class="btn btn-info pull-right" href="assets/lib/FPDF/alumnibatchprint.php?course=<?php echo $req_course?>&year=<?php echo $req_year?>" target="_BLANK">PRINT</a>
                               <br><br>
                               <table class="table table-bordered table-advance table-hover ">
                                   <thead>
                                       <th>Names</th>
                                       <th>Student Number</th>
                                   </thead>
                                   <tbody>
                                   <?php 

                                   $query = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_department = $req_course AND student_year_grad LIKE '%$req_year%' ORDER BY `student_fName`  ASC");

                                    $no = 1;
                                  while ($data = mysqli_fetch_array($query)) {
                                    $data['student_fName']
                                  
                                   ?>
                                       <tr>
                                           <td><?php echo $no ?>. <?php echo   $data['student_fName']." ".$data['student_mName']." ".  $data['student_lName']?></td>
                                           <td><?php echo $data['student_IDNumber']?></td>
                                       </tr>
                                       <?php 
                                       $no = $no + 1;
                                       }
                                       ?>
                                   </tbody>
                                   <tfoot>
                                       <tr>
                                       <td></td>
                                       <td></td>
                                       </tr>
                                   </tfoot>
                               </table>
                           </div>
                           

                           
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
