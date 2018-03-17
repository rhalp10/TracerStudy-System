
<?php 
include('session.php');
include('db.php');
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
                              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                              <li class="breadcrumb-item active"> Alumni</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                          <!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <?php
  $dep =mysqli_query($con,"SELECT * FROM `cvsu_department`"); 
                              while ($data = mysqli_fetch_array($dep)) {
                                
                                if ($data['department_ID'] == 1) {
                                  
                                  ?><li class="active"><a data-toggle="tab" href="#<?php echo  $data['department_ID'] ?>"><?php echo $data['department_name']; ?></a></li><?php
                                }
                                else{
                                  ?><li><a data-toggle="tab" href="#<?php echo  $data['department_ID'] ?>"><?php echo  $data['department_name'] ?></a></li>
                                  <?php
                                }
                              }
                              ?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
   <?php 
    $dep =mysqli_query($con,"SELECT * FROM `cvsu_department`"); 
    while ($data = mysqli_fetch_array($dep)) {
      
      if ($data['department_ID'] == 1) {
        
        ?>
  <div class="tab-pane active" id="<?php echo $data['department_ID']; ?>" role="tabpanel">
   
  
    <?php
     $dID =  $data['department_ID']; 
      $s =mysqli_query($con,"SELECT DISTINCT (year(student_year_grad)) as year_list FROM `user_student_detail` WHERE student_department = $dID");
      ?>
      <br>
      <table  id="c" class="table table-bordered table-advance table-hover  dataTable">
                                      <thead>
                                        <tr>
                                          <th><h3>Computer Science Alumni List</h3></th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                         <?php 
                                        while ($d = mysqli_fetch_array($s)) {
                                          $year_list = $d['year_list'];
                                          ?>

                    <tr>
                    <td><div class='forum-list-hover col-sm-1' style='height: 20px;'>
                    <br>
                      </div>
                      <div class='col-sm-6 forum-list-content' data-id='"<?php echo $year_list;?>"'>
                      <a href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?> ' ><?php echo $year_list;?></a>

                     <br>
                      </div>
                      <div class='col-sm-2 forum-list-content-stat'>
                      <br>
                      </div>
                      <div class='col-sm-3' style='background-color: #444444;color: white;' >
                      <a href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?> ' style='background-color: #444444;color: white;'> VIEW</a>
                      </div></td>
                      </tr>
                                          <?php
                                        }
                                        ?>
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          <th></th>
                                        </tr>
                                      </tfoot>
                                  
                                  </table>
      </div>
    <?php 
    }
        if ($data['department_ID'] == 2) {
        
        ?>
  <div class="tab-pane " id="<?php echo $data['department_ID']; ?>" role="tabpanel">
   
  
    <?php
     $dID =  $data['department_ID']; 
      $s =mysqli_query($con,"SELECT DISTINCT (year(student_year_grad)) as year_list FROM `user_student_detail` WHERE student_department = $dID");
      ?>
      <br>
      <table  id="i" class="table table-bordered table-advance table-hover  dataTable">
                                      <thead>
                                        <tr>
                                          <th><h3>Information Technology Alumni List</h3></th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php 
                                        while ($d = mysqli_fetch_array($s)) {
                                          $year_list = $d['year_list'];
                                          ?>
                    <tr>
                    <td><div class='forum-list-hover col-sm-1' style='height: 20px;'>
                    <br>
                      </div>
                      <div class='col-sm-6 forum-list-content' data-id='"<?php echo $year_list;?>"'>
                      <a href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?> ' ><?php echo $year_list;?></a>

                     <br>
                      </div>
                      <div class='col-sm-2 forum-list-content-stat'>
                      <br>
                      </div>
                      <div class='col-sm-3' style='background-color: #444444;color: white;' >
                      <a href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?> ' style='background-color: #444444;color: white;'> VIEW</a>
                      </div></td>
                      </tr>
                                          <?php
                                        }
                                        ?>
                                        
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          <th></th>
                                        </tr>
                                      </tfoot>
                                  
                                  </table>
      </div>
    <?php 
    }
      if ($data['department_ID'] == 3) {
        
        ?>
  <div class="tab-pane " id="<?php echo $data['department_ID']; ?>" role="tabpanel">
   
  
    <?php
     $dID =  $data['department_ID']; 
      $s =mysqli_query($con,"SELECT DISTINCT (year(student_year_grad)) as year_list FROM `user_student_detail` WHERE student_department = $dID");
      ?>
      <br>
      <table  id="o" class="table table-bordered table-advance table-hover  dataTable">
                                      <thead>
                                        <tr>
                                          <th><h3>Office Administration Alumni List</h3></th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                         <?php 
                                        while ($d = mysqli_fetch_array($s)) {
                                          $year_list = $d['year_list'];
                                          ?>
                    <tr>
                    <td><div class='forum-list-hover col-sm-1' style='height: 20px;'>
                    <br>
                      </div>
                      <div class='col-sm-6 forum-list-content' data-id='"<?php echo $year_list;?>"'>
                      <a href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?> ' ><?php echo $year_list;?></a>

                     <br>
                      </div>
                      <div class='col-sm-2 forum-list-content-stat'>
                      <br>
                      </div>
                      <div class='col-sm-3' style='background-color: #444444;color: white;' >
                      <a href='alumni_view.php?course=<?php echo $dID;?>&year=<?php echo $year_list;?> ' style='background-color: #444444;color: white;'> VIEW</a>
                      </div></td>
                      </tr>
                                          <?php
                                        }
                                        ?>
                                      </tbody>
                                      <tfoot>
                                        <tr>
                                          <th></th>
                                        </tr>
                                      </tfoot>
                                  
                                  </table>
      </div>
    <?php 
    }
  }
    ?>
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

<script type="text/javascript">

$(document).ready( function () {
    $('#c').DataTable();
} );
$(document).ready( function () {
    $('#i').DataTable();
} );
$(document).ready( function () {
    $('#o').DataTable();
} );
 $(document).ready(function() {

        var dataTable = $('#forumData_Unpin').DataTable( {
          "processing": true,
          "serverSide": true,
          "bLengthChange": false,
          "ordering": true,
          "columnDefs": [ {
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false
                        }],
          "ajax":{
            url :"serverside_data_forumUnpin.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".forumData_Unpin-error").html("");
              $("#forumData_Unpin").append('<tbody class="forumData_Unpin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#forumData_Unpin_processing").css("display","none");
              
            }
          }
        } );
      } );
 $(document).ready(function() {

                var dataTable = $('#forumData_Pin').DataTable( {
                    // "stripeClasses": [],
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                    
                    "bLengthChange": false,

                    "columnDefs": [ {
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false
                        }],
                        // "initComplete": function () {
                        //     $( document ).on("click", "tr[role='row']", function(){
                        //         // var year_data = document.getElementById("year_data" ).innerHTML;
                        //          var year_data = $(this).parents('div .col-sm-6 forum-list-content').data('id');
                        //          jQuery("tr").addClass("myClass");
                        //          window.location='alumni_view.php?course=IT&year='+year_data;

                        //     });
                        // },
                    "ajax":{
                        url :"serverside_data_forumPin.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".forumData_Pin-error").html("");
                            $("#forumData_Pin").append('<tbody class="forumData_Pin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#forumData_Pin_processing").css("display","none");
                            

                        }
                        
                    }
                } );
                
            } );
 $(document).ready(function() {
                var dataTable = $('#alumniIT').DataTable( {
                    // "stripeClasses": [],
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                    // "bSort": false,
                    "bLengthChange": false,

                    "info":     false,
                    "columnDefs": [ {

                        "orderable": false,
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false

                        }],
                        
                        // "initComplete": function () {
                        //     $( document ).on("click", "tr[role='row']", function(){
                        //         // var year_data = document.getElementById("year_data" ).innerHTML;
                        //          var year_data = $(this).parents('div .col-sm-6 forum-list-content').data('id');
                        //          jQuery("tr").addClass("myClass");
                        //          window.location='alumni_view.php?course=IT&year='+year_data;

                        //     });
                        // },

                    "ajax":{
                        url :"serverside_data_IT_Alumni.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".alumniIT-error").html("");
                            $("#alumniIT").append('<tbody class="alumniIT-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#alumniIT_processing").css("display","none");
                            

                        }
                        
                    }
                } );



                
            } );
 $(document).ready(function() {
                var dataTable = $('#alumniCS').DataTable( {
                    // "stripeClasses": [],
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                    // "bSort": false,
                    "bLengthChange": false,

                    "info":     false,
                    "columnDefs": [ {

                        "orderable": false,
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false

                        }],
                        
                        // "initComplete": function () {
                        //     $( document ).on("click", "tr[role='row']", function(){
                        //         // var year_data = document.getElementById("year_data" ).innerHTML;
                        //          var year_data = $(this).parents('div .col-sm-6 forum-list-content').data('id');
                        //          jQuery("tr").addClass("myClass");
                        //          window.location='alumni_view.php?course=IT&year='+year_data;

                        //     });
                        // },

                    "ajax":{
                        url :"serverside_data_CS_Alumni.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".alumniIT-error").html("");
                            $("#alumniIT").append('<tbody class="alumniIT-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#alumniIT_processing").css("display","none");
                            

                        }
                        
                    }
                } );



                
            } );



 $(document).ready(function() {
                var dataTable = $('#alumniOA').DataTable( {
                    // "stripeClasses": [],
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                    // "bSort": false,
                    "bLengthChange": false,

                    "info":     false,
                    "columnDefs": [ {

                        "orderable": false,
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false

                        }],
                        
                        // "initComplete": function () {
                        //     $( document ).on("click", "tr[role='row']", function(){
                        //         // var year_data = document.getElementById("year_data" ).innerHTML;
                        //          var year_data = $(this).parents('div .col-sm-6 forum-list-content').data('id');
                        //          jQuery("tr").addClass("myClass");
                        //          window.location='alumni_view.php?course=IT&year='+year_data;

                        //     });
                        // },

                    "ajax":{
                        url :"serverside_data_OA_Alumni.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".alumniIT-error").html("");
                            $("#alumniIT").append('<tbody class="alumniIT-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#alumniIT_processing").css("display","none");
                            

                        }
                        
                    }
                } );



                
            } );
 
    $(document).ready(function() {
                var dataTable = $('#registerstud_serverside').DataTable( {

                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                     // "bSort": false,
                     "bLengthChange": false,
                     "columnDefs": [ {
                        className: "text-center",
                          "targets": 1,
                          "searchable": false
                        }, 
                        {
                        className: "text-center",
                          "targets": 2,
                          "searchable": false
                        }, 
                        {
                        className: "text-center",
                          "targets": 3,
                          "searchable": false
                        }, 
                        {
                        className: "text-center",
                              "targets": 4,
                              "searchable": false
                        }],
                    "ajax":{
                        url :"serverside_data_registerstud.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".registerstud_serverside-error").html("");
                            $("#eregisterstud_serverside").append('<tbody class="registerstud_serverside-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#registerstud_serverside_processing").css("display","none");
                            

                        }
                        
                    }
                } );


                
            } );
$(document).ready(function() {
                var dataTable = $('#forumData_User_Unpin').DataTable( {
                    // "stripeClasses": [],
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                    
                    "bLengthChange": false,

                    "columnDefs": [ {
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false
                        }],
                    "ajax":{
                        url :"serverside_data_forumData_User_Unpin.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".forumData_User_Unpin-error").html("");
                            $("#forumData_User_Unpin").append('<tbody class="forumData_User_Unpin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#forumData_User_Unpin_processing").css("display","none");
                            

                        }
                        
                    }
                } );
                
            } );
 $(document).ready(function() {
                var dataTable = $('#forumData_User_Pin').DataTable( {
                    // "stripeClasses": [],
                    "processing": true,
                    "serverSide": true,
                    "bAutoWidth": false,
                    
                    "bLengthChange": false,

                    "columnDefs": [ {
                        className: "forum-td",
                          "targets": 0,
                          "searchable": false
                        }],
                    "ajax":{
                        url :"serverside_data_forumData_User_Pin.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".forumData_User_Pin-error").html("");
                            $("#forumData_User_Pin").append('<tbody class="forumData_User_Pin-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#forumData_User_Pin_processing").css("display","none");
                            

                        }
                        
                    }
                } );
              
            } );

        </script>
        </body>

</html>
