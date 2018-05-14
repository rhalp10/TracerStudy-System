
<?php 
include('session.php'); 
include('db.php');

$survey_maxcount_qry = mysqli_query($con,"SELECT survey_maxattemp FROM `survey_maxcount` WHERE survey_ownerID = '$login_id'");
$survey_maxattemp = mysqli_fetch_array($survey_maxcount_qry);
$page = 'dashboard';

if ($login_level == '1')
{
    $result = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['student_img']; 
}
else if ($login_level == '2')
{
    $result = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE teacher_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['teacher_img']; 
}
else if ($login_level == '3')
{
    $result = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE admin_userID = $login_id");
    $data = mysqli_fetch_array($result);
    $data_img = $data['admin_img']; 
}
else
{
}

class json
    {
     public $value = 0;
     function EncodeParsing($parse){
        $j_encode = json_encode($parse);
        return $j_encode;
      }
     function DataCount($count){

        $total_count = mysqli_num_rows($count);
        return $total_count;
      }
     function DataCountPercent($countVal, $totalCount){
      $dataCount_Percent = (($countVal / $totalCount) * 100);

    return $dataCount_Percent;
    }   

     function stackValue($val)
      {
          $this->value += $val;
      }
     
     function getSum()
      {
          return $this->value . "<br />";
      }
     function addtoString($str, $item) {
    $parts = explode(',', $str);
    $parts[] = $item;

    return implode(',', $parts);
    }
 

   
    }
    $json = new json();
if (isset($_GET['category'])) {
	$category = $_GET['category'];
}
else{
	$category = '';
}
if (isset($_GET['graph'])) {
	$graph = $_GET['graph'];
}
else{
	$graph = '';
}


if (isset($_GET['date'])) {
	$date = $_GET['date'];
	if ($date =='') {
		
		 $date_echo = 'All';
		$date = '';
	}
	else{

		 $date_echo =  date("M , Y", strtotime($date));
	}
}


if ($category == 'accountregister')  {
	$totalresult_ofStudent = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'register'");
$totalresult_ofTeacher = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'register'");
$totalresult_ofAdmin = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'register'");

$totalAcc_register_asStudent = $json->DataCount($totalresult_ofStudent);
$totalAcc_register_asTeacher = $json->DataCount($totalresult_ofTeacher);
$totalAcc_register_asAdmin = $json->DataCount($totalresult_ofAdmin);
}
if ($category == 'accountununregister')  {
	$totalresult_ofStudent = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'unregister'");
$totalresult_ofTeacher = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'unregister'");
$totalresult_ofAdmin = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'unregister'");

$totalAcc_unregister_asStudent = $json->DataCount($totalresult_ofStudent);
$totalAcc_unregister_asTeacher = $json->DataCount($totalresult_ofTeacher);
$totalAcc_unregister_asAdmin = $json->DataCount($totalresult_ofAdmin);

// $totalAcc_unregister_asStudent = $json->EncodeParsing($totalAcc_unregister_asStudent);
// $totalAcc_unregister_asTeacher = $json->EncodeParsing($totalAcc_unregister_asTeacher);
// $totalAcc_unregister_asAdmin = $json->EncodeParsing($totalAcc_unregister_asAdmin);
}
if ($category == 'purdegres' ) {

$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS1' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD1' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 1 AND sf.form_taken LIKE '$date%'
");
$r1 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS2' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD2' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 2 AND sf.form_taken LIKE '$date%'
");
$r2 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS3' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD3' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 3 AND sf.form_taken LIKE '$date%'
");
$r3 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS4' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD4' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 4 AND sf.form_taken LIKE '$date%'
");
$r4 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS5' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD5' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 5 AND sf.form_taken LIKE '$date%'
");
$r5 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS6' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD6' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 6 AND sf.form_taken LIKE '$date%'
");
$r6 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS7' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD7' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 7 AND sf.form_taken LIKE '$date%'
");
$r7 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS8' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD8' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 8 AND sf.form_taken LIKE '$date%'
");;
$r8 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS9' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD9' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 9 AND sf.form_taken LIKE '$date%'
");
$r9 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS10' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD10' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 10 AND sf.form_taken LIKE '$date%'
");
$r10 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS11' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD11' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 11 AND sf.form_taken LIKE '$date%'
");
$r11 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS12' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD12' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 12 AND sf.form_taken LIKE '$date%'
");
$r12 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS13' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD13' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 13 AND sf.form_taken LIKE '$date%'
");
$r13 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq1.col1='' THEN 1 ELSE 0 END) as totalcol1_UndergraduateNo,
SUM(CASE WHEN sq1.col2='' THEN 1 ELSE 0 END) as totalcol2_GraduateNo,
SUM(CASE WHEN sq1.col1='U_AB_BS14' THEN 1 ELSE 0 END) as totalcol1_UndergraduateChk,
SUM(CASE WHEN sq1.col2='G_MS_MA_PHD14' THEN 1 ELSE 0 END) as totalcol2_GraduateChk  
FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 14 AND sf.form_taken LIKE '$date%'
");
$r14 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT SUM(CASE WHEN sq1.col1='other' AND sq1.col2!='' THEN 1 ELSE 0 END) as totalanswer,SUM(CASE WHEN sq1.col1='other' AND sq1.col2='' THEN 1 ELSE 0 END) as totalunanswer FROM survey_question1 sq1 INNER JOIN survey_forms sf ON sq1.survey_formID = sf.form_id WHERE `row` = 15 AND sf.form_taken  LIKE '$date%'
");
$r15 = mysqli_fetch_array($sql);
$total = (
$r1['totalcol1_UndergraduateChk'] +
$r1['totalcol1_UndergraduateNo'] +
$r1['totalcol2_GraduateChk'] +
$r1['totalcol2_GraduateNo'] +
$r2['totalcol1_UndergraduateChk'] +
$r2['totalcol1_UndergraduateNo'] +
$r2['totalcol2_GraduateChk'] +
$r2['totalcol2_GraduateNo'] +
$r3['totalcol1_UndergraduateChk'] +
$r3['totalcol1_UndergraduateNo'] +
$r3['totalcol2_GraduateChk'] +
$r3['totalcol2_GraduateNo'] +
$r4['totalcol1_UndergraduateChk'] +
$r4['totalcol1_UndergraduateNo'] +
$r4['totalcol2_GraduateChk'] +
$r4['totalcol2_GraduateNo'] +
$r5['totalcol1_UndergraduateChk'] +
$r5['totalcol1_UndergraduateNo'] +
$r5['totalcol2_GraduateChk'] +
$r5['totalcol2_GraduateNo'] +
$r6['totalcol1_UndergraduateChk'] +
$r6['totalcol1_UndergraduateNo'] +
$r6['totalcol2_GraduateChk'] +
$r6['totalcol2_GraduateNo'] +
$r7['totalcol1_UndergraduateChk'] +
$r7['totalcol1_UndergraduateNo'] +
$r7['totalcol2_GraduateChk'] +
$r7['totalcol2_GraduateNo'] +
$r8['totalcol1_UndergraduateChk'] +
$r8['totalcol1_UndergraduateNo'] +
$r8['totalcol2_GraduateChk'] +
$r8['totalcol2_GraduateNo'] +
$r9['totalcol1_UndergraduateChk'] +
$r9['totalcol1_UndergraduateNo'] +
$r9['totalcol2_GraduateChk'] +
$r9['totalcol2_GraduateNo'] +
$r10['totalcol1_UndergraduateChk'] +
$r10['totalcol1_UndergraduateNo'] +
$r10['totalcol2_GraduateChk'] +
$r10['totalcol2_GraduateNo'] +
$r11['totalcol1_UndergraduateChk'] +
$r12['totalcol1_UndergraduateNo'] +
$r13['totalcol2_GraduateChk'] +
$r14['totalcol2_GraduateNo'] +
$r15['totalanswer'] +
$r15['totalunanswer']
);
 $total;
// $r1_p = array();
// $r2_p = array();
// $r3_p = array();
// $r4_p = array();
// $r5_p = array();
// $r6_p = array();
// $r7_p = array();
// $r8_p = array();
// $r9_p = array();
// $r10_p = array();
// $r11_p = array();
// $r12_p = array();
// $r13_p = array();
// $r14_p = array();
// $r15_p = array();
$r1_1 = $r1['totalcol1_UndergraduateChk'];
$r1_2 = $r1['totalcol1_UndergraduateNo'];
$r1_3 = $r1['totalcol2_GraduateChk'];
$r1_4 = $r1['totalcol2_GraduateNo'];


$r2_1 = $r2['totalcol1_UndergraduateChk'];
$r2_2 = $r2['totalcol1_UndergraduateNo'];
$r2_3 = $r2['totalcol2_GraduateChk'];
$r2_4 = $r2['totalcol2_GraduateNo'];

$r3_1 = $r3['totalcol1_UndergraduateChk'];
$r3_2 = $r3['totalcol1_UndergraduateNo'];
$r3_3 = $r3['totalcol2_GraduateChk'];
$r3_4 = $r3['totalcol2_GraduateNo'];

$r4_1 = $r4['totalcol1_UndergraduateChk'];
$r4_2 = $r4['totalcol1_UndergraduateNo'];
$r4_3 = $r4['totalcol2_GraduateChk'];
$r4_4 = $r4['totalcol2_GraduateNo'];

$r5_1 = $r5['totalcol1_UndergraduateChk'];
$r5_2 = $r5['totalcol1_UndergraduateNo'];
$r5_3 = $r5['totalcol2_GraduateChk'];
$r5_4 = $r5['totalcol2_GraduateNo'];

$r6_1 = $r6['totalcol1_UndergraduateChk'];
$r6_2 = $r6['totalcol1_UndergraduateNo'];
$r6_3 = $r6['totalcol2_GraduateChk'];
$r6_4 = $r6['totalcol2_GraduateNo'];

$r7_1 = $r7['totalcol1_UndergraduateChk'];
$r7_2 = $r7['totalcol1_UndergraduateNo'];
$r7_3 = $r7['totalcol2_GraduateChk'];
$r7_4 = $r7['totalcol2_GraduateNo'];

$r8_1 = $r8['totalcol1_UndergraduateChk'];
$r8_2 = $r8['totalcol1_UndergraduateNo'];
$r8_3 = $r8['totalcol2_GraduateChk'];
$r8_4 = $r8['totalcol2_GraduateNo'];

$r9_1 = $r9['totalcol1_UndergraduateChk'];
$r9_2 = $r9['totalcol1_UndergraduateNo'];
$r9_3 = $r9['totalcol2_GraduateChk'];
$r9_4 = $r9['totalcol2_GraduateNo'];

$r10_1 = $r10['totalcol1_UndergraduateChk'];
$r10_2 = $r10['totalcol1_UndergraduateNo'];
$r10_3 = $r10['totalcol2_GraduateChk'];
$r10_4 = $r10['totalcol2_GraduateNo'];

$r11_1 = $r11['totalcol1_UndergraduateChk'];
$r11_2 = $r11['totalcol1_UndergraduateNo'];
$r11_3 = $r11['totalcol2_GraduateChk'];
$r11_4 = $r11['totalcol2_GraduateNo'];

$r12_1 = $r12['totalcol1_UndergraduateChk'];
$r12_2 = $r12['totalcol1_UndergraduateNo'];
$r12_3 = $r12['totalcol2_GraduateChk'];
$r12_4 = $r12['totalcol2_GraduateNo'];

$r13_1 = $r13['totalcol1_UndergraduateChk'];
$r13_2 = $r13['totalcol1_UndergraduateNo'];
$r13_3 = $r13['totalcol2_GraduateChk'];
$r13_4 = $r13['totalcol2_GraduateNo'];

$r14_1 = $r14['totalcol1_UndergraduateChk'];
$r14_2 = $r14['totalcol1_UndergraduateNo'];
$r14_3 = $r14['totalcol2_GraduateChk'];
$r14_4 = $r14['totalcol2_GraduateNo'];


$r15_totalanswer = $r15['totalanswer'];
$r15_totalunanswer = $r15['totalunanswer'];


}
if ($category == 'acceptingjobreason') {
$sql = mysqli_query($con,"
SELECT SUM(CASE WHEN sq2.survey_col1='yes' THEN 1 ELSE 0 END) as totalyes,SUM(CASE WHEN sq2.survey_col1='no' THEN 1 ELSE 0 END) as totalno FROM survey_question2 sq2 INNER JOIN survey_forms sf ON sq2.survey_formID = sf.form_id WHERE `survey_row1` = 1 AND sf.form_taken  LIKE '$date%'
");
$r1 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT SUM(CASE WHEN sq2.survey_col1='yes' THEN 1 ELSE 0 END) as totalyes,SUM(CASE WHEN sq2.survey_col1='no' THEN 1 ELSE 0 END) as totalno FROM survey_question2 sq2 INNER JOIN survey_forms sf ON sq2.survey_formID = sf.form_id WHERE `survey_row1` = 2 AND sf.form_taken  LIKE '$date%'
");
$r2 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT SUM(CASE WHEN sq2.survey_col1='yes' THEN 1 ELSE 0 END) as totalyes,SUM(CASE WHEN sq2.survey_col1='no' THEN 1 ELSE 0 END) as totalno FROM survey_question2 sq2 INNER JOIN survey_forms sf ON sq2.survey_formID = sf.form_id WHERE `survey_row1` = 3 AND sf.form_taken  LIKE '$date%'
");
$r3 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT SUM(CASE WHEN sq2.survey_col1='yes' THEN 1 ELSE 0 END) as totalyes,SUM(CASE WHEN sq2.survey_col1='no' THEN 1 ELSE 0 END) as totalno FROM survey_question2 sq2 INNER JOIN survey_forms sf ON sq2.survey_formID = sf.form_id WHERE `survey_row1` = 4 AND sf.form_taken  LIKE '$date%'
");
$r4 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT SUM(CASE WHEN sq2.survey_col1!='' THEN 1 ELSE 0 END) as totalyes,SUM(CASE WHEN sq2.survey_col1='' THEN 1 ELSE 0 END) as totalno FROM survey_question2 sq2 INNER JOIN survey_forms sf ON sq2.survey_formID = sf.form_id WHERE `survey_row1` = 5 AND sf.form_taken  LIKE '$date%'
");
$r5 = mysqli_fetch_array($sql);
// echo "<H1>$category</H1>";
// echo "<br>";
// echo "Salaries and benefits: yes:".$r1['totalyes']."NO:".$r1['totalno'];
// echo "<br>";
// echo "Career challenge: yes:".$r2['totalyes']."NO:".$r1['totalno'];
// echo "<br>";
// echo "Related to special skills: yes:".$r3['totalyes']."NO:".$r1['totalno'];
// echo "<br>";
// echo "Proximity to residence: yes:".$r4['totalyes']."NO:".$r1['totalno'];
// echo "<br>";
// echo "Others, please specify: answer:".$r5['totalyes']."blank:".$r1['totalno'];
// echo "<br>";
}
if ($category == 'grossearning')  {
	echo "<H1>$category</H1>";
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq4.col1=1 THEN 1 ELSE 0 END) aYES, 
SUM(CASE WHEN sq4.col1=0 THEN 1 ELSE 0 END) aNO
FROM survey_question4  sq4
INNER JOIN survey_forms rf ON sq4.survey_formID = rf.form_id 
WHERE row1 = '1' AND rf.form_taken LIKE '$date%'
");
$r1 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq4.col1=1 THEN 1 ELSE 0 END) aYES, 
SUM(CASE WHEN sq4.col1=0 THEN 1 ELSE 0 END) aNO
FROM survey_question4  sq4
INNER JOIN survey_forms rf ON sq4.survey_formID = rf.form_id 
WHERE row1 = '2' AND rf.form_taken LIKE '$date%'
");
$r2 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq4.col1=1 THEN 1 ELSE 0 END) aYES, 
SUM(CASE WHEN sq4.col1=0 THEN 1 ELSE 0 END) aNO
FROM survey_question4  sq4
INNER JOIN survey_forms rf ON sq4.survey_formID = rf.form_id 
WHERE row1 = '3' AND rf.form_taken LIKE '$date%'
");
$r3 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq4.col1=1 THEN 1 ELSE 0 END) aYES, 
SUM(CASE WHEN sq4.col1=0 THEN 1 ELSE 0 END) aNO
FROM survey_question4  sq4
INNER JOIN survey_forms rf ON sq4.survey_formID = rf.form_id 
WHERE row1 = '4' AND rf.form_taken LIKE '$date%'
");
$r4 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq4.col1=1 THEN 1 ELSE 0 END) aYES, 
SUM(CASE WHEN sq4.col1=0 THEN 1 ELSE 0 END) aNO
FROM survey_question4  sq4
INNER JOIN survey_forms rf ON sq4.survey_formID = rf.form_id 
WHERE row1 = '5' AND rf.form_taken LIKE '$date%'
");
$r5 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq4.col1=1 THEN 1 ELSE 0 END) aYES, 
SUM(CASE WHEN sq4.col1=0 THEN 1 ELSE 0 END) aNO
FROM survey_question4  sq4
INNER JOIN survey_forms rf ON sq4.survey_formID = rf.form_id 
WHERE row1 = '6' AND rf.form_taken LIKE '$date%'
");
$r6 = mysqli_fetch_array($sql);

$r1_true =  $r1['aYES'];
$r2_true = $r2['aYES'];
$r3_true =  $r3['aYES'];
$r4_true = $r4['aYES'];
$r5_true = $r5['aYES'];
$r6_true = $r6['aYES'];

$r1_false =  $r1['aNO'];
$r2_false = $r2['aNO'];
$r3_false =  $r3['aNO'];
$r4_false = $r4['aNO'];
$r5_false = $r5['aNO'];
$r6_false = $r6['aNO'];


$total = (

 $r1['aYES']+
$r2['aYES']+
 $r3['aYES']+
$r4['aYES']+
$r5['aYES']+
$r6['aYES']+
  $r1['aNO']+
 $r2['aNO']+
  $r3['aNO']+
 $r4['aNO']+
 $r5['aNO']+
 $r6['aNO']
);
 $r1_true = $json->DataCountPercent($r1_true,$total);
 $r2_true = $json->DataCountPercent($r2_true,$total);
 $r3_true = $json->DataCountPercent($r3_true,$total);
 $r4_true = $json->DataCountPercent($r4_true,$total);
 $r5_true = $json->DataCountPercent($r5_true,$total);
 $r6_true = $json->DataCountPercent($r6_true,$total);
 $total_true_percent = (
$r1_true+
$r2_true+
$r3_true+
$r4_true+
$r5_true+
$r6_true
);
 $r1_false = $json->DataCountPercent($r1_false,$total);
 $r2_false = $json->DataCountPercent($r2_false,$total);
 $r3_false = $json->DataCountPercent($r3_false,$total);
 $r4_false = $json->DataCountPercent($r4_false,$total);
 $r5_false = $json->DataCountPercent($r5_false,$total);
 $r6_false = $json->DataCountPercent($r6_false,$total);
 $total_false_percent = (
$r1_false+
$r2_false+
$r3_false+
$r4_false+
$r5_false+
$r6_false
);

$total_percent = ($total_true_percent + $total_false_percent);

}

if ($category == 'pes') {
	// echo "<H1>$category</H1>";
	$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq6.ans='rop' THEN 1 ELSE 0 END) rop, 
SUM(CASE WHEN sq6.ans='temp' THEN 1 ELSE 0 END) temp, 
SUM(CASE WHEN sq6.ans='cas' THEN 1 ELSE 0 END) cas, 
SUM(CASE WHEN sq6.ans='con' THEN 1 ELSE 0 END) con, 
SUM(CASE WHEN sq6.ans='self' THEN 1 ELSE 0 END) self
FROM survey_question6  sq6
INNER JOIN survey_forms rf ON sq6.survey_formID = rf.form_id 
WHERE rf.form_taken LIKE '$date%'
");
$r1 = mysqli_fetch_array($sql);

}
if ($category == 'joblevelpos') 
{
	$sql = mysqli_query($con,"SELECT SUM(CASE WHEN sq3.col1=1 THEN 1 ELSE 0 END) as totalcol1_FirstJob,SUM(CASE WHEN sq3.col2=1 THEN 1 ELSE 0 END) as totalcol2_Current
FROM survey_question3 sq3
INNER JOIN survey_forms sf ON sq3.survey_formID = sf.form_id 
WHERE `row` = 1 AND sf.form_taken LIKE '$date%'
");
$r1 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"SELECT SUM(CASE WHEN sq3.col1=1 THEN 1 ELSE 0 END) as totalcol1_FirstJob,SUM(CASE WHEN sq3.col2=1 THEN 1 ELSE 0 END) as totalcol2_Current
FROM survey_question3 sq3
INNER JOIN survey_forms sf ON sq3.survey_formID = sf.form_id 
WHERE `row` = 2 AND sf.form_taken LIKE '$date%'
");
$r2 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"SELECT SUM(CASE WHEN sq3.col1=1 THEN 1 ELSE 0 END) as totalcol1_FirstJob,SUM(CASE WHEN sq3.col2=1 THEN 1 ELSE 0 END) as totalcol2_Current
FROM survey_question3 sq3
INNER JOIN survey_forms sf ON sq3.survey_formID = sf.form_id 
WHERE `row` = 3 AND sf.form_taken LIKE '$date%'
");
$r3 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"SELECT SUM(CASE WHEN sq3.col1=1 THEN 1 ELSE 0 END) as totalcol1_FirstJob,SUM(CASE WHEN sq3.col2=1 THEN 1 ELSE 0 END) as totalcol2_Current
FROM survey_question3 sq3
INNER JOIN survey_forms sf ON sq3.survey_formID = sf.form_id 
WHERE `row` = 4 AND sf.form_taken LIKE '$date%'
");
$r4 = mysqli_fetch_array($sql);

}

if ($category == 'relevantjob') {
$sql = mysqli_query($con,"
SELECT 
SUM(CASE WHEN sq7.survey_ans=1 THEN 1 ELSE 0 END) aYES, 
SUM(CASE WHEN sq7.survey_ans=0 THEN 1 ELSE 0 END) aNO
FROM survey_question7  sq7
INNER JOIN survey_forms rf ON sq7.survey_formID = rf.form_id 
WHERE rf.form_taken LIKE '$date%'
");
$r1 = mysqli_fetch_array($sql);
$aYES = $r1['aYES'];
$aNO = $r1['aNO'];
$total = (
$aYES+
$aNO 
);
  $aYES_percent = $json->DataCountPercent($aYES,$total);
   $aNO_percent = $json->DataCountPercent($aNO,$total);


}


if ($category == 'uclfyj') {
	$sql = mysqli_query($con,"SELECT SUM(sq8.col1) sum FROM `survey_question8` sq8
INNER JOIN survey_forms rf ON sq8.survey_formID = rf.form_id 
WHERE sq8.row1 = 1 AND rf.form_taken LIKE '$date%'
");
$r1 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"SELECT SUM(sq8.col1)  sum FROM `survey_question8` sq8
INNER JOIN survey_forms rf ON sq8.survey_formID = rf.form_id 
WHERE sq8.row1 = 2 AND rf.form_taken LIKE '$date%'
");
$r2 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"SELECT SUM(sq8.col1)  sum FROM `survey_question8` sq8
INNER JOIN survey_forms rf ON sq8.survey_formID = rf.form_id 
WHERE sq8.row1 = 3 AND rf.form_taken LIKE '$date%'
");
$r3 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"SELECT SUM(sq8.col1)  sum FROM `survey_question8` sq8
INNER JOIN survey_forms rf ON sq8.survey_formID = rf.form_id 
WHERE sq8.row1 = 4 AND rf.form_taken LIKE '$date%'
");
$r4 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"SELECT SUM(sq8.col1)  sum FROM `survey_question8` sq8
INNER JOIN survey_forms rf ON sq8.survey_formID = rf.form_id 
WHERE sq8.row1 = 5 AND rf.form_taken LIKE '$date%'
");
$r5 = mysqli_fetch_array($sql);
$sql = mysqli_query($con,"SELECT SUM(CASE WHEN sq8.col1!='' THEN 1 ELSE 0 END)  sum FROM `survey_question8` sq8
INNER JOIN survey_forms rf ON sq8.survey_formID = rf.form_id 
WHERE sq8.row1 = 6 AND rf.form_taken");
$r6 = mysqli_fetch_array($sql);


}


?>


<!DOCTYPE html>
<html>  
  <head>
    <?php include('meta.php');?>
    <?php include('style_css.php');?>
    <title>Dashboard</title>
  </head>
        <body class=" menu-affix">
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <?php include ('top_navbar.php');?>
                </div>
                <!-- /#top -->
                    <?php  
                    if ($login_level == '1')
                    {
                        include('sidebar_student.php');
                    }
                    else if ($login_level == '2')
                    {
                        include('sidebar_teacher.php');
                    }
                    else if ($login_level == '3')
                    {
                        include('sidebar_admin.php');
                    }
                    else
                    {
                    }
                    ?>                    
                      <!-- /#left -->
                <div id="content">

                    <div class="outer" id="outer">
                        <header class="head">
                            <div class="main-bar">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                              <li class="breadcrumb-item active"> Statistics</li>
                            </ol>
                            </div>
                            <!-- /.main-bar -->
                        </header>

                        <div class="inner bg-light lter">
                          <div id="zxc"></div>
                  
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->

                    <!-- /#right -->
            </div>

            <!-- /#wrap -->
            <?php include('footer.php');?>
            <!-- /#footer -->
            <?php include ('script.php');?>
            
    <script type="text/javascript">
                    $("#zxc").load('try2.php');
                  </script>
        </body>

</html>
