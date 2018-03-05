<?php
require('fpdf.php');
include('db.php');
$req_course = $_REQUEST['course'];
$req_year  = $_REQUEST['year'];

$res = mysqli_query($con,"SELECT * FROM user_student_detail WHERE student_department LIKE '$req_course' AND student_year_grad LIKE '$req_year%' ORDER BY `student_fName`  ASC");

class PDF extends FPDF{
	function Header(){

		$req_course = $_REQUEST['course'];
		$req_year  = $_REQUEST['year'];
		$this->Image('../../img/logo.png',25,6,20);
		$this->SetFont('Times','B',15);
		$this->Cell(80);
		$this->Cell(30,10,'CvSU - CEIT DIT ONLINE TRACER STUDY',0,1,'C');
		$this->Cell(80);

		if ($req_course == 2) {
		$this->Cell(30,10,'Information Technology',0,1,'C');
        }
        if ($req_course == 1) {
		$this->Cell(30,10,'Computer Science',0,1,'C');
        }
        if ($req_course == 3) {

		$this->Cell(30,10,'Office Addministration',0,1,'C');

        }
        $this->Cell(80);
        $this->Cell(30,10,'Batch '.$req_year,0,0,'C');
		$this->Ln(20);
		$this->SetFont('Times','B',9);
		$this->Cell(0,10,'Name List',1,1,'');

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
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','',9);
$i=1;
	while ($data = mysqli_fetch_array($res)) 
	{
		
	    $pdf->Cell(0,10,$i.'.'.$data['student_fName'].' '.$data['student_mName'].' '.$data['student_lName'],1,1);
	    $i++;
	}
$pdf->Output();
?>