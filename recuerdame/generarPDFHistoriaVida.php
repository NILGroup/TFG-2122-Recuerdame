<?php
require('./public/fpdf184/fpdf.php');
include "controllers/HistoriaVidaController.php";
include "controllers/RecuerdosController.php";
include "controllers/PacientesController.php";

class PDF extends FPDF{

    // Page header
    function Header()
    {
        $this->Image('./public/img/Marca_recuerdame.png',150,8,50);
        // Arial bold 15
        $this->SetFont('Arial','B',18);
        // Move to the right
        //$this->Cell(80);
        // Title
        $this->Cell(190,11,'Historia de vida',0,1);
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

function writeRecuerdos($pdf, $listadoRecuerdos){
    $recuerdosController = new RecuerdosController();

    foreach($listadoRecuerdos as $row) {
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(160,7,iconv('UTF-8', 'windows-1252',$row['nombre']));
        $pdf->Cell(160,7,$row['fecha']);
        $pdf->Ln();
        $pdf->SetFont('Times','',12);
        $pdf->MultiCell(0,7,iconv('UTF-8', 'windows-1252', $row['descripcion']));
        $pdf->Ln();

        $listaMultimedia = $recuerdosController->getListaMultimediaRecuerdo($row['id_recuerdo']);
        foreach ($listaMultimedia as $multimedia) {
            $image = "archivos/" . $multimedia['fichero'];
            $pdf->MultiCell(0,35,$pdf->Image($image, $pdf->GetX(), $pdf->GetY(), 40));
            $pdf->Ln();
        }
    }
}

function writePatient($pdf, $paciente){
    $cumpleanos = new DateTime($paciente->getFechaNacimiento());
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);

    $genero = '';
    if ($paciente->getGenero() == 'H') $genero = 'Hombre';
    else if ($paciente->getGenero() == 'M') $genero = 'Mujer';

    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(30,7,'Nombre: ',1 ,0 ,'L' ,true);
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(160, 7, $paciente->getNombre(), 1);
    $pdf->Ln();
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(30,7,'Edad: ', 1, 0,'L' ,true);
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(160, 7, $annos->y, 1);
    $pdf->Ln();
    $pdf->SetFont('Times', 'B', 12);
    $pdf->Cell(30,7,'Genero: ', 1, 0,'L' ,true);
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(160, 7, $genero, 1);
    $pdf->Ln(12);
}

function pdfBody($pdf, $paciente, $listadoRecuerdos){
    $pdf->SetFillColor(220);

    $pdf->SetFont('Times','B',15);
    $pdf->Cell(0,7,'Datos del usuario ');
    $pdf->Ln(9);

    writePatient($pdf, $paciente);
    
    $pdf->SetFont('Times', 'B', 15);
    $pdf->Cell(0, 7, 'Recuerdos');
    $pdf->Ln(9);

    writeRecuerdos($pdf, $listadoRecuerdos);
}

$pacientesController = new PacientesController();
$idPaciente = $_SESSION['idPaciente'];
$paciente = $pacientesController->verPaciente($idPaciente);
$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFin'];
$idEtapa = $_POST['idEtapa'];
$idCategoria = $_POST['idCategoria'];
$idEtiqueta = $_POST['idEtiqueta'];

$historiaVidaController = new HistoriaVidaController();
$listadoRecuerdos = $historiaVidaController->generarLibro($fechaInicio, $fechaFin, $idEtapa, $idCategoria, $idEtiqueta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

pdfBody($pdf, $paciente, $listadoRecuerdos);

$pdf->Output();

?>
