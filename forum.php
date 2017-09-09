
<?php 
include('session.php'); 
include('db.php');
$page = 'forum';

if ($login_level == '1')
{
    $result = mysql_query("SELECT * FROM `user_student_detail` WHERE student_userID = $login_id");
    $data = mysql_fetch_array($result);
    $data_img = $data['student_img']; 
}
else if ($login_level == '2')
{
    $result = mysql_query("SELECT * FROM `user_teacher_detail` WHERE teacher_userID = $login_id");
    $data = mysql_fetch_array($result);
    $data_img = $data['teacher_img']; 
}
else if ($login_level == '3')
{
    $result = mysql_query("SELECT * FROM `user_admin_detail` WHERE admin_userID = $login_id");
    $data = mysql_fetch_array($result);
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
    <title>Forum</title>
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
                              <li class="breadcrumb-item active"> Forum</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <div class="inner bg-light lter">
                           <table id=""  class="table table-bordered table-advance table-hover  dataTable">
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
                                  <tbody>
                                  <?php 
                                  $query = mysql_query("SELECT * FROM `forum_topic` WHERE `post_status` = 'PIN' ORDER BY `post_date` DESC;");
                                  while ($res = mysql_fetch_array($query)) 
                                  {

                                  $query2 = mysql_query("SELECT `view_count` FROM `view_counter` WHERE `view_topicID` = ".$res['topic_ID']);
                                   $res2 = mysql_fetch_assoc($query2);
                                  
                                  ?>
                                  <tr onclick="self.location.href='forum_view.php?post_ID=<?php echo password_hash($res['topic_ID'], PASSWORD_DEFAULT);?>'">
                                  <td class="forum-td" >
                                  <div class="forum-list-hover col-sm-1" >
                                  <i class="fa fa-comment"></i>
                                    </div>
                                    <div class="col-sm-6 forum-list-content">
                                   <strong><a href="forum_view.php?post_ID=<?php echo password_hash($res['topic_ID'], PASSWORD_DEFAULT);?>"><?php echo $res['post_title']; ?>
                                    </a></strong>
                                    <br>
                                    by <a href=""><?php 
                                    $post_owner = $res['post_owner_id'];
                                    if ($query_postowner =  mysql_query("SELECT student_fName,student_mName,student_lName FROM `user_student_detail` WHERE `student_userID` = '$post_owner'")) 
                                      {
                                       $res_postowner = mysql_fetch_assoc($query_postowner);
                                      echo $res_postowner['student_fName']." ".$res_postowner['student_mName']." ".$res_postowner['student_lName'];
                                      }
                                      if ($query_postowner =  mysql_query("SELECT teacher_fName,teacher_mName,teacher_lName FROM `user_teacher_detail` WHERE `teacher_userID` = '$post_owner'")) 
                                      {
                                       $res_postowner = mysql_fetch_assoc($query_postowner);
                                      echo $res_postowner['teacher_fName']." ".$res_postowner['teacher_mName']." ".$res_postowner['teacher_lName'];
                                      }
                                      if ($query_postowner =  mysql_query("SELECT admin_fName,admin_mName,admin_lName FROM `user_admin_detail` WHERE `admin_userID` = '$post_owner'")) 
                                      {
                                       $res_postowner = mysql_fetch_assoc($query_postowner);
                                      echo $res_postowner['admin_fName']." ".$res_postowner['admin_mName']." ".$res_postowner['admin_lName'];
                                      }?></a>
                                    </div>
                                    <div class="col-sm-2 forum-list-content-stat">
                                    <?php echo $res2['view_count'] ;?> <i class="fa fa-eye"></i>
                                    <br>
                                    2 <i class="fa fa-comment"></i>
                                    </div>
                                    <div class="col-sm-3" style="background-color: #444444;color: white;">
                                    latest reply by <strong><a class="user"> user</a></strong><br>
                                    7 minutes ago 
                                    </div>

                                    </td>
                                  </tr>
                                  <?php 
                                  }?>
                                  </tbody>
                                  <script type="text/javascript">
                                    
                                  </script>
                              </table>
                              <table id="myData"  class="table table-bordered table-advance table-hover  dataTable">
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
                                  <tbody>
                                  
                                  <?php 


                                  $query3 = mysql_query("SELECT * FROM `forum_topic` WHERE `post_status` = 'UNPIN'");
                                  while ($res3 = mysql_fetch_array($query3)) {


                                   $query4 = mysql_query("SELECT `view_count` FROM `view_counter` WHERE `view_topicID` = ".$res3['topic_ID']);
                                   $res4 = mysql_fetch_assoc($query4);

                                  ?>
                                  <tr onclick="self.location.href='forum_view.php?post_ID=<?php echo password_hash($res3['topic_ID'], PASSWORD_DEFAULT);?>'">
                                  <td class="forum-td" >
                                  <div class="forum-list-hover col-sm-1" >
                                  <i class="fa fa-comment"></i>
                                    </div>
                                    <div class="col-sm-6 forum-list-content">
                                   <strong><a href="forum_view.php?post_ID=<?php echo password_hash($res3['topic_ID'], PASSWORD_DEFAULT);?>"><?php echo $res3['post_title']; ?>
                                    </a></strong>
                                    <br>
                                    by <a href="profile.php"><?php 
                                    $post_owner = $res3['post_owner_id'];
                                    if ($query_postowner =  mysql_query("SELECT student_fName,student_mName,student_lName FROM `user_student_detail` WHERE `student_userID` = '$post_owner'")) 
                                      {
                                       $res_postowner = mysql_fetch_assoc($query_postowner);
                                      echo $res_postowner['student_fName']." ".$res_postowner['student_mName']." ".$res_postowner['student_lName'];
                                      }
                                      if ($query_postowner =  mysql_query("SELECT teacher_fName,teacher_mName,teacher_lName FROM `user_teacher_detail` WHERE `teacher_userID` = '$post_owner'")) 
                                      {
                                       $res_postowner = mysql_fetch_assoc($query_postowner);
                                      echo $res_postowner['teacher_fName']." ".$res_postowner['teacher_mName']." ".$res_postowner['teacher_lName'];
                                      }
                                      if ($query_postowner =  mysql_query("SELECT admin_fName,admin_mName,admin_lName FROM `user_admin_detail` WHERE `admin_userID` = '$post_owner'")) 
                                      {
                                       $res_postowner = mysql_fetch_assoc($query_postowner);
                                      echo $res_postowner['admin_fName']." ".$res_postowner['admin_mName']." ".$res_postowner['admin_lName'];
                                      }?></a>
                                    </div>
                                    <div class="col-sm-2 forum-list-content-stat">
                                    <?php echo $res4['view_count'] ;?> <i class="fa fa-eye"></i>
                                    <br>
                                    2 <i class="fa fa-comment"></i>
                                    </div>
                                    <div class="col-sm-3" style="background-color: #444444;color: white;">
                                    latest reply by <strong><a class="user"> user</a></strong><br>
                                    7 minutes ago 
                                    </div>

                                    </td>
                                  </tr>
                                  <?php 
                                  }

                                  ?>
                                  </tbody>
                                  <script type="text/javascript">
                                    
                                  </script>
                              </table>
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
            $( document ).ready(function() {
  console.log( "document ready!" );

  var $sticky = $('.sticky');
  var $stickyrStopper = $('.sticky-stopper');
  if (!!$sticky.offset()) { // make sure ".sticky" element exists

    var generalSidebarHeight = $sticky.innerHeight();
    var stickyTop = $sticky.offset().top;
    var stickOffset = 0;
    var stickyStopperPosition = $stickyrStopper.offset().top;
    var stopPoint = stickyStopperPosition - generalSidebarHeight - stickOffset;
    var diff = stopPoint + stickOffset;

    $(window).scroll(function(){ // scroll event
      var windowTop = $(window).scrollTop(); // returns number

      if (stopPoint < windowTop) {
          $sticky.css({ position: 'absolute', top: diff });
      } else if (stickyTop < windowTop+stickOffset) {
          $sticky.css({ position: 'fixed', top: stickOffset });
      } else {
          $sticky.css({position: 'absolute', top: 'initial'});
      }
    });

  }
});


        </script>

</html>
