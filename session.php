<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("tracerdata", $connection);
session_start(); // Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = mysql_query("SELECT user_name,user_level,user_ID FROM user_account WHERE user_name='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session = $row['user_name'];
$login_level = $row['user_level'];
$login_id = $row['user_ID'];
if (!isset($login_session))
{
  mysql_close($connection); // Closing Connection
  header('Location: index.php'); // Redirecting To Home Page
}

?>