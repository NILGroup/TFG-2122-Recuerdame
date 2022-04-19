<?php
    if(!isset($_SESSION['idPaciente'])){
        session_start();
    }
?>
<?php

require_once('daos/RecuerdoDAO.php');

class HistoriaVidaController
{

    private $recuerdoDao;

    public function __construct()
    {
        $this->recuerdoDao = new RecuerdoDAO();
    }

    public function generarLibro($fechaInicio, $fechaFin, $idEtapa, $idCategoria, $idEtiqueta)
    {
        $idPaciente = $_SESSION['idPaciente'];
        return $this->listaRecuerdos = $this->recuerdoDao->getListaRecuerdosHistoriaVida($idPaciente, $fechaInicio, $fechaFin, $idEtapa, $idCategoria, $idEtiqueta);
    }

    public function generarPDF()
    {
        $idPaciente = $_SESSION['idPaciente'];
        return $this->listaRecuerdos = $this->recuerdoDao->getListaRecuerdos($idPaciente);
    }
}
