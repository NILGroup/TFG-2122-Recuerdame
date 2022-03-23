<?php
require('./public/fpdf184/fpdf.php');
include "controllers/InformeSeguimientoController.php";

class PDF extends FPDF{

    private $numInforme;
        
    function LoadData($num){
        // Read file lines
        $this->numInforme = $num;
    }
    // Page header
    function Header()
    {
        $this->Image('./public/img/Marca_recuerdame.png',150,8,50);
        // Arial bold 15
        $this->SetFont('Arial','B',18);
        // Move to the right
        //$this->Cell(80);
        // Title
        $this->Cell(190,11,'Informe de Seguimiento #'.$this->numInforme,0,1);
        $this->Line(10,25,200,25);
        // Line break
        $this->Ln(10);
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

function writeTest($pdf, $informeSeguimiento){
    $pdf->SetFont('Times','B',12);
    $pdf->SetFillColor(170);
    $pdf->Cell(0,7,'Test realizados al usuario',1,0,'C',true);
    $pdf->Ln();
    $pdf->SetFillColor(220);
    $pdf->Cell(50,7,'Nombre del test',1,0,'C',true);
    $pdf->Cell(70,7,'Fecha de test',1,0,'C',true);
    $pdf->Cell(70,7,'Resutado/valor',1,0,'C',true);
    $pdf->Ln();
    $pdf->SetFont('Times','',12);
    $pdf->Cell(50,7,'GDS ',1);
    $pdf->Cell(70,7,$informeSeguimiento->getFechaGds(),1,0,'C');
    $pdf->Cell(70,7,$informeSeguimiento->getGds(),1,0,'C');
    $pdf->Ln();
    $pdf->Cell(50,7,'Test de Lobo ',1);
    $pdf->Cell(70,7,$informeSeguimiento->getFechaMental(),1,0,'C');
    $pdf->Cell(70,7,$informeSeguimiento->getMental(),1,0,'C');
    $pdf->Ln();
    $pdf->Cell(50,7,'CDR ',1);
    $pdf->Cell(70,7,$informeSeguimiento->getFechaCdr(),1,0,'C');
    $pdf->Cell(70,7,$informeSeguimiento->getCdr(),1,0,'C');
    $pdf->Ln();
    if(!empty($informeSeguimiento->getNombreEscala())){
        $pdf->Cell(50,7,$informeSeguimiento->getNombreEscala(),1);
        $pdf->Cell(70,7,$informeSeguimiento->getFechaEscala(),1,0,'C');
        $pdf->Cell(70,7,$informeSeguimiento->getEscala(),1,0,'C');
        $pdf->Ln();
    }
    $pdf->Ln(5);
}

function writePatient($pdf, $informeSeguimiento){
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(30,7,'Nombre: ',1,0,'L',true);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(160,7,'  Juana Rodríguez Jiménez',1);
    $pdf->Ln();
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(30,7,'Edad: ',1,0,'L',true);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(160,7,'  53',1);
    $pdf->Ln();
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(30,7,'Genero: ',1,0,'L',true);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(160,7,'  Mujer',1);
    $pdf->Ln(12);
}

function pdfBody($pdf, $informeSeguimiento){
    //$pdf->Cell(0,10,'Fecha del informe: '.$informeSeguimiento->getFecha(),0,1);
    // Colors, line width and bold font
    $pdf->SetFillColor(220);

    $pdf->SetFont('Times','B',15);
    $pdf->Cell(0,7,'Datos del usuario ');
    $pdf->Ln(9);

    writePatient($pdf, $informeSeguimiento);
    
    $pdf->SetFont('Times','B',15);
    $pdf->Cell(0,7,'Datos del Informe ');
    $pdf->Ln(9);

    $pdf->SetFont('Times','B',12);
    $pdf->Cell(50,7,"Fecha del informe:",1,0,'L',true);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(140,7,$informeSeguimiento->getFecha(),1,0,'C');
    $pdf->Ln(12);

    writeTest($pdf, $informeSeguimiento);

    $pdf->SetFillColor(170);
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(0,7,'Diagnostico',1,0,'L',true);
    $pdf->Ln();
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,7,$informeSeguimiento->getDiagnostico(),1);
    $pdf->Ln();

    if(!empty($informeSeguimiento->getObservaciones())){
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(0,7,'Observaciones',1,0,'L',true);
        $pdf->Ln();
        $pdf->SetFont('Times','',12);
        $pdf->MultiCell(0,7,$informeSeguimiento->getObservaciones(),1);
        $pdf->Ln();
    }
    
}

if (!empty($_GET['idInforme'])){
    $informeSeguimientoController = new InformeSeguimientoController();
    $informeSeguimiento = $informeSeguimientoController->verInformeSeguimiento($_GET['idInforme']);

    $pdf = new PDF();
    $pdf->LoadData($informeSeguimiento->getIdEvaluacion());
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);

    pdfBody($pdf,$informeSeguimiento);

    $pdf->Output();
}
else{
    echo("Error: No ID encontrado");
}

?>
