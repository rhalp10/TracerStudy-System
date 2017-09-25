<?php 

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");

$id = $_REQUESTP['ID'];
mysqli_query("DELETE * FROM post where post_id = '$id'");

?>