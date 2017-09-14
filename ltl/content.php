
<?php 
include('db.php');

$query = mysqli_query($con,"SELECT * FROM forum_topic WHERE topic_id = 6");
$res = mysqli_fetch_array($query);

$post_title = $res['post_title'];
$post_owner = $res['post_owner'];
$post_date  = $res['post_date'];
$post_content = $res['post_content'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $post_title ?></title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    <?php include('style.php'); ?>
  </head>

        <body class="  menu-affix">
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <!-- .navbar -->
                    <nav class="navbar navbar-inverse navbar-fixed-top">
                        <div class="container-fluid">
                    
                    
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <header class="navbar-header">
                    
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a href="index.html" class="navbar-brand"><img src="assets/img/logo.png" alt="" style="width: 50px;"></a>
                    
                            </header>

                    

                    
                    
                    
                    
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                    
                                <!-- .nav -->
                                <ul class="nav navbar-nav">
                                    <li><a href="">Welcome to: CVSU-CEIT DIT ONLINE TRACER STUDY</a></li>
                                </ul>

                                <ul class="nav navbar-nav pull-right">

                                    <li class="dropdown ">
                                        <a href="#right" id="nbAcctDD" class="dropdown-toggle" data-toggle="onoffcanvas" class="btn btn-default btn-sm" aria-expanded="false"><i class="icon-user"></i>Message<i class="icon-sort-down"></i><span class="fa fa-fw fa-comment"></span></a>

                                    </a>
                                    </li>

                                    <li class="dropdown ">
                                        <a href="#" id="nbAcctDD" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-user"></i>Notification<i class="icon-sort-down"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#">Log Out</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown ">
                                        <a href="#" id="nbAcctDD" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-user"></i>Rhalp10<i class="icon-sort-down"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#">Log Out</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>
                                <!-- /.nav -->

                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                    <!-- /.navbar -->
                        
                </div>
                <!-- /#top -->
                    <div id="left">
                        <div class="media user-media bg-dark dker">
                            <div class="user-media-toggleHover">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="user-wrapper bg-dark">
                                <a class="user-link" href="">
                                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif">
                                    <span class="label label-danger user-label">16</span>
                                </a>
                        
                                <div class="media-body">
                                    <h5 class="media-heading">Archie</h5>
                                    <ul class="list-unstyled user-info">
                                        <li>Administrator</li>
                                        <li>Last Access : <br>
                                            <small><i class="fa fa-calendar"></i>&nbsp;16 Mar 16:32</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- #menu -->
                        <ul id="menu" class="bg-blue dker" style="background-color: #444444 !important;">
                                  <li class="nav-header">Menu</li>
                                  <li class="nav-divider"></li>
                                  
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-user "></i>
                                      <span class="link-title">My Batchmate</span>
                                      <span class="fa fa arrow"></span>
                                    </a>
                                  </li>
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-building "></i>
                                      <span class="link-title">Account Notification</span>
                                      <span class="fa fa arrow"></span>
                                    </a>
                                  </li>
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-building "></i>
                                      <span class="link-title">Messages</span>
                                      <span class="fa fa arrow"></span>
                                    </a>
                                  </li>
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-building "></i>
                                      <span class="link-title">Portal</span>
                                      <span class="fa fa arrow"></span>
                                    </a>
                                  </li>
                                  <li class="active">
                                    <a href="javascript:;">
                                      <i class="fa fa-building "></i>
                                      <span class="link-title">Forum</span>
                                      <span class="fa fa arrow"></span>
                                    </a>
                                  </li>

                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-building "></i>
                                      <span class="link-title">Survey</span>
                                      <span class="fa fa arrow"></span>
                                    </a>
                                  </li>
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-building "></i>
                                      <span class="link-title">Statistic</span>
                                      <span class="fa fa arrow"></span>
                                    </a>
                                  </li>
                                </ul>
                        <!-- /#menu -->
                    </div>
                    <!-- /#left -->
                <div id="content">
                    <div class="outer">
                        <header class="head">
                            <div class="main-bar">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                              <li class="breadcrumb-item active">Forum</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>

                        <!-- /.head -->
                        <div class="inner bg-light lter">
                            <div class="col-lg-12"><!-- CONTENT START HERE-->
                           
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
                                  for ($i=0; $i < 10; $i++) { 
                                    
                                  
                                  ?>
                                  <tr onclick="self.location.href='content.php'">
                                  <td class="forum-td" >
                                  <div class="forum-list-hover col-sm-1" >
                                  <i class="fa fa-comment"></i>

                                    </div>
                                    <div class="col-sm-6 forum-list-content">
                                   <strong><a href="content.php">Sample <?php echo $i; ?>
                                    </a></strong>
                                    <br>
                                    by <a href="">Rhalp</a>
                                    </div>
                                    <div class="col-sm-2 forum-list-content-stat">
                                    9,877 <i class="fa fa-eye"></i>
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
                              
                        </div> <!--CONTENT END HERE-->
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
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong> Best check yo self, you're not looking too good.
                        </div>
                        <!-- .well well-small -->
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
            <footer class="Footer bg-dark dker">
                <p>CVSU-CEIT DIT ONLINE TRACER STUDY <br>All Rights Reserved Copyright 2017</p>
            </footer>
            <!-- /#footer -->
            <!-- #helpModal -->
            <div id="helpModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- /#helpModal -->
           <?php include('script.php'); ?>
        </body>

</html>
