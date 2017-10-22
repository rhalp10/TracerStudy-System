<?php 
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");


if (isset($_POST['validate-answer'])) {
	$recovery_pass = $_POST['recovery_answer'];
	$verify_user = $_REQUEST['user'];
	$recovery_pass = stripslashes($recovery_pass);
	$verify_user = stripslashes($verify_user);
	$recovery_pass = mysqli_real_escape_string($con,$recovery_pass);
  	$verify_user = mysqli_real_escape_string($con,$verify_user);
	$ver = mysqli_query($con,"SELECT `user_ID`,`user_level`,`user_name` FROM `user_account` WHERE `user_name` = '$verify_user'");
	$ver_res = mysqli_fetch_array($ver);
	
if (empty($ver_res['user_name'])) {

	echo "<script>alert('User not found!');
			window.location='../index.php';
		</script>";
}
else
{
	if ($ver_res['user_level'] == 1) {
		$user_type = "student";
	
	}
	if ($ver_res['user_level'] ==2) {
		$user_type = "teacher";
	}
	if ($ver_res['user_level'] == 3) {
		$user_type = "admin";
	}
	$id = $ver_res['user_ID'];
	$query = mysqli_query($con,"SELECT ".$user_type."_secretquestion,".$user_type."_secretanswer FROM `user_".$user_type."_detail` WHERE ".$user_type."_userID = '$id'");
	$result = mysqli_fetch_array($query);
	 if (empty($result[$user_type.'_secretquestion'])) {
    echo "<script>alert('Empty');
      window.location='../index.php';
    </script>";
  }
  else if (empty($result[$user_type.'_secretanswer'])) {
    echo "<script>alert('Empty!');
      window.location='../index.php';
    </script>";
  }
  else
  {
    $result[$user_type.'_secretquestion'];
    if ($result[$user_type.'_secretanswer']==$recovery_pass) {
    	?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
		    <meta charset="UTF-8">
		    <!--IE Compatibility modes-->
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <!--Mobile first-->
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		    <title>Index</title>
		    <link rel="shortcut icon" href="../assets/img/logo.ico"/>
		    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
		    <meta name="author" content="">
		    
		    <meta name="msapplication-TileColor" content="#5bc0de" />
		    <meta name="msapplication-TileImage" content="../assets/img/metis-tile.png" />
		    
		    <!-- Bootstrap -->
		    <link rel="stylesheet" href="../assets/lib/bootstrap/css/bootstrap.css">
		    
		    <!-- Font Awesome -->
		    <link rel="stylesheet" href="../assets/lib/font-awesome/css/font-awesome.css">
		    
		    <!-- Metis core stylesheet -->
		    <link rel="stylesheet" href="../assets/css/main.css">
		    
		    <!-- metisMenu stylesheet -->
		    <link rel="stylesheet" href="../assets/lib/metismenu/metisMenu.css">
		    
		    <!-- onoffcanvas stylesheet -->
		    <link rel="stylesheet" href="../assets/lib/onoffcanvas/onoffcanvas.css">
		    
		    <!-- animate.css stylesheet -->
		    <link rel="stylesheet" href="../assets/lib/animate.css/animate.css">


		    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		    <![endif]-->

		    <style type="text/css">
		        .custombody{
		            /*Body Background*/
		  /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#b2e1ff+0,60c2ff+13,bce6ff+29,82cfff+46,89d2ff+47,82cfff+49,82cfff+65,bce6ff+83,66b6fc+100 */
		background: #b2e1ff; /* Old browsers */
		background: -moz-linear-gradient(-45deg, #b2e1ff 0%, #60c2ff 13%, #bce6ff 29%, #82cfff 46%, #89d2ff 47%, #82cfff 49%, #82cfff 65%, #bce6ff 83%, #66b6fc 100%); /* FF3.6-15 */
		background: -webkit-linear-gradient(-45deg, #b2e1ff 0%,#60c2ff 13%,#bce6ff 29%,#82cfff 46%,#89d2ff 47%,#82cfff 49%,#82cfff 65%,#bce6ff 83%,#66b6fc 100%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(135deg, #b2e1ff 0%,#60c2ff 13%,#bce6ff 29%,#82cfff 46%,#89d2ff 47%,#82cfff 49%,#82cfff 65%,#bce6ff 83%,#66b6fc 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b2e1ff', endColorstr='#66b6fc',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
		/*End of Body Background*/
		        }
		 a{
		     color:#ff9800;
		 }
		 .navbar .navbar-nav {
		  display: inline-block;
		  float: none;
		  vertical-align: top;
		}

		.navbar .navbar-collapse {
		  text-align: center;
		}



		  a > .fa-facebook-square
		  {
		    color: #3b5998;
		  }
		  a > .fa-facebook-square:hover
		  {
		    color: #0084ff;
		  }
		  a > .fa-google-plus-square
		  {
		    color: #dd4b39;
		  }
		  a > .fa-google-plus-square:hover
		  {
		    color: #cd201f;
		  }
		  a > .fa-twitter-square
		  {
		    color: #55acee;
		  }
		  a > .fa-twitter-square:hover
		  {
		    color: #007ee5;
		  }
		  a > .fa-github-square
		  {
		    color: #24292e;
		  }
		  a > .fa-github-square:hover
		  {
		    color: #41464c;
		  }

		    </style>
		</head>

		<body class="login custombody" >
		<div id="dialogoverlay"></div>
		<div id="dialogbox">
		  <div>
		    <div id="dialogboxhead"></div>
		    <div id="dialogboxbody"></div>
		    <div id="dialogboxfoot"></div>
		  </div>
		</div>
		    <div class="form-signin">
		    <div class="text-center">
		        <img src="../assets/img/logo.png" alt="Metis Logo" style="width: 100px;">
		                <h5>Cavite State Univeristy</h5>
		        <h3>CVSU-CEIT DIT ONLINE TRACER STUDY</h3>

		    </div>
		    <hr>
		    <div class="text-center">
		        <ul class="list-inline">
		            <li><a class="text-muted " href="#Recovery" data-toggle="tab">New password</a></li>
		        </ul>
		    </div>
		    
		    <hr>
		    <div class="tab-content">
		        <div id="Recovery" class="tab-pane  active">
		            <form  method="POST"  role="form" action="recovery_newpass.php?user=<?php echo $verify_user ?>">
		                <p class="text-muted text-center">
		                  
		                </p>
		                <input type="password" placeholder="New password" class="form-control middle" required="" name="password">
		                <input type="password" placeholder="Re-password" class="form-control bottom" required="" name="re_password">
		                
		                <input class="btn btn-lg btn-danger btn-block"  type="submit" name="validate-answer" value="Submit">

		            </form>
		        </div>

		      

		    </div>
		    <hr>
		    <div class="text-center">
		        <ul class="list-inline">
		            <li><a class="text-muted" href="../index.php" >Go home</a></li>
		        </ul>
		    </div>
		  </div>

		        <nav class="navbar navbar-default navbar-fixed-bottom">
		      <div class="container">

		        <div class="navbar-header">
		          <img src="../assets/img/logo.png" alt=" CvSU Tracer Study" style="width: 40px; margin-top: 6px; ">
		          <a class="navbar-brand" href="#">Tracer Study</a>
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		          <ul class="nav navbar-nav list-inline">
		            <li class="active"><a href="#Recovery" data-toggle="tab">New password</a></li>
		            <li><a href="#" data-toggle="modal" data-target="#objective">Department Objective</a></li>
		            <li><a href="#" data-toggle="modal" data-target="#goal">Department Goal</a></li>
		            <li><a href="#" data-toggle="modal" data-target="#Overview">Overview</a></li>
		          </ul>
		          </div><!--/.nav-collapse -->
		      </div>
		      <div class="bg-dark dker">
		      <center>
		          CVSU-CEIT DIT ONLINE TRACER STUDY <br>
		All Rights Reserved<br>Copyright 2017
		      </center>
		      </div>

		    </nav>
		    <!--jQuery -->
		    <?php 
		    include('../modal.php');
		    ?>
		    <script src="../assets/lib/jquery/jquery.js"></script>

		    <!--Bootstrap -->
		    <script src="../assets/lib/bootstrap/js/bootstrap.js"></script>



		</body>

		</html>



    	<?php
    }
    else
    {
		echo "<script>alert('Answer is wrong!');
			window.history.back();
		</script>";

    }
  }

}
}
//if post is not submited and olny type on the url
else
{

  echo "<script>alert('!');
      window.location='../index.php';
    </script>";

}

?>
