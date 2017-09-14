<?php
require('fpdf.php');
include('db.php');
$res = mysql_query("SELECT * From emp_accounts_record");

class PDF extends FPDF{
	function Header(){
		$this->Image('logo.png',10,6,20);
		$this->SetFont('Times','B',15);
		$this->Cell(80);
		$this->Cell(30,10,'DOCUMENT REPORT',0,0,'C');
		$this->Ln(20);
		$this->Cell(0,10,'Table Header',1,1,'C');

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

$pdf->SetFont('Arial','B',9);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Table Data'.$i,1,1);
$pdf->Output();
?>