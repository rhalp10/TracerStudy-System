
<?php 
include('session.php'); 
include('db.php');

$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'course';

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
                              <li class="breadcrumb-item active"> Dashboard</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>

                        <div class="inner bg-light lter">
                            <center><h1>COURSE LIST</h1></center>
                            <hr>
                            
                            <div >
            <button class="btn btn-primary" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add">ADD COURSE</button>  
            <br>  <br><br>           
       <table class="table table-bordered" id="11">
<thead>
    <tr>
        <th>Department</th>
        <th>Course</th>
        <th class="text-center">Action</th>
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

$sql = mysqli_query($con,"SELECT cc.course_ID,cd.department_name ,cc.course_name FROM cvsu_course cc
INNER JOIN cvsu_department cd ON cd.department_ID = cc.course_departmentID ");
while ($d = mysqli_fetch_array($sql)) {
    ?>
<tr>
    <td><?php  echo $d[1];?></td>
    <td><?php  echo $d[2];?></td>
    <td class="text-center">
        <div class="btn-group ">
        <button data-id="<?php echo $d[0];?>" class="btn btn-primary" class="btn btn-info btn-lg" data-toggle="modal" data-target="#edit" id="editjob">EDIT</button>
        <button data-id="<?php echo $d[0];?>" class="btn btn-primary" class="btn btn-info btn-lg" data-toggle="modal" data-target="#delete" id="deletejob">DELETE</button>
    </div></td>
</tr> 
    <?php
}
?>
</tbody>
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
           
    <script type="text/javascript">
     $(document).ready(function() {
                var dataTable = $('#11').DataTable( {

                    // "processing": true,
                    // "serverSide": true,
                    // "bAutoWidth": false,
                    //  // "bSort": false,
                    //  "bLengthChange": false,
                    //  "columnDefs": [ {
                    //     className: "text-center",
                    //       "targets": 1,
                    //       "searchable": false
                    //     }, 
                    //     {
                    //     className: "text-center",
                    //       "targets": 2,
                    //       "searchable": false
                    //     }, 
                    //     {
                    //     className: "text-center",
                    //       "targets": 3,
                    //       "searchable": false
                    //     }, 
                    //     {
                    //     className: "text-center",
                    //           "targets": 4,
                    //           "searchable": false
                    //     }],
                    // "ajax":{
                    //     url :"serverside_data_registerstud.php", // json datasource
                    //     type: "post",  // method  , by default get
                    //     error: function(){  // error handling
                    //         $(".registerstud_serverside-error").html("");
                    //         $("#eregisterstud_serverside").append('<tbody class="registerstud_serverside-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    //         $("#registerstud_serverside_processing").css("display","none");
                            

                    //     }
                        
                    // }
                } );


                
            } );
    </script>
        </body>

</html>


<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Job Recommended</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="action/submitcourse.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">Course:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Title" placeholder="Title" name="Course">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Acronym">Acronym:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Title" placeholder="Title" name="Acronym" value="<?php echo $d[3]?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Department">Department:</label>
    <div class="col-sm-10"> 
      
      <?php 
 $sql = mysqli_query($con,"SELECT * FROM `cvsu_department`");
      
      ?>
      <select class="form-control" name="Department">
          <?php 
          while ($o = mysqli_fetch_array($sql)){
            ?>

          <option value="<?php echo $o[0]?>"><?php echo $o[2] ?></option>
            <?php
          }
          ?>
      </select>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="submit-course" >Submit</button>
    </div>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        <div id="editmodal-loader" style="display: none; text-align: center;">
                 <img src="img/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
                <div id="edit-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
       <div id="deletemodal-loader" style="display: none; text-align: center;">
                 <img src="img/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
        <div id="delete-content"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
    



    $(document).ready(function(){
  
    $(document).on('click', '#editjob', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#edit-content').html(''); // leave it blank before ajax call
    $('#editmodal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'course_edit.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#edit-content').html('');    
      $('#edit-content').html(data); // load response 
      $('#editmodal-loader').hide();      // hide ajax loader 
    })
    .fail(function(){
      $('#edit-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#editmodal-loader').hide();
    });
    
  });


    $(document).on('click', '#deletejob', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#delete-content').html(''); // leave it blank before ajax call
    $('#deletemodal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'course_delete.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#delete-content').html('');    
      $('#delete-content').html(data); // load response 
      $('#deletemodal-loader').hide();      // hide ajax loader 
    })
    .fail(function(){
      $('#delete-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#deletemodal-loader').hide();
    });
    
  });
    });
</script>