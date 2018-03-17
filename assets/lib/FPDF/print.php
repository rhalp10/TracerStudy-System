<?php
require('fpdf.php');
include('db.php');
// $req_course = $_REQUEST['course'];
//$req_year  = $_REQUEST['year'];



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

class PDF extends FPDF{
	function Header(){
 
		
		

	}
	function Chapter(){

	}
	function Mybody(){

	}
	function Layout(){

	}
	function footer(){
		// Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','',8);
	    // Page number
	    $this->Cell(0,10,$this->PageNo(),0,0,'R');
	}
}

$json = new json;
if (isset($_GET['category'])) {
	$category = $_GET['category'];
}
if (isset($_GET['graph'])) {
	$graph = $_GET['graph'];
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

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../../img/logo.png',25,6,20);
$pdf->SetFont('Times','B',15);
$pdf->Cell(80);
$pdf->Cell(30,10,'CvSU - CEIT DIT ONLINE TRACER STUDY',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,'Total Register Account Report',0,1,'C');
$pdf->Ln(20);
$pdf->SetFont('Times','B',9);
$pdf->Cell(100,10,'User',1,0,'C');
$pdf->Cell(0,10,'Total',1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(100,10,'Student',1,0,'C');
$pdf->Cell(0,10,$totalAcc_register_asStudent,1,1,'C');
$pdf->Cell(100,10,'Teacher',1,0,'C');
$pdf->Cell(0,10,$totalAcc_register_asTeacher,1,1,'C');
$pdf->Cell(100,10,'Admin',1,0,'C');
$pdf->Cell(0,10,$totalAcc_register_asAdmin,1,1,'C');


$pdf->Output();
}
if ($category == 'accountununregister')  {
	$totalresult_ofStudent = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE `student_status` = 'unregister'");
$totalresult_ofTeacher = mysqli_query($con,"SELECT * FROM `user_teacher_detail` WHERE `teacher_status` = 'unregister'");
$totalresult_ofAdmin = mysqli_query($con,"SELECT * FROM `user_admin_detail` WHERE `admin_status` = 'unregister'");

$totalAcc_register_asStudent = $json->DataCount($totalresult_ofStudent);
$totalAcc_register_asTeacher = $json->DataCount($totalresult_ofTeacher);
$totalAcc_register_asAdmin = $json->DataCount($totalresult_ofAdmin);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../../img/logo.png',25,6,20);
$pdf->SetFont('Times','B',15);
$pdf->Cell(80);
$pdf->Cell(30,10,'CvSU - CEIT DIT ONLINE TRACER STUDY',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,'Total Unregister Account Report',0,1,'C');
$pdf->Ln(20);
$pdf->SetFont('Times','B',9);
$pdf->Cell(100,10,'User',1,0,'C');
$pdf->Cell(0,10,'Total',1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(100,10,'Student',1,0,'C');
$pdf->Cell(0,10,$totalAcc_register_asStudent,1,1,'C');
$pdf->Cell(100,10,'Teacher',1,0,'C');
$pdf->Cell(0,10,$totalAcc_register_asTeacher,1,1,'C');
$pdf->Cell(100,10,'Admin',1,0,'C');
$pdf->Cell(0,10,$totalAcc_register_asAdmin,1,1,'C');


$pdf->Output();
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


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../../img/logo.png',25,6,20);
$pdf->SetFont('Times','B',15);
$pdf->Cell(80);
$pdf->Cell(30,10,'CvSU - CEIT DIT ONLINE TRACER STUDY',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,'Reason (s) for taking the course (s) Report',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,$date_echo,0,0,'C');
$pdf->Ln(20);
$pdf->SetFont('Times','B',9);
$pdf->Cell(100,10,'Reason (s) for taking the course (s)',1,0,'C');
$pdf->Cell(40,5,'Undergraduate/AB/BS',1,0,'C');
$pdf->Cell(0,5,'Graduate/MS/MA/Ph.D.',1,1,'C');
$pdf->Cell(100,5,'',0,0,'C');
$pdf->Cell(20,5,'Answered',1,0,'C');
$pdf->Cell(20,5,'Un-Answered',1,0,'C');
$pdf->Cell(20,5,'Answered',1,0,'C');
$pdf->Cell(0,5,'Un-Answered',1,1,'C');
$pdf->SetFont('Arial','',9);

$pdf->Cell(100,10,'High Grades in the course or subject area (s) related to the course',1,0,'C');
$pdf->Cell(20,10,$r1['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r1['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r1['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r1['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Good grades in high school',1,0,'C');
$pdf->Cell(20,10,$r2['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r2['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r2['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r2['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Influence of parents or relatives',1,0,'C');
$pdf->Cell(20,10,$r3['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r3['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r3['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r3['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Peer Influence',1,0,'C');
$pdf->Cell(20,10,$r4['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r4['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r4['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r4['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Inspired by a role model',1,0,'C');
$pdf->Cell(20,10,$r5['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r5['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r5['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r5['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Strong passion for the profession',1,0,'C');
$pdf->Cell(20,10,$r6['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r6['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r6['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r6['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Prospect for immediate employment',1,0,'C');
$pdf->Cell(20,10,$r7['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r7['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r7['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r7['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Status or prestige of the profession',1,0,'C');
$pdf->Cell(20,10,$r8['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r8['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r8['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r8['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Availability of course offering in chosen institution',1,0,'C');
$pdf->Cell(20,10,$r9['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r9['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r9['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r9['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Prospect of career advancement',1,0,'C');
$pdf->Cell(20,10,$r10['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r10['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r10['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r10['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Affordable for the family',1,0,'C');
$pdf->Cell(20,10,$r11['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r11['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r11['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r11['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Prospect of attractive compensation',1,0,'C');
$pdf->Cell(20,10,$r12['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r12['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r12['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r12['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Opportunity for employment abroad',1,0,'C');
$pdf->Cell(20,10,$r13['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r13['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r13['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r13['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'No particular choice or no better idea',1,0,'C');
$pdf->Cell(20,10,$r14['totalcol1_UndergraduateChk'],1,0,'C');
$pdf->Cell(20,10,$r14['totalcol1_UndergraduateNo'],1,0,'C');
$pdf->Cell(20,10,$r14['totalcol2_GraduateChk'],1,0,'C');
$pdf->Cell(0,10,$r14['totalcol2_GraduateNo'],1,1,'C');

$pdf->Cell(100,10,'Others, please specify',1,0,'C');
$pdf->Cell(40,10,"Answered:".$r15['totalanswer'],1,0,'C');
$pdf->Cell(0,10,"Unanswered:".$r15['totalunanswer'],1,1,'C');
$pdf->Output();
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

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../../img/logo.png',25,6,20);
$pdf->SetFont('Times','B',15);
$pdf->Cell(80);
$pdf->Cell(30,10,'CvSU - CEIT DIT ONLINE TRACER STUDY',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,'Accepting Job Reason Report',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,$date_echo,0,0,'C');
$pdf->Ln(20);
$pdf->SetFont('Times','B',9);
$pdf->Cell(100,10,'Reason',1,0,'C');
$pdf->Cell(30,10,'Answered',1,0,'C');
$pdf->Cell(0,10,'Un-answered',1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(100,10,'Salaries and benefits',1,0,'C');
$pdf->Cell(30,10,$r1['totalyes'],1,0,'C');
$pdf->Cell(0,10,$r1['totalno'],1,1,'C');
$pdf->Cell(100,10,'Career challenge',1,0,'C');
$pdf->Cell(30,10,$r2['totalyes'],1,0,'C');
$pdf->Cell(0,10,$r2['totalno'],1,1,'C');
$pdf->Cell(100,10,'Related to special skills',1,0,'C');
$pdf->Cell(30,10,$r3['totalyes'],1,0,'C');
$pdf->Cell(0,10,$r3['totalno'],1,1,'C');
$pdf->Cell(100,10,'Proximity to residence',1,0,'C');
$pdf->Cell(30,10,$r4['totalyes'],1,0,'C');
$pdf->Cell(0,10,$r4['totalno'],1,1,'C');
$pdf->Cell(100,10,'Other reason(s)',1,0,'C');
$pdf->Cell(30,10,$r5['totalyes'],1,0,'C');
$pdf->Cell(0,10,$r5['totalno'],1,1,'C');
$pdf->Output();
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
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../../img/logo.png',25,6,20);
$pdf->SetFont('Times','B',15);
$pdf->Cell(80);
$pdf->Cell(30,10,'CvSU - CEIT DIT ONLINE TRACER STUDY',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,'Job Level Position Report',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,$date_echo,0,0,'C');
$pdf->Ln(20);
$pdf->SetFont('Times','B',9);
$pdf->Cell(100,10,'Position',1,0,'C');
$pdf->Cell(30,10,'First Job Count',1,0,'C');
$pdf->Cell(0,10,'Current / Present Job Count',1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(100,10,'Rank or Clerical',1,0,'C');
$pdf->Cell(30,10,$r1['totalcol1_FirstJob'],1,0,'C');
$pdf->Cell(0,10,$r1['totalcol2_Current'],1,1,'C');
$pdf->Cell(100,10,'Professional, Technical or Supervisory',1,0,'C');
$pdf->Cell(30,10,$r2['totalcol1_FirstJob'],1,0,'C');
$pdf->Cell(0,10,$r2['totalcol2_Current'],1,1,'C');
$pdf->Cell(100,10,'Managerial or Executive',1,0,'C');
$pdf->Cell(30,10,$r3['totalcol1_FirstJob'],1,0,'C');
$pdf->Cell(0,10,$r4['totalcol2_Current'],1,1,'C');
$pdf->Cell(100,10,'Self-employed',1,0,'C');
$pdf->Cell(30,10,$r4['totalcol1_FirstJob'],1,0,'C');
$pdf->Cell(0,10,$r4['totalcol2_Current'],1,1,'C');


$pdf->Output();
}


if ($category == 'relevantjob') 
{
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

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../../img/logo.png',25,6,20);
$pdf->SetFont('Times','B',15);
$pdf->Cell(80);
$pdf->Cell(30,10,'CvSU - CEIT DIT ONLINE TRACER STUDY',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,'Job Level Position Report',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,$date_echo,0,0,'C');
$pdf->Ln(20);
$pdf->SetFont('Times','B',9);
$pdf->Cell(100,10,'Question',1,0,'C');
$pdf->Cell(30,10,'Answered',1,0,'C');
$pdf->Cell(0,10,'Unanswered',1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(100,10,'Was the curriculum you had in college relevant to your first job?',1,0,'C');
$pdf->Cell(30,10,$aYES ,1,0,'C');
$pdf->Cell(0,10,$aNO,1,1,'C');


$pdf->Output();
}

if ($category == 'grossearning')  {
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

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../../img/logo.png',25,6,20);
$pdf->SetFont('Times','B',15);
$pdf->Cell(80);
$pdf->Cell(30,10,'CvSU - CEIT DIT ONLINE TRACER STUDY',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,'Initial Gross Monthly Earning Report',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,$date_echo,0,0,'C');
$pdf->Ln(20);
$pdf->SetFont('Times','B',9);
$pdf->Cell(100,10,'Question',1,0,'C');
$pdf->Cell(30,10,'Answered',1,0,'C');
$pdf->Cell(0,10,'Unanswered',1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(100,10,'Below P 5,000.00',1,0,'');
$pdf->Cell(30,10,$r1['aYES'] ,1,0,'C');
$pdf->Cell(0,10,$r1['aNO'],1,1,'C');
$pdf->Cell(100,10,'P 5,000.00 to less than P 10,000.00',1,0,'');
$pdf->Cell(30,10,$r2['aYES'] ,1,0,'C');
$pdf->Cell(0,10,$r2['aNO'],1,1,'C');
$pdf->Cell(100,10,'P 10,000.00 to less than P 15,000.00',1,0,'');
$pdf->Cell(30,10,$r3['aYES'] ,1,0,'C');
$pdf->Cell(0,10,$r3['aNO'],1,1,'C');
$pdf->Cell(100,10,'P 15,000.00 to less than P 20,000.00',1,0,'');
$pdf->Cell(30,10,$r4['aYES'] ,1,0,'C');
$pdf->Cell(0,10,$r4['aNO'],1,1,'C');
$pdf->Cell(100,10,'P 20,000.00 to less than P 25,000.00',1,0,'');
$pdf->Cell(30,10,$r5['aYES'] ,1,0,'C');
$pdf->Cell(0,10,$r5['aNO'],1,1,'C');
$pdf->Cell(100,10,'P 25,000.00 and above',1,0,'');
$pdf->Cell(30,10,$r6['aYES'] ,1,0,'C');
$pdf->Cell(0,10,$r6['aNO'],1,1,'C');


$pdf->Output();
	
}

if ($category == 'pes')  {
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


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../../img/logo.png',25,6,20);
$pdf->SetFont('Times','B',15);
$pdf->Cell(80);
$pdf->Cell(30,10,'CvSU - CEIT DIT ONLINE TRACER STUDY',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,'Present Employment Status Report',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,$date_echo,0,0,'C');
$pdf->Ln(20);
$pdf->SetFont('Times','B',9);
$pdf->Cell(100,10,'Status',1,0,'C');
$pdf->Cell(0,10,'Total',1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(100,10,'Regular or Permanent',1,0,'');
$pdf->Cell(0,10,$r1['rop'],1,1,'C');
$pdf->Cell(100,10,'Temporary',1,0,'');
$pdf->Cell(0,10,$r1['temp'],1,1,'C');
$pdf->Cell(100,10,'Casual',1,0,'');
$pdf->Cell(0,10,$r1['cas'],1,1,'C');
$pdf->Cell(100,10,'Constructual',1,0,'');
$pdf->Cell(0,10,$r1['con'],1,1,'C');
$pdf->Cell(100,10,'Self Employed',1,0,'');
$pdf->Cell(0,10,$r1['self'],1,1,'C');


$pdf->Output();
	
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


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../../img/logo.png',25,6,20);
$pdf->SetFont('Times','B',15);
$pdf->Cell(80);
$pdf->Cell(30,10,'CvSU - CEIT DIT ONLINE TRACER STUDY',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,'Useful Competencies Report',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,$date_echo,0,0,'C');
$pdf->Ln(20);
$pdf->SetFont('Times','B',9);
$pdf->Cell(100,10,'Status',1,0,'C');
$pdf->Cell(0,10,'Total',1,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(100,10,'Communication skills',1,0,'');
$pdf->Cell(0,10,$r1['sum'],1,1,'C');
$pdf->Cell(100,10,'Human Relations skills',1,0,'');
$pdf->Cell(0,10,$r2['sum'],1,1,'C');
$pdf->Cell(100,10,'Entrepreneurial skills',1,0,'');
$pdf->Cell(0,10,$r3['sum'],1,1,'C');
$pdf->Cell(100,10,'Problem-solving skills',1,0,'');
$pdf->Cell(0,10,$r4['sum'],1,1,'C');
$pdf->Cell(100,10,'Critical Thinking skills',1,0,'');
$pdf->Cell(0,10,$r5['sum'],1,1,'C');
$pdf->Cell(100,10,'Other',1,0,'');
$pdf->Cell(0,10,$r6['sum'],1,1,'C');


$pdf->Output();
	
}


	
?>