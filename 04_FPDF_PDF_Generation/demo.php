<?php

require('fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();
$pdf->Image('logo.png', 3, 3, 20);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'PHP PDF Creation Demo', 0, 1, 'C');

$pdf->Ln(10); //10 units vertical

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Student Name : Bhavesh Joshi', 0, 1);
$pdf->Cell(0, 10, 'Course : Web Development', 0, 1);
$pdf->Cell(0, 10, 'City : Porbandar', 0, 1);

$pdf->Output();

?>