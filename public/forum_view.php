
<?php 
include('session.php'); 
include('db.php');
$page = 'batchmates';

if ($login_level == '1')
{
    $result = mysql_query("SELECT * FROM `user_student_detail` WHERE `student_userID` = $login_id");
    $data = mysql_fetch_array($result);
    $data_img = $data['student_img']; 
}
else if ($login_level == '2')
{
    $result = mysql_query("SELECT * FROM `user_teacher_detail` WHERE `teacher_userID` = $login_id");
    $data = mysql_fetch_array($result);
    $data_img = $data['teacher_img']; 
}
else if ($login_level == '3')
{
    $result = mysql_query("SELECT * FROM `user_admin_detail` WHERE `admin_userID` = $login_id");
    $data = mysql_fetch_array($result);
    $data_img = $data['admin_img']; 
}
else
{
}
$query = mysqli_query($con,"SELECT * FROM `forum_topic` WHERE `topic_id` = 6");
$res = mysqli_fetch_array($query);

$post_title = $res['post_title'];
$post_owner = $res['post_owner'];
$post_date  = $res['post_date'];
$post_content = $res['post_content'];

mysql_query("UPDATE `view_counter` SET `view_count` = `view_count`+1 WHERE `view_topicID` = 6");

$query_viewcount  = mysql_query("SELECT `view_count` FROM `view_counter`WHERE `view_topicID` = 6");
$result_viewcount = mysql_fetch_assoc($query_viewcount);
?><!DOCTYPE html>
<html>  
  <head>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
    <title></title>
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
                           
                          <div class="col-lg-12"><!-- CONTENT START HERE-->

                            <h1><?php echo $post_title ?></h1>
                              <!-- Author -->
                              <p class="lead">
                                  by <a href="profile.php?id"><?php echo $post_owner ?></a>
                              </p>

                              <hr>

                              <!-- Date/Time -->
                              <p><strong> Posted on</strong> <?php echo date("M jS, Y", strtotime("$post_date")). "<strong> at </strong>".date('h:i A', strtotime("$post_date")); ?> <strong>View<?php if ($result_viewcount['view_count'] != 0 ){ echo "s";}else {}?>: </strong><?php echo $result_viewcount['view_count'] ?></p>

                              <hr>
                              <hr>

                              <!-- Post Content -->
                              <?php echo $post_content; ?>
                              <hr>
                              <!-- Comments Form -->
                          <div class="panel panel-default" >
                          <div class="panel-heading">Write your comment</div>
                          <div class="panel-body">
                              <form>
                                  <textarea id="wysihtml5" class="form-control" rows="6"></textarea>
                                  <br>
                                      <input type="submit" value="Comment" class="btn btn-primary">
                              </form>
                          </div>
                        </div>
                        <hr>

                          <div class="container" style="margin-right: 0px;padding-left: 0px;width: 995px;margin-left: 0px;">
                                <div class="row">
                                <!-- Contenedor Principal -->
                                  <div class="comments-container">
                                  <h1>Comment</h1>

                                  <ul id="comments-list" class="comments-list">
                                    <li>
                                      <div class="comment-main-level">
                                        <!-- Avatar -->
                                        <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                          <div class="comment-head">
                                            <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                            <span>hace 20 minutos</span>
                                             <i class="fa fa-reply"> Reply</i>
                                            <i class="fa fa-heart"></i>
                                          </div>
                                          <div class="comment-content">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Respuestas de los comentarios -->
                                      <ul class="comments-list reply-list">
                                        <li>
                                          <!-- Avatar -->
                                          <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                                          <!-- Contenedor del Comentario -->
                                          <div class="comment-box">
                                            <div class="comment-head">
                                              <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
                                              <span>hace 10 minutos</span>
                                               <i class="fa fa-reply"> Reply</i>
                                              <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="comment-content">
                                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                            </div>
                                          </div>
                                        </li>

                                        <li>
                                          <!-- Avatar -->
                                          <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                          <!-- Contenedor del Comentario -->
                                          <div class="comment-box">
                                            <div class="comment-head">
                                              <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                                              <span>hace 10 minutos</span>
                                              <i class="fa fa-reply"> Reply</i>
                                              <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="comment-content">
                                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                            </div>
                                          </div>
                                        </li>
                                      </ul>
                                    </li>

                                    <li>
                                      <div class="comment-main-level">
                                        <!-- Avatar -->
                                        <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                          <div class="comment-head">
                                            <h6 class="comment-name"><a href="http://creaticode.com/blog">Lorena Rojero</a></h6>
                                            <span>hace 10 minutos</span>
                                             <i class="fa fa-reply"> Reply</i>
                                            <i class="fa fa-heart"></i>
                                          </div>
                                          <div class="comment-content">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                          </div>
                                        </div>
                                      </div>
                                    </li>
                                  </ul>
                                </div>
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

</html>
