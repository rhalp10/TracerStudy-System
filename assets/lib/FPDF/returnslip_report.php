<?php
require('fpdf.php');

class PDF extends FPDF{
  function Header(){

    include('db.php');
    $ID = $_REQUEST['ID'];
    $sql = "SELECT *";
    $sql.=" FROM property_return_slip_record WHERE ID = $ID";
    $res = mysql_query($sql);
    $row = mysql_fetch_array($res);
    $this->Cell(0,30,'',1,1,'C');
    $this->SetFont('Times','',8);
    $this->Cell(0,-55,'LGU Form No. 12',0,0,'L');
    $this->Cell(0,-55,'APPENDIX "N"',0,1,'R');// Maybe ung "N" sa appendix may ibigsabhin kaya kayo napo mag tanong sa GSO about dto sa mga susunod na improvement
    $this->SetFont('Times','',15);
    $this->Cell(0,80,'PROPERTY RETURN SLIP',0,1,'C');
    $this->SetFont('Times','',8);
    $this->Cell(0,-55,'Name of Local Government Unit: '.$row['LGU_Name'],0,1,'L');
    $this->Cell(0,35,'',1,1);
    $this->Cell(0,5,'',1,1);
    $this->SetFont('Times','',9);
    if ($row['PurposeID'] == '1') {
      
    $d = 'x';
    $r = ' ';
    $rts = ' ';
    $fr = ' ';
    $fo = ' ';
    }
    else if ($row['PurposeID'] == '2') {
      
    $d = ' ';
    $r = 'x';
    $rts = ' ';
    $fr = ' ';
    $fo = ' ';
    }
    else if ($row['PurposeID'] == '3') {
      
    $d = '';
    $r = ' ';
    $rts = 'x';
    $fr = ' ';
    $fo = ' ';
    }
    else if ($row['PurposeID'] == '4') {
      
    $d = ' ';
    $r = ' ';
    $rts = ' ';
    $fr = 'x';
    $fo = ' ';
    }
    else if ($row['PurposeID'] == '5') {
      
    $d = ' ';
    $r = ' ';
    $rts = ' ';
    $fr = ' ';
    $fo = 'x';
    }
    else
    {
    $d = ' ';
    $r = ' ';
    $rts = ' ';
    $fr = ' ';
    $fo = ' ';
    }

    $this->Cell(30,-5,'Purpose: ('.$d.')Disposal',0,0);
    $this->Cell(20,-5,'('.$r.')Repair',0,0);
    $this->Cell(30,-5,'('.$rts.')Return to Stock',0,0);
    $this->Cell(20,-5,'('.$fr.')For Repair',0,0);
    $this->Cell(20,-5,'('.$fo.')For Other:',0,1);
    $this->SetFont('Times','',8);
    $this->Cell(20,5,'',0,1);
    $this->Cell(15,10,'QTY/UNIT',1,0,'C');
    $this->Cell(40,10,'Description',1,0,'C');
    $this->Cell(40,10,'Serial Number',1,0,'C');
    $this->Cell(20,10,'Prop. Number',1,0,'C');
    $this->Cell(10,10,'PAR',1,0,'C');
    $this->Cell(30,10,'Name of End-User',1,0,'C');
    $this->Cell(20,10,'Unit Value',1,0,'C');
    $this->Cell(0,10,'TotalValue',1,1,'C');

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
$pdf->AddPage('P','');
include('db.php');
$ID = $_REQUEST['ID'];
$sql = "SELECT *";
$sql.=" FROM property_return_slip_record WHERE ID = $ID";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
/*

while ($row = mysql_fetch_array($res)) 
  {

    $pdf->Cell(30,8,$row['DateAdded'],1,0,'C');
      $pdf->Cell(50,8,$row['Supplier'],1,0,'C');
      $pdf->Cell(125,8,$row['Descrp'],1,0);
      $pdf->Cell(25,8,$row['Qty'],1,0,'C');
      $pdf->Cell(25,8,$row['Issued'],1,0,'C');
      $pdf->Cell(35,8,$row['Balance'],1,0,'C');
      $pdf->Cell(30,8,$row['bin_Date'],1,1,'C');
  }
  */

  
  
$pdf->SetFont('Times','',6);
    $pdf->Cell(15,5,$row['Qty'].' '.$row['Unit'],1,0,'C');
    $pdf->Cell(40,5,$row['Descrp'],1,0);
    $pdf->Cell(40,5,$row['Serial_Num'],1,0);
    $pdf->Cell(20,5,$row['Prop_Number'],1,0,'C');
    $pdf->Cell(10,5,$row['ParNo'],1,0);
    $pdf->Cell(30,5,$row['Name_of_Enduser'],1,0);
    $pdf->Cell(20,5,$row['Unit_Value'],1,0,'C');
    $pdf->Cell(0,5,$row['Total_Value'],1,1,'C');
for ($i=0; $i < 30; $i++) { 
    $pdf->Cell(15,5,' ',1,0,'C');
    $pdf->Cell(40,5,' ',1,0);
    $pdf->Cell(40,5,' ',1,0);
    $pdf->Cell(20,5,' ',1,0,'C');
    $pdf->Cell(10,5,' ',1,0);
    $pdf->Cell(30,5,' ',1,0);
    $pdf->Cell(20,5,' ',1,0,'C');
    $pdf->Cell(0,5,' ',1,1,'C');
}
$pdf->SetFont('Times','B',9);
$pdf->Cell(175,7,'T O T A L ..............',1,0,'R');
$pdf->SetFont('Times','B',8);
$pdf->Cell(0,7,'',1,1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(0,7,'CERTIFICATION',1,1,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(100,15,'I HEREBY CERTIFY that I have this',1,0,'C');
$pdf->Cell(0,15,'I HEREBY CERTIFY that I have this',1,1,'C');
$pdf->Cell(100,-5,'dayVar'.'day of'.'MONTH-YEAR',0,0,'L');
$pdf->Cell(0,-5,'dayVar'.'   day   of   '.' MONTH-YEAR',0,1,'L');
$pdf->Cell(0,5,'',0,1);

$pdf->Cell(100,10,'',1,0,'L');
$pdf->Cell(0,10,'',1,1,'L');
$pdf->Cell(100,-10,'RETURN to: '.$row['ReceiveBy_Name'],0,0,'L');
$pdf->Cell(0,-10,'RETURN From: '.$row['ReceiveFrom_Name'],0,1,'L');
$pdf->Cell(100,15,$row['ReceiveBy_Position'],0,0,'C');
$pdf->Cell(0,15,$row['ReceiveFrom_Position'],0,1,'C');
$pdf->Cell(100,-5,'(Name and Destination)',0,0,'C');
$pdf->Cell(0,-5,'(Name and Destination)',0,1,'C');
$pdf->Cell(100,15,'',1,0,'L');
$pdf->Cell(0,15,'',1,1,'L');
$pdf->Cell(100,-5,'the items/articles described above',0,0,'L');
$pdf->Cell(0,-5,'the items/articles described above',0,1,'L');


$pdf->SetFont('Arial','B',9);
$pdf->Output();
?>