<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit-student'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) 
			{
				echo "<script>alert('Student Number or Password is empty !');
										window.location='../index.php';
									</script>";
				// Change this to bootstrap alert
			
			}
		
		else
		{
			login();
			
		}
}
if (isset($_POST['submit-teacher'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) 
			{
				echo "<script>alert('Username or Password is empty !');
										window.location='../index.php';
									</script>";
				// Change this to bootstrap alert
			
			}
		
		else
		{
			login();
		}
}

function login(){

	// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$connection = mysql_connect("localhost", "root", "");
			// Selecting Database
			$db = mysql_select_db("tracerdata", $connection);

 			$input = "$password";
			include('../md5.php');
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("SELECT * FROM `user_account` WHERE `user_name` = '$username' AND `user_password` = '$encrypted'", $connection);
			$rows = mysql_fetch_assoc($query);
			
				if ($rows['user_level'] == '0') 
				{	
					$_SESSION['login_user']=$username; // Initializing Session

					header("location: ../dashboard.php"); //go to dashboard
				} 
				elseif ($rows['user_level'] == '1') 
				{
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: ../dashboard.php"); //go to dashboard
					
				} 
				elseif ($rows['user_level'] == '2') 
				{
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: ../dashboard.php"); //go to dashboard
				} 
				elseif ($rows['user_level'] == '3') 
				{
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: ../dashboard.php"); //go to dashboard
				} 
				else 
				{
					echo "<script>alert('Access Denied!	');
										window.location='../index.php';
									</script>";
					include('alert/success.php');
									// Change this to bootstrap alert
				}
			mysql_close($connection); // Closing Connection
}




?>