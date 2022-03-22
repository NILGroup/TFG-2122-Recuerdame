<?php
require('./public/fpdf184/fpdf.php');
include "controllers/InformeSeguimientoController.php";

class PDF extends FPDF{
// Page header
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    //$this->Cell(80);
    // Title
    $this->Cell(190,10,'Informe de Seguimiento',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

if (!empty($_GET['idInforme'])){
    $informeSeguimientoController = new InformeSeguimientoController();
    $informeSeguimiento = $informeSeguimientoController->verInformeSeguimiento($_GET['idInforme']);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    $pdf->Cell(0,10,'Fecha del informe: '.$informeSeguimiento->getFecha(),0,1);
    $pdf->Output();
}
else{
    echo("Error: No ID encontrado");
}

?>
