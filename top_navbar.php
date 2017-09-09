<!-- .navbar -->
<?php 

$qry = mysqli_query($con,"SELECT * FROM user_student_detail WHERE student_userID = '$login_id'");
$res = mysqli_fetch_assoc($qry);
$res['student_fName'];
$res['student_lName'];
$res['student_img'];


?>
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
            <a href="index.html" class="navbar-brand"><img src="assets/img/logo.png" alt="" style="width: 50px;">
            </a>

        </header>



        <ul class="nav navbar-nav pull-right">
            <li class="dropdown ">
                <a href="#right" id="nbAcctDD" class="dropdown-toggle" data-toggle="onoffcanvas" class="btn btn-default btn-sm" aria-expanded="false"><i class="icon-user"></i>Message<i class="icon-sort-down"></i><span class="fa fa-fw fa-comment"></span></a>

                </a>
            </li>

            <li class="dropdown ">
                <a href="#" id="nbAcctDD" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-user"></i>Notification<i class="icon-sort-down"></i></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="#">Log Out</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown ">
                <a href="#" id="nbAcctDD" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-user"></i><?php echo $login_session;?><i class="icon-sort-down"></i></a>
                <ul class="dropdown-menu pull-right">

                    <li><a href="profile.php">Profile</a>
                    </li>
                    <li><a href="logout.php">Log Out</a>
                    </li>
                </ul>
            </li>

        </ul>




        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <!-- .nav -->
            <ul class="nav navbar-nav">
                <li><a href="dashboard.html">Welcome to: CVSU-CEIT DIT ONLINE TRACER STUDY</a>
                </li>

            </ul>
            <!-- /.nav -->

        </div>
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- /.navbar -->
<header class="head">
    <div class="search-bar">
        <div style="height: 20px;"></div>
        <!-- /.main-search -->
    </div>
    <!-- /.search-bar -->
    <div class="main-bar">
        <div style="height: 20px;"></div>
    </div>
    <!-- /.main-bar -->
</header>
<!-- /.head -->