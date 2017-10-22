<?php 

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");
$stat = $_REQUEST['stat'];
$stat = stripslashes($stat);
$stat = mysqli_real_escape_string($con,$stat);

?>