
<?php 
include('session.php'); 
include('db.php');

$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'dashboard';
$teacherID = $_REQUEST['teacherID'];
if ($login_level == '1')
{
    $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['teacher_img']; 
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
                              <li class="breadcrumb-item"><a href="recordteacher.php">Record teacher Detail</a></li>
                              <li class="breadcrumb-item active">Record teacher Detail Edit</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                         <div class="body" style="margin-top: 10px; margin-left: -45px;">
                            <?php 
                            $edit_qry = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE teacher_ID = '$teacherID'");
                            $edit_sql = mysqli_fetch_array($edit_qry);
                            $teacher_IDNumber = $edit_sql['teacher_facultyID'];
                            $teacher_img = $edit_sql['teacher_img'];
                            $teacher_fName = $edit_sql['teacher_fName'];
                            $teacher_mName = $edit_sql['teacher_mName'];
                            $teacher_lName = $edit_sql['teacher_lName'];
                            $teacher_gender = $edit_sql['teacher_gender'];
                            $teacher_department = $edit_sql['teacher_department'];
                            $teacher_civilStat = $edit_sql['teacher_civilStat'];
                            $teacher_contact = $edit_sql['teacher_contact'];
                            $teacher_dob = $edit_sql['teacher_dob'];
                            $teacher_address = $edit_sql['teacher_address'];
                            ?>
                                <form id="myform" class="form-horizontal" method="POST" action="action/recordteacher_edit_action.php?teacherID=<?php echo $teacherID?>">
                                

                                 <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4"></label>

                                    <div class="col-lg-8">
                                         <a class="user-link" href="#">
                                          <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/profile_img/<?php echo $teacher_img?>" style="width: 128px; height: 128px;">
                                      </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">ID Number</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="ID Number" disabled="" class="form-control" name="teacher_tfinumber" onkeyup="numberInputOnly(this);" required="" value="<?php echo $teacher_IDNumber;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">First Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="First Name" disabled="" class="form-control" name="teacher_firstname" onkeyup="letterInputOnly(this);" required=""  value="<?php echo $teacher_fName;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4" >Middle Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Middle Name" class="form-control" name="teacher_middlename" onkeyup="letterInputOnly(this);" required=""  value="<?php echo $teacher_mName;?>" maxlength="1" disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Last Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Last Name" class="form-control" name="teacher_lastname" onkeyup="letterInputOnly(this);" required=""  value="<?php echo $teacher_lName;?>" disabled="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Birthday</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1"  disabled="" class="form-control" name="teacher_bday" value="<?php echo $teacher_dob; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Gender</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="teacher_gender" disabled="">
                                            
                                            <option><?php echo $teacher_gender;?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Address</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Address" class="form-control" name="teacher_adress" required="" disabled="" value="<?php echo $teacher_address;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Contact</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1"  disabled="" class="form-control" name="teacher_bday" value="<?php echo $teacher_contact; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Civil Stat</label>
                                    <div class="col-lg-8">
                                     
                                       <?php 
                                       $mstat_q = mysqli_query($con,"SELECT marital_Name FROM `marital_status` WHERE ID = '$teacher_civilStat'");
                                       $mstat_q  = mysqli_fetch_array($mstat_q);
                                      
                                       ?>
                                        <input type="text" id="text1" placeholder="Marital" class="form-control" name="Department" required="" disabled="" value="<?php  echo $mstat_q['marital_Name'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Department</label>

                                    <div class="col-lg-8">
                                        <?php 
                                    $query_dep = mysqli_query($con,"SELECT * FROM `cvsu_department` WHERE `department_ID` = $teacher_department");
                                    ?>
                                        
                                        <?php
                                        $res_dep = mysqli_fetch_array($query_dep);
                                    
                                        ?>
                                            
                                        
                                        <input type="text" id="text1" placeholder="Department" class="form-control" name="Department" required="" disabled="" value="<?php echo $res_dep['department_name'];?>">
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
