<?php

$uname = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];

$con1 = mysqli_connect('localhost','root','','chatbox');

mysqli_query($con1,"INSERT INTO logs (`username`, `msg`) VALUES ('$uname', '$msg')");

$result1 = mysqli_query($con1,"SELECT * FROM logs ORDER BY id DESC");

while($extract = mysqli_fetch_array($result1)) {
	echo "<div class='msg_container'><div class='msg_detail'><div>" . $extract['username'] .": " . $extract['msg'] . "</div></div></div><br />";

}