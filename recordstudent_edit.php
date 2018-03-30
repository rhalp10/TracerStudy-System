
<?php 
include('session.php'); 
include('db.php');

$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'dashboard';
$studentID = $_REQUEST['studentID'];
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
                              <li class="breadcrumb-item"><a href="recordstudent.php">Record Student Detail</a></li>
                              <li class="breadcrumb-item active">Record Student Detail Edit</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                         <div class="body" style="margin-top: 10px; margin-left: -45px;">
                            <?php 
                            $edit_qry = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_ID = '$studentID'");
                            $edit_sql = mysqli_fetch_array($edit_qry);
                            $student_IDNumber = $edit_sql['student_IDNumber'];
                            $student_img = $edit_sql['student_img'];
                            $student_fName = $edit_sql['student_fName'];
                            $student_mName = $edit_sql['student_mName'];
                            $student_lName = $edit_sql['student_lName'];
                            $student_address = $edit_sql['student_address'];
                            $student_department = $edit_sql['student_department'];
                            $student_admission = $edit_sql['student_admission'];
                            $student_year_grad = $edit_sql['student_year_grad'];
                            $student_contact = $edit_sql['student_contact'];
                            ?>
                                
                                <form id="myform" class="form-horizontal" method="POST" action="action/recordstudent_edit_action.php?studentID=<?php echo $studentID?>">
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4"></label>

                                    <div class="col-lg-8">
                                         <a class="user-link" href="#">
                                          <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/profile_img/<?php echo $student_img?>" style="width: 128px; height: 128px;">
                                      </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">ID Number</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="ID Number" class="form-control" name="student_sinumber" onkeyup="numberInputOnly(this);" required="" value="<?php echo $student_IDNumber;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">First Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="First Name" class="form-control" name="student_firstname" onkeyup="letterInputOnly(this);" required=""  value="<?php echo $student_fName;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4" >Middle Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Middle Name" class="form-control" name="student_middlename" onkeyup="letterInputOnly(this);" required=""  value="<?php echo $student_mName;?>" maxlength="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Last Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Last Name" class="form-control" name="student_lastname" onkeyup="letterInputOnly(this);" required=""  value="<?php echo $student_lName;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Contact</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Contact" class="form-control" name="student_contact" onkeyup="numberInputOnly(this);" required="" value="<?php echo $student_contact;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Birthday</label>

                                    <div class="col-lg-8">
                                        <input type="date" id="text1" placeholder="Birthday" class="form-control" name="student_bday">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Gender</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="student_gender">
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Address</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Address" class="form-control" name="student_adress" required=""  value="<?php echo $student_address;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Civil Stat</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="student_civil">
                                            <?php 
                                            $mstat_q = mysqli_query($con,"SELECT * FROM `marital_status`");
                                            while ($mstat = mysqli_fetch_array($mstat_q)) {
                                               ?>
                                                <option value="<?php echo $mstat['ID']; ?>"><?php echo $mstat['marital_Name']; ?></option>
                                               <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Course</label>

                                    <div class="col-lg-8">
                                    <?php 
                                    $query_dep = mysqli_query($con,"SELECT * FROM `cvsu_course`");
                                    ?>
                                        <select class="form-control" name="student_department" required=""  value="<?php echo $student_address;?>">
                                        <?php
                                        while ($res_dep = mysqli_fetch_array($query_dep)) {
                                        
                                        ?>
                                            <option value="<?php echo $res_dep['course_ID'] ?>"><?php echo $res_dep['course_name'];?></option>
                                        <?php 
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Year Admission</label>

                                    <div class="col-lg-8">
                                    <div class="input-group date" id="">
                                        <input type="date" class="form-control" name="student_year_admission" required="" value="<?php echo $student_admission;?>">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                                      </span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Year Graduate</label>

                                    <div class="col-lg-8">
                                    <div class="input-group date" id="">
                                        <input type="date" class="form-control" name="student_year_grad" required=""  value="<?php echo $student_year_grad;?>">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                                      </span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4"></label>
                                    <div class="col-lg-8">
                                    <div class="input-group date btn-group" id="">
                                        <button type="Submit" class="btn btn-primary" name="Submit">Submit</button>
                                        <a class="btn btn-danger" href="recordstudent.php">Cancel</a>
                                      </span>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                               
                                <!-- Trigger the modal with a button -->
                                <div></div>
                                

                             
                            </form>
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
