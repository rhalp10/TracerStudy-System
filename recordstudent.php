
<?php 
include('session.php'); 
include('db.php');
$page = 'recordstudent';

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
                              <li class="breadcrumb-item active"> Record Student Detail</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                            <div class="box col-sm-5">
                             <header>
                              <h5>Add Student Record</h5>
                             </header>
                             <div class="body">
                                <form class="form-horizontal" method="POST" action="action/recordstudent_action.php">
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">ID Number</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="ID Number" class="form-control" name="student_sinumber" onkeyup="numberInputOnly(this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">First Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="First Name" class="form-control" name="student_firstname" onkeyup="letterInputOnly(this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4" >Middle Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Middle Name" class="form-control" name="student_middlename" onkeyup="letterInputOnly(this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Last Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Last Name" class="form-control" name="student_lastname" onkeyup="letterInputOnly(this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Address</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Address" class="form-control" name="student_adress">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Department</label>

                                    <div class="col-lg-8">
                                    <?php 
                                    $query_dep = mysqli_query($con,"SELECT * FROM `cvsu_department`");
                                    ?>
                                        <select class="form-control" name="student_department">
                                        <?php
                                        while ($res_dep = mysqli_fetch_array($query_dep)) {
                                        
                                        ?>
                                            <option value="<?php echo $res_dep['department_acronym'] ?>"><?php echo $res_dep['department_name'];?></option>
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
                                        <input type="date" class="form-control" name="student_year_admission">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                                      </span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Year Graduate</label>

                                    <div class="col-lg-8">
                                    <div class="input-group date" id="">
                                        <input type="date" class="form-control" name="student_year_grad">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
                                      </span>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <input class="btn btn-success" type="submit" name="submit_recordstudent" value="Submit">
                            </form>
                             </div>
                            </div>
                            <div class="box col-sm-7">
                             <header>
                              <h5>List</h5>
                             </header>
                             <div class="body">
                                <table id="myData"  class="table table-bordered table-advance table-hover  dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Year Admitted</th>
                                        <th>Year graduated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                  <?php 
                                  $query_student_detail = mysqli_query($con,"SELECT * FROM user_student_detail");
                                  while ($result_student_detail = mysqli_fetch_array($query_student_detail)) 
                                    {
                                        $student_ID = $result_student_detail['student_ID'];
                                    ?>
                                    <tr>
                                        <td><?php echo $result_student_detail['student_fName']." ".$result_student_detail['student_mName']." ".$result_student_detail['student_lName']; ?></td>
                                        <td class="text-center"><?php echo $result_student_detail['student_department'] ;?></td>
                                        <td class="text-center"><?php echo $result_student_detail['student_admission'] ;?></td>
                                        <td class="text-center"><?php echo $result_student_detail['student_year_grad'] ;?></td>
                                        <td class="text-center"><div class="btn-group">

                                          <button type="button" class="btn btn-metis-5" onclick="editFunction(<?php echo $student_ID ?>)"><i class="fa fa-edit"></i></button>
                                          <button type="button" class="btn btn-metis-1" onclick="deleteFunction(<?php echo $student_ID ?>)"><i class="fa fa-close"></i></button>
                                        </div></td>
                                    </tr>
                                    <!-- Modal -->
                                               
                                  <?php
                                    }
                                  ?>
<script type="text/javascript">

function editFunction(student_ID){
    var txt;
    var r = confirm("Are you sure do you want to edit ?");
    if (r == true) {
        
     window.location.href = "recordstudent.php?modal=" + student_ID;
    } else {
       
    }

}       

function deleteFunction(student_ID){
    var txt;
    var r = confirm("Are you sure do you want to delete?");
    if (r == true) {
        
     window.location.href = "recordstudent.php?modal=" + student_ID;
    } else {
       
    }

}       


</script>
            </div>
                                  </tbody>

                                </table>
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
        <script type="text/javascript">
        $(document).ready(function() {
        console.log("document ready!");

        var $sticky = $('.sticky');
        var $stickyrStopper = $('.sticky-stopper');
        if (!!$sticky.offset()) { // make sure ".sticky" element exists

            var generalSidebarHeight = $sticky.innerHeight();
            var stickyTop = $sticky.offset().top;
            var stickOffset = 0;
            var stickyStopperPosition = $stickyrStopper.offset().top;
            var stopPoint = stickyStopperPosition - generalSidebarHeight - stickOffset;
            var diff = stopPoint + stickOffset;

            $(window).scroll(function() { // scroll event
                var windowTop = $(window).scrollTop(); // returns number

                if (stopPoint < windowTop) {
                    $sticky.css({
                        position: 'absolute',
                        top: diff
                    });
                } else if (stickyTop < windowTop + stickOffset) {
                    $sticky.css({
                        position: 'fixed',
                        top: stickOffset
                    });
                } else {
                    $sticky.css({
                        position: 'absolute',
                        top: 'initial'
                    });
                }
            });

        }
        });
        </script>

</html>
