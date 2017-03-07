<?php
require('fpdf.php');


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../static/dist/img/rit.jpg',20,10,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'RAJIV GANDHI INSTITUTE OF TECHNOLOGY',0,0,'C');

    $this->SetFont('Arial','B',14);

    $this->SetXY(90,18);

    $this->Cell(20,8,'VELLOOR P.O, KOTTAYAM - 686 501',0,0,'C');
    // Line break
    $this->Line(0, 35, 250, 35);

    $this->Ln(20);
}

}

$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();




$pdf->Output();

?>