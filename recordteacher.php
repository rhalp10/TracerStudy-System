
<?php 
include('session.php'); 
include('db.php');

$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
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
                                        <input type="Password" id="text1" placeholder="Password" class="form-control" name="teacher_Password" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Confirm Password</label>

                                    <div class="col-lg-8">
                                        <input type="Password" id="text1" placeholder="Confirm Password" class="form-control" name="teacher_rePassword" >
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
                                    <label for="text1" class="control-label col-lg-4">Contact</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Contact" class="form-control" name="teacher_contact" onkeyup="numberInputOnly(this);" required=""  min="9" max="9">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Address</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="text1" placeholder="Address" class="form-control" name="teacher_adress">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Birthday</label>

                                    <div class="col-lg-8">
                                        <input type="date" id="text1" placeholder="Birthday" class="form-control" name="teacher_bday">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="text1" class="control-label col-lg-4">Gender</label>
                                  <div class="col-lg-8">
                                      <select class="form-control" name="teacher_gender">
                                          <option value="M">Male</option>
                                          <option value="F">Female</option>
                                      </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Civil Status</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="teacher_civilStat">
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
                                    <label for="text1" class="control-label col-lg-4">Department</label>

                                    <div class="col-lg-8">
                                    <?php 
                                    $query_dep = mysqli_query($con,"SELECT * FROM `cvsu_department`");
                                    ?>
                                        <select class="form-control" name="teacher_department">
                                        <?php
                                        while ($res_dep = mysqli_fetch_array($query_dep)) {
                                        
                                        ?>
                                            <option value="<?php echo $res_dep['department_ID'] ?>"><?php echo $res_dep['department_name'];?></option>
                                        <?php 
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <!-- /.form-group -->
                                
                                <div class="form-group text-center">
                                    <input class="btn btn-success" type="submit" name="submit_recordteacher" value="Submit">

                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Import Excel</button> -->
                                </div>
                            </form>
                             </div>
                            </div>
                            <div class="box col-sm-7">
                             <header>
                              <h5>List</h5>
                             </header>
                             <div class="body">
                                <table id="rteacherData" class="table table-bordered table-advance table-hover  ">
                                    <thead>
                                        <tr >
                                            <th class="col-sm-2">Name</th>
                                            <th class="col-sm-3">Department</th>
                                            <th class="col-sm-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>a</td>
                                            <td>a</td>
                                            <td>
                                                <div class="btn-group">
                                                  <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                                  <button type="button" class="btn btn-metis-5"><i class="fa fa-edit"></i></button>
                                                  <button type="button" class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
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

        function editFunction(teacher_ID){
            var txt;
            var r = confirm("Are you sure do you want to edit ?");
            if (r == true) {
                
             // window.location.href = "recordstudent.php?modal=" + student_ID;
            } else {
               
            }
        }       
        function deleteFunction(teacher_ID){
            var txt;
            var r = confirm("Are you sure do you want to delete?");
            if (r == true) {
                 $('#myModal').modal('show');
             // window.location.href = "recordstudent.php?modal=" + student_ID;
            } else {
               
            }

        }    
                   $(document).ready(function() {
                var dataTable = $('#rteacherData').DataTable( {

                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                     // "bSort": false,
                     "bLengthChange": false,
                     "columnDefs": [ {
                        className: "text-center",
                          "targets": 0,
                          "searchable": false
                        }, 
                        {
                        className: "text-center",
                          "targets": 1,
                          "searchable": false
                        }, 
                        {
                        className: "text-center",
                          "targets": 2,
                          "searchable": false
                        }],
                    "ajax":{
                        url :"serverside_data_registerteacher.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".registerstud_serverside-error").html("");
                            $("#eregisterstud_serverside").append('<tbody class="registerstud_serverside-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#registerstud_serverside_processing").css("display","none");
                            

                        }
                        
                    }
                } );


                
            } );

        </script>

</html>
<div class="container">
      <div class="modal fade" id="myModal1" data-modal-index="1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Import Excel CSV Format</h4>
      </div>
      <div class="modal-body">
    <div class="row">

                <form class="form-horizontal" action="action/csv.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>

                        <!-- Form Name -->
                      

                        <!-- File Button -->
<div class="form-group">
    <label for="text1" class="control-label col-lg-4">Select File</label>

    <div class="col-lg-8">
    <div class="input-group date" id="">
        <input type="file" class="form-control"  name="file" id="file" class="input-large">
        
    </div>
    </div>
</div>

<div class="form-group">
    <label for="text1" class="control-label col-lg-4">Import data</label>

    <div class="col-lg-8">
    <div class="input-group date" id="">
        <button type="submit" id="submit" name="Import_student" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
        
    </div>
    </div>
</div>

                    </fieldset>
                </form>

            </div>
      </div>
  </div>
</div>
</div>
</div>