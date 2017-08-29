<?php 
if(isset($_SESSION['login_user']))
{           
            $user=$_SESSION['login_user'];// passing the session user to new user variable
            $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $db = mysql_select_db("tracerdata", $connection);// Selecting Database
            $query = mysql_query("SELECT * FROM `user_account` WHERE `user_name`= '$user'", $connection); //SQL query to fetch information of registerd users and finds user match.
            $rows = mysql_fetch_assoc($query);
                if ($rows['user_level'] == '1') //checking if acclevel is equal to 0
                {   
                    header("location: dashboard.php");// retain to admin level 
                }
                elseif ($rows['user_level'] == '2')  //checking if acclevel is equal to 1
                {
                   
                    header("location: dashboard.php"); // retain to student Level
                    
                } 
                elseif ($rows['user_level'] == '3')  //checking if acclevel is equal to 2
                {
                     header("location: dashboard.php"); // retain to teacher Level
                }
                else
                {

                }
    
            
}

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
    <title>Login Page</title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">
    
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">
    
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">
    
    <!-- onoffcanvas stylesheet -->
    <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">
    
    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="assets/lib/animate.css/animate.css">


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
    </style>

</head>
<body class="login custombody" >

    <div class="form-signin">
    <div class="text-center">
        <img src="assets/img/logo.png" alt="Metis Logo" style="width: 100px;">

    </div>

    <hr>

    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted " href="#login-student" data-toggle="tab">Login as Student</a></li> |
            <li><a class="text-muted" href="#login-teacher" data-toggle="tab">Login as Teacher</a></li>
        </ul>
    </div>
    <hr>
    <div class="tab-content">
        <div id="login-student" class="tab-pane active">
            <form  method="POST" action="action/login_action.php" role="form">
                <p class="text-muted text-center">
                    Enter your username and password
                </p>
                <input name="username" type="text" placeholder="Student Number" class="form-control top">
                <input name="password" type="password" placeholder="Password" class="form-control bottom">
                <div class="checkbox">
		  <label>
		    <input type="checkbox"> Remember Me
		  </label>
		</div>
                
                <input class="btn btn-lg btn-primary btn-block"  type="submit" name="submit-student" value="Sign in">

            </form>
        </div>
        <div id="login-teacher" class="tab-pane ">
            <form method="POST" action="action/login_action.php" role="form">
                <p class="text-muted text-center">
                    Enter your username and password
                </p>
                <input name="username" type="text" placeholder="Username" class="form-control top">
                <input name="password" type="password" placeholder="Password" class="form-control bottom">
                <div class="checkbox">
          <label>
            <input type="checkbox"> Remember Me
          </label>
        </div>
                 <input class="btn btn-lg btn-primary btn-block"  type="submit" name="submit-teacher" value="Sign in">
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="action/recovery_action.php">
                <p class="text-muted text-center">Enter your valid e-mail</p>
                <input type="email" placeholder="mail@domain.com" class="form-control">
                <br>
                <input class="btn btn-lg btn-danger btn-block" type="submit" name="submit" value="Recover Password">
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="action/register_action.php">
                <input type="text" placeholder="username" class="form-control top">
                <input type="email" placeholder="mail@domain.com" class="form-control middle">
                <input type="password" placeholder="password" class="form-control middle">
                <input type="password" placeholder="re-password" class="form-control bottom">
                <input class="btn btn-lg btn-success btn-block"  type="submit" name="submit" value="Register">
            </form>
        </div>

    </div>
    <hr>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
        </ul>
    </div>
  </div>

    <!--jQuery -->
    <script src="assets/lib/jquery/jquery.js"></script>

    <!--Bootstrap -->
    <script src="assets/lib/bootstrap/js/bootstrap.js"></script>


    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $('.list-inline li > a').click(function() {
                    var activeForm = $(this).attr('href') + ' > form';
                    //console.log(activeForm);
                    $(activeForm).addClass('animated fadeIn');
                    //set timer to 1 seconds, after that, unload the animate animation
                    setTimeout(function() {
                        $(activeForm).removeClass('animated fadeIn');
                    }, 1000);
                });
            });
        })(jQuery);


    </script>

</body>

</html>
