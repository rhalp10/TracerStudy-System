
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
                              <li class="breadcrumb-item active"> Forum</li>
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
                                  <?php 
                                  $min_query = mysqli_query($con,"SELECT YEAR(MIN(student_year_grad)) AS minYear FROM user_student_detail WHERE student_department = 'IT'");
                                  $max_query = mysqli_query($con,"SELECT YEAR(MAX(student_year_grad)) AS maxYear FROM user_student_detail WHERE student_department = 'IT'");
                                  $min_res = mysqli_fetch_assoc($min_query);
                                  $max_res = mysqli_fetch_assoc($max_query);
                                  $minYear = $min_res['minYear'];
                                  $maxYear = $max_res['maxYear'];
                                  ?>
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
                                      <tbody>
                                      <?php 
                                       for ($i=$minYear; $i<= $maxYear; $i++) { 
                                    $query = mysqli_query($con,"SELECT student_department,student_year_grad FROM user_student_detail WHERE student_year_grad LIKE '%$i%' AND student_department LIKE 'IT'");
                                    $dateStack = 0;//temporary dateStack value
                                    while ($res = mysqli_fetch_array($query)) {
                                      //while the student_year_grad fetching we have a if statement that check
                                      //if  student_year_grad == the same year if TRUE display nothing else
                                      if ($res['student_year_grad'] == $dateStack) {

                                        $dateStack =$i;
                                        //echo "do not repeat<br>";
                                      }
                                      //display YEAR date of Alumni Batches
                                      else
                                      {
                                      // displaying all available date
                                      
                                       ?>
                                      <tr onclick="self.location.href='alumni_view.php?course=<?php echo 'IT' ?>&year=<?php echo $i?>'">
                                      <td class="forum-td" >
                                      <div class="forum-list-hover col-sm-1" style="height: 20px;">
                                      <br>
                                        </div>
                                        <div class="col-sm-6 forum-list-content">
                                        <a href=""><?php  echo "$i";?></a>
                                       <br>
                                        </div>
                                        <div class="col-sm-2 forum-list-content-stat">
                                        <br>
                                        </div>
                                        <div class="col-sm-3" style="background-color: #444444;color: white;">
                                        VIEW
                                        </div>

                                        </td>
                                      </tr>
                                       <?php
                                       $dateStack = $i;
                                      }
                                    }
                                  }

                                      ?>
                                        
                                      </tbody>
                                  </table>
                                </div>
                              </div>

                              <div id="CS" class="tab-pane fade">
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
                                      <tbody>
                                      <?php 
                                       for ($i=$minYear; $i<= $maxYear; $i++) { 
                                    $query = mysqli_query($con,"SELECT student_department,student_year_grad FROM user_student_detail WHERE student_year_grad LIKE '%$i%' AND student_department LIKE 'COMSCI'");
                                    $dateStack = 0;//temporary dateStack value
                                    while ($res = mysqli_fetch_array($query)) {
                                      //while the student_year_grad fetching we have a if statement that check
                                      //if  student_year_grad == the same year if TRUE display nothing else
                                      if ($res['student_year_grad'] == $dateStack) {

                                        $dateStack =$i;
                                        //echo "do not repeat<br>";
                                      }
                                      //display YEAR date of Alumni Batches
                                      else
                                      {
                                      // displaying all available date
                                      
                                       ?>
                                      <tr onclick="self.location.href='alumni_view.php?course=<?php echo 'COMSCI' ?>&year=<?php echo $i?>'">
                                      <td class="forum-td" >
                                      <div class="forum-list-hover col-sm-1" style="height: 20px;">
                                      <br>
                                        </div>
                                        <div class="col-sm-6 forum-list-content">
                                        <?php  echo "$i";?>
                                       <br>
                                        </div>
                                        <div class="col-sm-2 forum-list-content-stat">
                                        <br>
                                        </div>
                                        <div class="col-sm-3" style="background-color: #444444;color: white;">
                                        VIEW
                                        </div>

                                        </td>
                                      </tr>
                                       <?php
                                       $dateStack = $i;
                                      }
                                    }
                                  }

                                      ?>
                                        
                                      </tbody>
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
                                    <tbody>
                                    <?php 
                                     for ($i=$minYear; $i<= $maxYear; $i++) { 
                                  $query = mysqli_query($con,"SELECT student_department,student_year_grad FROM user_student_detail WHERE student_year_grad LIKE '%$i%' AND student_department LIKE 'OA'");
                                  $dateStack = 0;//temporary dateStack value
                                  while ($res = mysqli_fetch_array($query)) {
                                    //while the student_year_grad fetching we have a if statement that check
                                    //if  student_year_grad == the same year if TRUE display nothing else
                                    if ($res['student_year_grad'] == $dateStack) {

                                      $dateStack =$i;
                                      //echo "do not repeat<br>";
                                    }
                                    //display YEAR date of Alumni Batches
                                    else
                                    {
                                    // displaying all available date
                                    
                                     ?>

                                 <tr onclick="self.location.href='alumni_view.php?course=<?php echo 'OA' ?>&year=<?php echo $i?>'">
                                  <td class="forum-td" >
                                  <div class="forum-list-hover col-sm-1" style="height: 20px;">
                                  <br>
                                    </div>
                                    <div class="col-sm-6 forum-list-content">
                                    <?php  echo "$i";?>
                                   <br>
                                    </div>
                                    <div class="col-sm-2 forum-list-content-stat">
                                    <br>
                                    </div>
                                    <div class="col-sm-3" style="background-color: #444444;color: white;">
                                    VIEW
                                    </div>

                                    </td>
                                  </tr>

                                     <?php
                                     $dateStack = $i;
                                    }
                                  }
                                }

                                    ?>
                                      
                                    </tbody>
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
