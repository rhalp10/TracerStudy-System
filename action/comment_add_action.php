<?php 

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect('localhost','root','','tracerdata') or die("ERROR");

if (isset($_POST['submit'])) {
	$comment = $_POST['comment']
	$owner = $id ; 
	mysqli_query("INSERT INTO comment () VALUES (id,comment,owner)");
}
?>