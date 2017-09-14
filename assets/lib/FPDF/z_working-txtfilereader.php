<?php
require('fpdf.php');
include('db.php');
$res = mysql_query("SELECT * From emp_accounts_record");

class PDF extends FPDF{
	function Header(){
		global $title;
		// Calculate width of title and position
	    $w = $this->GetStringWidth($title)+6;
	    $this->SetX((210-$w)/2);
		$this->Image('logo.png',10,6,20);
		$this->SetFont('Times','B',15);
    	$this->SetLineWidth(1);
		$this->Cell($w,10,$title,0,0,'C');
		$this->Ln(20);
	}
	function Chapter($num, $label){
		// Arial 12
	    $this->SetFont('Arial','',12);
	    // Background color
	    $this->SetFillColor(200,255,255);
	    // Title
	    $this->Cell(0,6,"Chapter $num  $label",0,1,'L',true);
	    // Line break
	    $this->Ln(4);
	}
	function Mybody($file,$type){
		if ($text='file'){
				// Read text file
	    $txt = file_get_contents($file);
	    // Times 12
	    $this->SetFont('Times','',12);
	    // Output justified text
	    $this->MultiCell(0,5,$txt);
	    // Line break
	    $this->Ln();
		}
		else if($type='csv')
		{

		}
		else
		{
			for($i=1;$i<=40;$i++){
    			$pdf->Cell(0,10,'Printing line number '.$i,0,1);
			}
		}
	}
	function Layout($num, $label, $file, $type){
		$this->AddPage();
		$this->Chapter($num,$label);
		$this->Mybody($file,$type);
	}
	function footer(){
		// Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Times','',12);
	    // Page number
	    $this->Cell(0,10,$this->PageNo(),0,0,'R');
	}
}
// Instanciation of inherited class
$pdf = new PDF();
$title = 'SAMPLE TITLE';
$pdf->SetTitle($title);
$pdf->SetAuthor('Rhalp Darren Cabrera');
$pdf->Layout(1,'ZHING','install.txt','file');
$pdf->Layout(2,'ZHING2','license.txt','file');
$pdf->Output();
?>