
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
    <title>Profile</title>
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
                         
                            <style type="text/css">
                        .bio-graph-heading {
    background: #263a4f;
    color: #fff;
    text-align: center;
    font-style: italic;
    padding: 40px 110px;
    font-size: 16px;
    font-weight: 300;
}
                          .bio-row {
    width: 50%;
    float: left;
    margin-bottom: 10px;
    padding: 0 15px;
}
                          .bio-row p span {
    width: 100px;
    display: inline-block;
}
@import "lesshat";

@distance:40px; /* distance between stacked modals*/

@modal-translate-z: -340px; /* The first modal translateZ value*/

.transform(@translateZ) {
  -webkit-transform: scale(0.8) rotateY(45deg) translateZ(@translateZ);
  -ms-transform: scale(0.8) rotateY(45deg) translateZ(@translateZ);
  -o-transform: scale(0.8) rotateY(45deg) translateZ(@translateZ);
  transform: scale(0.8) rotateY(45deg) translateZ(@translateZ);
}

.preserve-3d(){
  -webkit-transform-style:preserve-3d;
  -ms-transform-style:preserve-3d;
  -o-transform-style:preserve-3d;
  transform-style:preserve-3d;
}

.perspective(@perspective){
  -webkit-perspective:@perspective;
  -moz-perspective:@perspective;
  -ms-perspective:@perspective;
  -o-perspective:@perspective;
  perspective:@perspective;
}
.container{
  margin:5em auto;
}

.modal.in{
  .perspective(2000px);
  
  .modal-dialog{
    &.aside{
      .transform(@modal-translate-z);
      .preserve-3d();
      
      &.aside-1{
        .transform(calc(@modal-translate-z + @distance));
      }
      &.aside-2{
        .transform(calc(@modal-translate-z + (@distance * 2)));
      }
      &.aside-3{
        .transform(calc(@modal-translate-z + (@distance * 3)));
      }
      &.aside-4{
        .transform(calc(@modal-translate-z + (@distance * 4)));
      }   
      &.aside-5{
        .transform(calc(@modal-translate-z + (@distance * 5)));
      }
    }
  }
}

                        </style>
                          <div class="tab-content" style="
    border-width: 1px 1px 2px;
    border-style: solid;
    border-top: none;
    border-right-color: #ccc!important;
    border-bottom-color: #ccc!important;
    border-left-color: #ccc!important;">
                                  
                                  <div id="profile" class="tab-pane active" >
                                    <section class="panel">
                                      <div class="bio-graph-heading" >
                                              
                                      </div>
                                      <div class="panel-body bio-graph-info">
                                          <h1>Bio Graph
                              <a href="" class="pull-right btn btn-primary" data-toggle="modal" data-target="#test-modal">EDIT</a></h1>
                                          
                                          <div class="row">
                                              <div class="bio-row">
                                                <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/profile_img/<?php echo $res_sidebar[$userType.'_img'];?>">
                                              </div>
                                              <div class="bio-row"></div>
                                              <div class="bio-row">
                                                  <p><span>Full Name </span>: <?php echo $res_sidebar[$userType.'_fName']." ",$res_sidebar[$userType.'_fName']." ",$res_sidebar[$userType.'_lName'];?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Address </span>: <?php echo $res_sidebar[$userType.'_address'];?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Status</span>: <?php echo $res_sidebar[$userType.'_civilStat'];?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Gender </span>: <?php 
                                                  if ($res_sidebar[$userType.'_gender'] == "M" || $res_sidebar[$userType.'_gender'] == "m" ) {
                                                   echo "Male";
                                                  }
                                                  else
                                                  {
                                                    echo "Female";
                                                  }
                                                  
                                                  ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Mobile </span>: <?php echo $res_sidebar[$userType.'_contact'];?></p>
                                              </div>
                                               <?php 
                                                if ($userType == "student") {
                                                  ?>
                                                   <div class="bio-row">
                                                  <p><span>ID Number </span>: <?php echo $res_sidebar[$userType.'_IDNumber'];?></p>
                                              </div>
                                                  <?php
                                                  
                                                }
                                                ?>
                                                <?php 
                                                if ($userType == "student") 
                                                {
                                                  ?>
                                                   <div class="bio-row">
                                                  <p><span>Admission Date </span>: <?php echo $res_sidebar[$userType.'_admission'];?></p>
                                              </div>
                                                  <?php
                                                }
                                                ?>
                                                 <?php 
                                                if ($userType != "admin") 
                                                {
                                                   ?>
                                                   <div class="bio-row">
                                                 <?php 
                                                  if ($userType == "student") 
                                                  {
                                                    ?>
                                                     <p><span>Course </span>: 
                                                    <?php
                                                   echo $res_sidebar[$userType.'_department'];
                                                  }
                                                  else
                                                  {
                                                    ?>
                                                     <p><span>Department </span>: <?php
                                                     $department_ID  = $res_sidebar[$userType.'_department'];
                                                     $q = mysqli_query($con,"SELECT * FROm cvsu_department where department_ID ='$department_ID' ");
                                                     $res = mysqli_fetch_array($q);
                                                     echo $res['department_name'];
                                                  }

                                                  ?></p>
                                              </div>
                                                  <?php
                                                }
                                                ?>     
                                          </div>
                                      </div>
                                    </section>
                                  </div>




<div class="container">
  
<!-- Edit Modal -->
    <div class="modal fade" id="test-modal" data-modal-index="1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Edit Detail</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" id="editModal" action="action/update.php" name="editModal">
        <div class="form-group">
            <label class="control-label col-lg-4">Change Picture</label>
            <div class="col-lg-4">
                <a class="btn btn-default" data-toggle="modal" data-target="#modal-changepic">Update Picture</a>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">First Name</label>
            <div class="col-lg-4">
                <input type="text" class="validate[required] form-control" name="fname" id="req" value="<?php echo $res_sidebar[$userType.'_fName'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">Middle Name</label>
            <div class="col-lg-4">
                <input type="text" class="validate[required] form-control" name="mname" id="req" value="<?php echo $res_sidebar[$userType.'_mName'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">Last Name</label>
            <div class="col-lg-4">
                <input type="text" class="validate[required] form-control" name="lname" id="req" value="<?php echo $res_sidebar[$userType.'_lName'];?>">
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">Gender</label>
            <div class="col-lg-4">
                <select name="gender" id="sport" class="validate[required] form-control">
                    <option value="">Choose a gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">Change Password</label>
            <div class="col-lg-4">
                <a class="btn btn-default" data-toggle="modal" data-target="#modal-newpassword">Update Password</a>
            </div>

        </div>
         <div class="form-group">
            <label class="control-label col-lg-4">Address</label>
            <div class="col-lg-4">
                <input type="text" class="validate[required] form-control" name="lname" id="req" value="<?php echo $res_sidebar[$userType.'_lName'];?>">
            </div>

        </div>
         <div class="form-group">
            <label class="control-label col-lg-4">Civil Status</label>
            <div class="col-lg-4">
                <input type="text" class="validate[required] form-control" name="lname" id="req" value="<?php echo $res_sidebar[$userType.'_civilStat'];?>">
            </div>

        </div>
         <div class="form-group">
            <label class="control-label col-lg-4">Birth Day</label>
            <div class="col-lg-4">
                <input type="text" class="validate[required] form-control" name="lname" id="req" value="<?php echo $res_sidebar[$userType.'_dob'];?>">
            </div>

        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">Contact</label>
            <div class="col-lg-4">
                <input type="text" class="validate[required] form-control" name="lname" id="req" value="<?php echo $res_sidebar[$userType.'_contact'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">Secret Question</label>
            <div class="col-lg-4">
                <a class="btn btn-default" data-toggle="modal" data-target="#modal-secretquestion">Update Secret Question</a>
            </div>

        </div>
         <div class="form-group">
         <label class="control-label col-lg-4"></label>
         <div class="col-lg-4">
             <input type="Submit" class="btn btn-primary" name="update_detail" value="Submit">
         </div>
         </div>
      </form>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


    <div class="modal fade" id="modal-changepic" data-modal-index="2" >
  <div class="modal-dialog">
    <div class="modal-content"  >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Change Picture</h4>
      </div>
      <div class="modal-body" style="height: 250px;">
             
              <iframe src="http://localhost/tracer/assets/lib/image_upload/image_upload_demo.php" style="width: 100%; height: 100%;" frameBorder="0"></iframe>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <div class="modal fade" id="modal-newpassword" data-modal-index="2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">New Password</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal" id="updateverified" name="updateverified" action="action/update.php">
              <div class="form-group">
                  <label class="control-label col-lg-4">Password</label>
                  <div class="col-lg-4">
                      <input type="text" class="validate[required] form-control" name="password" id="req" value="">
                  </div>
              </div>
               <div class="form-group">
                  <label class="control-label col-lg-4">Confirm Password</label>
                  <div class="col-lg-4">
                      <input type="text" class="validate[required] form-control" name="confirmpass" id="req" value="">
                  </div>
              </div>
              <div class="form-group">
              <label class="control-label col-lg-4"></label>
              <div class="col-lg-4">
                  <input type="Submit" class="btn btn-primary" name="update_pass" value="Submit">
              </div>
              </div>
              </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <div class="modal fade" id="modal-secretquestion" data-modal-index="2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">New Password</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal" id="updateverified" name="updateverified" action="action/update.php">
              <div class="form-group">
                  <label class="control-label col-lg-4">Secret Question</label>
                  <div class="col-lg-4">
                      <input type="text" class="validate[required] form-control" name="password" id="req" value="">
                  </div>
              </div>
               <div class="form-group">
                  <label class="control-label col-lg-4">Secret Answer</label>
                  <div class="col-lg-4">
                      <input type="text" class="validate[required] form-control" name="confirmpass" id="req" value="">
                  </div>
              </div>
              <div class="form-group">
              <label class="control-label col-lg-4"></label>
              <div class="col-lg-4">
                  <input type="Submit" class="btn btn-primary" name="update_pass" value="Submit">
              </div>
              </div>
              </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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


<script type="text/javascript">
$('.btn[data-toggle=modal]').on('click', function(){
  var $btn = $(this);
  var currentDialog = $btn.closest('.modal-dialog'),
  targetDialog = $($btn.attr('data-target'));;
  if (!currentDialog.length)
    return;
  targetDialog.data('previous-dialog', currentDialog);
  currentDialog.addClass('aside');
  var stackedDialogCount = $('.modal.in .modal-dialog.aside').length;
  if (stackedDialogCount <= 5){
    currentDialog.addClass('aside-' + stackedDialogCount);
  }
});

$('.modal').on('hide.bs.modal', function(){
  var $dialog = $(this);  
  var previousDialog = $dialog.data('previous-dialog');
  if (previousDialog){
    previousDialog.removeClass('aside');
    $dialog.data('previous-dialog', undefined);
  }
});


</script>
