
<?php 
include('session.php');
include('db.php');
$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'alumni';
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
{}

?>
<!DOCTYPE html>
<html>  
  <head>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
    <title></title>
  </head>
        <body class="menu-affix">
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
                    elseif($login_level == '3')
                    {
                      include('sidebar_admin.php');
                    }
                    else
                    {}
                    ?>                    
                      <!-- /#left -->
                <div id="content">
                    <div class="outer">
                        <header class="head">
                            <div class="main-bar">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                              <li class="breadcrumb-item active"> Alumni</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">

                           <div class="box">
                             <ul class="nav nav-tabs">
                              <?PHP 
                              $student_sql = mysqli_query($con,"SELECT YEAR(usd.student_year_grad) as student_year_grad,cd.department_ID ,cd.department_name FROM `user_student_detail` usd
                              INNER JOIN cvsu_department cd ON usd.student_department = cd.department_ID WHERE usd.student_ID = $login_id");
                              $student_d = mysqli_fetch_array($student_sql);
                              $s_department_ID = $student_d['department_ID'];
                              $s_student_year_grad =$student_d['student_year_grad']; 
                              $dep =mysqli_query($con,"SELECT * FROM `cvsu_department`"); 
                              while ($data = mysqli_fetch_array($dep)) {
                                
                                if ($data['department_ID'] == $s_department_ID) {
                                  
                                  ?><li class="active"><a data-toggle="tab" href="#<?php echo  $data['department_ID'] ?>"><?php echo $data['department_name']; ?></a></li><?php
                                }
                                else{
                                  ?><li><a data-toggle="tab" href="#<?php echo  $data['department_ID'] ?>"><?php echo  $data['department_name'] ?></a></li>
                                  <?php
                                }
                              }
                              ?>
                              </ul>

                              <div class="tab-content">

                              <?php 
                              $dep =mysqli_query($con,"SELECT * FROM `cvsu_department`"); 
                              while ($data = mysqli_fetch_array($dep)) {
                                
                                if ($data['department_ID'] == $s_department_ID) {
                                  
                                  ?>
                                <div id="<?php echo $data['department_ID']; ?>" class="tab-pane fade in active">
                                    <center><h3><?php echo $data['department_name']." Batch of ".$s_student_year_grad; ?></h3></center>
                                  <p>
                                    <table class="table table-bordered table-advance table-hover">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Student Number</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $s = mysqli_query($con,"SELECT student_fName,student_mName,student_lName,student_IDNumber FROM `user_student_detail` usd INNER JOIN cvsu_department cd ON usd.student_department = cd.department_ID WHERE department_ID = ".$data['department_ID']." AND student_year_grad LIKE '%$s_student_year_grad%'");
                                    $no = 0;
                                    while ($f_all = mysqli_fetch_array($s)) {
                                      $no+=$no+1;
                                     ?>
                                      <tr>
                                             <td><?php echo $no ?>. <?php echo   $f_all['student_fName']." ".$f_all['student_mName']." ".  $f_all['student_lName']?></td>
                                             <td><?php echo $f_all['student_IDNumber']?></td>
                                         </tr>
                                     <?php
                                    }
                                    ?>
                                      
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <th></th>
                                        <th></th>
                                      </tr>
                                    </tfoot>
                                    </table>
                                  </p>
                                </div>

                                  <?php
                                }
                                else{
                                  ?>  <div id="<?php echo $data['department_ID']; ?>" class="tab-pane fade">
                                    <center><h3><?php echo $data['department_name']." Batch of ".$s_student_year_grad;  ?></h3></center>
                                      <p>
                                    <table class="table table-bordered table-advance table-hover">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Student Number</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $s = mysqli_query($con,"SELECT student_fName,student_mName,student_lName,student_IDNumber FROM `user_student_detail` usd INNER JOIN cvsu_department cd ON usd.student_department = cd.department_ID WHERE department_ID = ".$data['department_ID']." AND student_year_grad LIKE '%$s_student_year_grad%'");
                                    $no = 0;
                                    while ($f_all = mysqli_fetch_array($s)) {
                                      $no+=$no+1;
                                     ?>
                                      <tr>
                                             <td><?php echo $no ?>. <?php echo   $f_all['student_fName']." ".$f_all['student_mName']." ".  $f_all['student_lName']?></td>
                                             <td><?php echo $f_all['student_IDNumber']?></td>
                                         </tr>
                                     <?php
                                    }
                                    ?>
                                      
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <th></th>
                                        <th></th>
                                      </tr>
                                    </tfoot>
                                    </table>
                                  </p>
                                </div>

                                  <?php
                                }
                              }
                              ?>


                              <!-- SELECT YEAR(usd.student_year_grad),cd.department_ID ,cd.department_name FROM `user_student_detail` usd
                              INNER JOIN cvsu_department cd ON usd.student_department = cd.department_ID WHERE usd.student_ID = 1


                              SELECT YEAR(usd.student_year_grad),cd.department_ID ,cd.department_name FROM `user_student_detail` usd
                              INNER JOIN cvsu_department cd ON usd.student_department = cd.department_ID 

                              SELECT YEAR(usd.student_year_grad),cd.department_ID ,cd.department_name,usd.student_fName FROM `user_student_detail` usd INNER JOIN cvsu_department cd ON usd.student_department = cd.department_ID WHERE department_ID = 1,2,3 -->


                              </div>


                              
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
