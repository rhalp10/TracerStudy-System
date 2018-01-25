
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
                           <div class="box">
                             <header>
                              <h5 class="pull-right">
                              </h5>
                             </header>
                             

                              <ul class="nav nav-tabs">
                                <li class="dropdown">
                                  <a class="dropdown-toggle btn btn-primary" data-toggle="dropdown" href="#">Course menu
                                  <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    <li><a data-toggle="tab" data-target="#IT">IT</a></li>
                                    <li><a data-toggle="tab" data-target="#CS">CS</a></li>
                                    <li><a data-toggle="tab" data-target="#OA">OA</a></li> 
                                  </ul>
                                </li>
                              </ul>

                              
                            </div>
                             <div class="tab-content">
                                <div id="IT" class="tab-pane fade in active">
                                  <div class="body col-sm-12">
                                    <table  id="alumniIT" class="table table-bordered table-advance table-hover  dataTable">
                                      <thead>
                                        <tr>
                                          <th><h3>Information Technology Alumni List</h3></th>

                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                          <th></th>
                                          
                                        </tr>
                                      </tfoot>
                                  
                                  </table>
                                </div>
                              </div>
                                <div id="CS" class="tab-pane fade in fade">
                                  <div class="body col-sm-12">
                                    <table  id="alumniCS" class="table table-bordered table-advance table-hover  dataTable">
                                      <thead>
                                        <tr>
                                          <th><h3>Computer Science Alumni List</h3></th>

                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                          <th></th>
                                          
                                        </tr>
                                      </tfoot>
                                  
                                  </table>
                                </div>
                              </div>
                           
                              <div id="OA" class="tab-pane fade">
                                <div class="body col-sm-12">
                                  <table  id="alumniOA" class="table table-bordered table-advance table-hover  dataTable">
                                    <thead>
                                      <tr>
                                        <th><h3>Office Administration Alumni List</h3></th>
                                      </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                                        <th></th>
                                      </tr>
                                    </tfoot>
                                 
                                </table>
                                </div>
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
