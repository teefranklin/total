<?php
date_default_timezone_set("Africa/Harare");
include '../connection/database.php';
session_start();
require('fpdf/fpdf.php');


$query = "SELECT * FROM login where user_id='".$_SESSION['user_id']."'";
$statement = $connect->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();
foreach($result as $row){
	$progress = $row['progress'];

	if($progress<100){
		header('Location:../study_home.php');
	}
}

class PDF extends FPDF
{

	var $angle = 0;
	// Page header
	function Header()
	{
		$this->SetLineWidth(1);
		$this->SetDrawColor(238, 19, 56);
		$this->Rect(0, 0, 210, 148, 'D');

		$this->SetDrawColor(83, 106, 135);
		$this->SetLineWidth(1);
		$this->Rect(4, 4, 202, 139, 'D');

		$image_file = '../img/TLS.png';
		$this->Image($image_file, 10, 10, 30, 27);
		$this->SetFont('Arial', 'B', 16);
		$this->SetY(21);
		$this->SetX(13);
		$this->SetTextColor(247, 69, 69);
		$this->Cell(100, 5, "Total Zimbabwe", 0, 0, 'C');

		
	}
	function Rotate($angle, $x = -1, $y = -1)
	{
		if ($x == -1)
			$x = $this->x;
		if ($y == -1)
			$y = $this->y;
		if ($this->angle != 0)
			$this->_out('Q');
		$this->angle = $angle;
		if ($angle != 0) {
			$angle *= M_PI / 180;
			$c = cos($angle);
			$s = sin($angle);
			$cx = $x * $this->k;
			$cy = ($this->h - $y) * $this->k;
			$this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
		}
	}

	//water marks
	function temporaire($texte)
	{
		$this->SetFont('Arial', 'B', 50);
		$this->SetTextColor(203, 203, 203);
		$this->Rotate(45, 55, 190);
		$this->Text(55, 190, $texte);
		$this->Rotate(0);
		$this->SetTextColor(0, 0, 0);
	}



	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetTextColor(69, 83, 106);
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial', 'BI', 16);
		//Page number
		$this->SetX(130);
		$this->Cell(0, 10, 'Total Learning Solutions');
	}
}
//get Data from the database 
$tt = 0;
$k = 1;
$l = 0;
$i = 0;
$total = 9;

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A5');

$pdf->SetY(50);
$pdf->SetFont('Arial', 'B', 18);
$pdf->SetX(50);
$pdf->Cell(100, 5, "ATTENDANCE CERTIFICATE", 0, 0, 'C');

$pdf->ln(10);
$pdf->SetFont('Arial', '', 8);
$pdf->SetX(43);
$pdf->Cell(100, 5, "We, the undersigned, Total Zimbabwe, certify that", 0, 0, 'C');

$pdf->ln(5);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(43);
$pdf->Cell(100, 5, $_SESSION['fullname'], 0, 0, 'C');


$pdf->ln(20);
$pdf->SetFont('Arial', '', 8);
$pdf->SetX(43);
$pdf->Cell(100, 5, "Has followed the training course :", 0, 0, 'C');

$pdf->ln(5);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(53);
$pdf->Cell(100, 5, "ELECTRONIC DOCUMENT MANAGEMENT SYSTEM ( EDMS )", 0, 0, 'C');

$pdf->ln(5);
$pdf->SetFont('Arial', '', 8);
$pdf->SetX(43);
$pdf->Cell(100, 5, "ON :" . date('Y-m-d'), 0, 0, 'C');
$pdf->output();
