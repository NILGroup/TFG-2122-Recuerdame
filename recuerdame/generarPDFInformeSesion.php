<?php
require('./public/fpdf184/fpdf.php');
include "controllers/InformeSesionController.php";
include "controllers/PacientesController.php";
include "controllers/SesionesController.php";

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
        $this->Cell(190,11,'Informe de Sesion #'.$this->numInforme,0,1);
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


function writePatient($pdf, $paciente){
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(30,7,'Nombre: ',1,0,'L',true);
    $pdf->SetFont('Times','',12);
    $s = utf8_decode(' ' . $paciente->getNombre() . ' ' . $paciente->getApelliods());
    $pdf->Cell(160,7, $s ,1);
    $pdf->Ln();
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(30,7,'Edad: ',1,0,'L',true);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(160,7,' 87',1);
    $pdf->Ln();
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(30,7,'Genero: ',1,0,'L',true);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(160,7,' '. $paciente->getGenero(),1);
    $pdf->Ln(12);
}

function writeSesion($pdf, $sesion){
$pdf->SetFont('Times','B',12);
    $pdf->Cell(50,7,"Terapeuta:",1,0,'L',true);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(140,7,'Cris',1,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(50,7,"Fecha de la sesion:",1,0,'L',true);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(140,7,$sesion->getFecha(),1,0,'C');
    $pdf->Ln(12);

    $pdf->SetFillColor(170);
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(0,7,'Objetivo',1,0,'L',true);
    $pdf->Ln();
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,7,utf8_decode($sesion->getObjetivo()),1);
    $pdf->Ln();

    $pdf->SetFillColor(170);
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(0,7,utf8_decode('Descripcion'),1,0,'L',true);
    $pdf->Ln();
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,7,utf8_decode($sesion->getDescripcion()),1);
    $pdf->Ln();

    if(!empty($sesion->getFacilitadores())){
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(0,7,'Facilitadores',1,0,'L',true);
        $pdf->Ln();
        $pdf->SetFont('Times','',12);
        $pdf->MultiCell(0,7,utf8_decode($sesion->getFacilitadores()),1);
        $pdf->Ln();
    }

    if(!empty($sesion->getBarreras())){
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(0,7,'Barreras',1,0,'L',true);
        $pdf->Ln();
        $pdf->SetFont('Times','',12);
        $pdf->MultiCell(0,7,utf8_decode($sesion->getBarreras()),1);
        $pdf->Ln();
    }

}

function writeInformeSesion($pdf, $informeSesion){
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(50,7,"Fecha de finalizacion:",1,0,'L',true);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(140,7,$informeSesion->getFechaFinalizacion(),1,0,'C');
    $pdf->Ln(12);

    $pdf->SetFillColor(170);
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(0,7,'Respuesta',1,0,'L',true);
    $pdf->Ln();
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(0,7,utf8_decode($informeSesion->getRespuesta()),1);
    $pdf->Ln();
    
    if(!empty($informeSesion->getObservaciones())){
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(0,7,'Observaciones',1,0,'L',true);
        $pdf->Ln();
        $pdf->SetFont('Times','',12);
        $pdf->MultiCell(0,7,utf8_decode($informeSesion->getObservaciones()),1);
        $pdf->Ln();
    }

}

function pdfBody($pdf, $paciente, $sesion, $informeSesion){
    
    $pdf->SetFillColor(220);

    $pdf->SetFont('Times','B',15);
    $pdf->Cell(0,7,'Datos del usuario ');
    $pdf->Ln(9);

    writePatient($pdf, $paciente);

    $pdf->SetFont('Times','B',15);
    $pdf->Cell(0,7,'Datos de la sesion ');
    $pdf->Ln(9);

    writeSesion($pdf,$sesion);

    $pdf->SetFont('Times','B',15);
    $pdf->Cell(0,7,'Informe de la sesion ');
    $pdf->Ln(9);

    writeInformeSesion($pdf,$informeSesion);
    /*

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
    */
}

if (!empty($_GET['idSesion'])){
    $pacienteController = new PacientesController();
    $paciente = $pacienteController->verPaciente(1);

    $sesionController = new SesionesController();
    $sesion = $sesionController->verSesion($_GET['idSesion']);

    $informeSesionController = new InformeSesionController();
    $informeSesion = $informeSesionController->verInformeSesion($_GET['idSesion']);
    
    $pdf = new PDF();
    $pdf->LoadData($informeSesion->getIdSesion());
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);

    pdfBody($pdf, $paciente, $sesion, $informeSesion);

    $pdf->Output();
}
else{
    echo("Error: No ID encontrado");
}

?>