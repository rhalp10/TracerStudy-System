<!-- .navbar -->
<?php 

$qry = mysqli_query($con,"SELECT * FROM user_student_detail WHERE student_userID = '$login_id'");
$res = mysqli_fetch_assoc($qry);
$res['student_fName'];
$res['student_lName'];
$res['student_img'];


?>
<style type="text/css">
    
/** =====================
 * Top nav Customize Dropdown notif and msg
 ========================*/
 
.panel_defaul_custom
{
    width: 430px;
  }
.panel_heading_custom
{
    margin-top: -5px;
  }
.panel_body_custom
{
    overflow-y: scroll;
    overflow-x: hidden; height:400px; width: 430px;
  }
  .panel_item_custom{
    color: black; width: 100%; background-color: #e7eaed;
  }
  .panel_item_custom:hover{
    color: black; width: 100%; background-color: #dee0e2;   
    -webkit-transition: background-color 0.2s ease-out;
    -moz-transition: background-color 0.2s ease-out;
    -o-transition: background-color 0.2s ease-out;
    transition: background-color 0.2s ease-out;
  }
  .panel_item_word_custom{
    text-overflow: ellipsis;  overflow: hidden; white-space: nowrap; 
                width: 12em;
  }
  .panel_footer_custom{
    margin-bottom: -10px; color: black; height: 15px;
  }


/** =====================
 * Top nav Customize Dropdown notif and msg END
 ========================*/
</style>
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
            <a href="index.php" class="navbar-brand"><img src="assets/img/logo.png" alt="" style="width: 50px;">
            </a>

        </header>
        <style type="text/css">

        </style>


        <ul class="nav navbar-nav pull-right">
           <!--  <li class="dropdown ">
                <a href="#" id="nbAcctDD" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-user"></i>Message<i class="icon-sort-down"></i></a>
                <ul class="dropdown-menu pull-right" >
                 <?php 
                 // include ("dropdown-menu_message.php");
                 ?>
                </ul>
            </li> -->

            <li class="dropdown ">
                <a href="#" id="nbAcctDD" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-user"></i>Notification<i class="icon-sort-down"></i></a>
                <ul class="dropdown-menu pull-right" >
                 <?php 
                 include ("dropdown-menu_notification.php");
                 ?>
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
                <li><a href="dashboard.php">Welcome to: CVSU-CEIT DIT ONLINE TRACER STUDY</a>
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

<!-- /.For removing color of read items -->
<script>
function myFunction(divObj) {
    divObj.style.background="#f5f5f5";
}
</script>
<!-- /.For removing color of read items end-->