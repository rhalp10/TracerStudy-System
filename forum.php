
<?php 
include('session.php');
include('db.php');
$page = 'forum';
if($login_level == '1') {
   $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_userID = $login_id");
   $data = mysqli_fetch_array($result);
   $data_img = $data['student_img'];
}
else if($login_level == '2') {
   $result = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE teacher_userID = $login_id");
   $data = mysqli_fetch_array($result);
   $data_img = $data['teacher_img'];
}
else if($login_level == '3') {
   $result = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE admin_userID = $login_id");
   $data = mysqli_fetch_array($result);
   $data_img = $data['admin_img'];
}
else {}
?>
<!DOCTYPE html>
<html>  
  <head>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
    <title>Forum</title>
  </head>
        <body class="menu-affix">
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <?php include ('top_navbar.php');?>
                </div>
                <!-- /#top -->
                    <?php  
                    if($login_level == '1') {
                       include('sidebar_student.php');
                    }
                    if($login_level == '2') {
                       include('sidebar_teacher.php');
                    }
                    elseif($login_level == '3') {
                       include('sidebar_admin.php');
                    }
                    else {}
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
                           <table id="forumData_Pin"  class="table table-bordered table-advance table-hover  dataTable">
                                  <thead>
                                    <tr>
                                      <th><h3>Pinned Topics</h3></th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th></th>
                                    </tr>
                                  </tfoot>
                              </table>
                              <hr>
                              <table id="forumData_Unpin"  class="table table-bordered table-advance table-hover  dataTable">
                                  <thead>
                                    <tr>
                                      <th><h3>Topic</h3></th>
                                    </tr>
                                    <tr onclick="self.location.href='forum_topic_create.php'">
                                  <td class="forum-td" >
                                  <div class="forum-list-hover col-sm-1" >
                                  <i class="fa fa-plus"></i>
                                    </div>
                                    <div class="col-sm-6 forum-list-content">
                                   <strong><a href="content.php">Post new topic</a>
                                   <br>&nbsp;</strong>
                                    </div>
                                    <div class="col-sm-2 forum-list-content-stat">
                                    &nbsp;
                                    <br>
                                    &nbsp;
                                    </div>
                                    <div class="col-sm-3" style="background-color: #444444;color: white;">
                                   &nbsp;<br>&nbsp;
                                    </div>

                                    </td>
                                  </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th></th>
                                    </tr>
                                  </tfoot>
                     
                                  <script type="text/javascript">
                                    
                                  </script>
                              </table>
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
