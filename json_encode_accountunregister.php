<?php 

$totalresult_ofStudent_unregister = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'unregister'");
$totalAcc_unregister_asStudent = mysqli_num_rows($totalresult_ofStudent_unregister);

$totalresult_ofTeacher_unregister = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'unregister'");
$totalAcc_unregister_asTeacher = mysqli_num_rows($totalresult_ofTeacher_unregister);

$totalresult_ofAdmin_unregister = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'unregister'");
$totalAcc_unregister_asAdmin = mysqli_num_rows($totalresult_ofAdmin_unregister);

$totalAcc_unregister = ($totalAcc_unregister_asStudent + $totalAcc_unregister_asTeacher + $totalAcc_unregister_asAdmin);

$StudentPercentage_unregister = $totalAcc_unregister_asStudent; 
$TeacherPercentage_unregister = $totalAcc_unregister_asTeacher; 
$AdminPercentage_unregister = $totalAcc_unregister_asAdmin; 

$StudentPercentage_UnRegisterJS="$StudentPercentage_unregister";
$js_outStudent_UnRegister = json_encode($StudentPercentage_UnRegisterJS);

$TeacherPercentage_UnRegisterJS="$TeacherPercentage_unregister";
$js_outTeacher_UnRegister = json_encode($TeacherPercentage_UnRegisterJS);

$AdminPercentage_UnRegisterJS="$AdminPercentage_unregister";
$js_outAdmin_UnRegister = json_encode($AdminPercentage_UnRegisterJS);
?>




