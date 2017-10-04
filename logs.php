<?php
$login_id=1;
$con1 = mysqli_connect('localhost','root','','chatbox');

$result1 = mysqli_query($con1,"SELECT * FROM logs ORDER BY id DESC");

while($extract = mysqli_fetch_array($result1)) {
	// if userid login session is  equal to login owner thread id
	// the color will become blue
	if ($login_id == 1) {
		$class = "class='msg_owner msg_container'";
	}
	else
	{
		$class = "echo 'class='msg_container''";
	}
	echo "<div $class><div class='msg_detail'><div>" . $extract['username'] .": " . $extract['msg'] . "</div></div></div><br />";
}