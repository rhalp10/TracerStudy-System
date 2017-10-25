
<?php 
include('session.php'); 
include('db.php');
$page = 'recordteacher';

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
                              <li class="breadcrumb-item active"> Record Teacher Detail</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                            <div class="box col-sm-5">
                             <header>
                              <h5>Add Teacher Record</h5>
                             </header>
                             <div class="body">
                                <form class="form-horizontal" method="POST" action="action/recordteacher_action.php">
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Username</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Username" placeholder="Username" class="form-control" name="teacher_username" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Password</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Password" class="form-control" name="teacher_Password" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Confirm Password</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Confirm Password" class="form-control" name="teacher_rePassword" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Faculty ID</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="ID Number" class="form-control" name="teacher_finumber" onkeyup="numberInputOnly(this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">First Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="First Name" class="form-control" name="teacher_firstname" onkeyup="letterInputOnly(this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4" >Middle Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Middle Name" class="form-control" name="teacher_middlename" onkeyup="letterInputOnly(this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Last Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Last Name" class="form-control" name="teacher_lastname" onkeyup="letterInputOnly(this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Address</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Address" class="form-control" name="teacher_adress">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Department</label>

                                    <div class="col-lg-8">
                                    <?php 
                                    $query_dep = mysqli_query($con,"SELECT * FROM `cvsu_department`");
                                    ?>
                                        <select class="form-control" name="teacher_adress_department">
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
                                
                                <!-- /.form-group -->
                                <input class="btn btn-success" type="submit" name="submit_recordteacher" value="Submit">
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                  <?php 
                                  $query_teacher_detail = mysqli_query($con,"SELECT * FROM user_teacher_detail");
                                  while ($result_teacher_detail = mysqli_fetch_array($query_teacher_detail)) 
                                    {
                                        $teacher_ID = $result_teacher_detail['teacher_ID'];
                                    ?>
                                    <tr>
                                        <td><?php echo $result_teacher_detail['teacher_fName']." ".$result_teacher_detail['teacher_mName']." ".$result_teacher_detail['teacher_lName']; ?></td>
                                        <td class="text-center"><?php 
                                        $teacher_department = $result_teacher_detail['teacher_department'] ;
                                        $dep_qry = mysqli_query($con,"SELECT * FROM `cvsu_department` WHERE `department_ID` = '$teacher_department'");
                                        $dep_result = mysqli_fetch_array($dep_qry);
                                        echo $dep_result['department_name'];
                                        ?></td>
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
