<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM user_student_detail WHERE student_fName LIKE '". $_POST["keyword"] ."%' or student_lname LIKE '". $_POST["keyword"] ."%' ORDER BY student_fName and student_lname LIMIT 0,6";
$result = $db_handle->runQuery($query);

$query1 ="SELECT * FROM user_teacher_detail WHERE teacher_fName like '" . $_POST["keyword"] . "%' or teacher_lName LIKE '". $_POST["keyword"] ."%' ORDER BY teacher_fName and teacher_lName LIMIT 0,6";
$result1 = $db_handle->runQuery($query1);

$query2 ="SELECT * FROM user_admin_detail WHERE admin_fName like '" . $_POST["keyword"] . "%' or admin_lName LIKE '". $_POST["keyword"] ."%' ORDER BY admin_fName and admin_lName LIMIT 0,6";
$result2 = $db_handle->runQuery($query2);
if(!empty($result))
 {
?>
<ul id="name-list">
<?php
foreach($result as $user_student_detail) {
?>
<li onClick="selectName('<?php echo $user_student_detail["student_fName"]." ".$user_student_detail["student_lName"]; ?>');"><?php echo $user_student_detail["student_fName"]." ".$user_student_detail["student_lName"]; ?></li>
<?php } ?>
</ul>
<?php 

}
if(!empty($result1))
 {
?>
<ul id="name-list">
<?php
foreach($result1 as $user_teacher_detail) {
?>
<li onClick="selectName('<?php echo $user_teacher_detail["teacher_fName"]." ".$user_teacher_detail["teacher_lName"]; ?>');"><?php echo $user_teacher_detail["teacher_fName"]." ".$user_teacher_detail["teacher_lName"]; ?></li>
<?php } ?>
</ul>
<?php 

}if(!empty($result2))
 {
?>
<ul id="name-list">
<?php
foreach($result2 as $user_admin_detail) {
?>
<li onClick="selectName('<?php echo $user_admin_detail["admin_fName"]." ".$user_admin_detail["admin_lName"]; ?>');"><?php echo $user_admin_detail["admin_fName"]." ".$user_admin_detail["admin_lName"]; ?></li>
<?php } ?>
</ul>
<?php 

}

} ?>