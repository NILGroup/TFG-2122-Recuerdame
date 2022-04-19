<?php

    require_once('daos/InformeSeguimientoDAO.php');

    if (!isset($_SESSION['idPaciente'])) {
        session_start();
    }

class InformeSeguimientoController{

    private $informeSeguimientoDao;
    
    public function __construct() {
        $this->informeSeguimientoDao = new InformeSeguimientoDAO();
    }
    
    public function getListaInformeSeguimiento() {
        $idPaciente = $_SESSION['idPaciente'];
        return $this->informeSeguimientoDao->getListaInformeSeguimiento($idPaciente);
    }

    public function verInformeSeguimiento($idInforme) {
        return $this->informeSeguimientoDao->getInformeSeguimiento($idInforme);
    }

    public function guardarInformeSeguimiento($informe) {
        $idPaciente = $_SESSION['idPaciente'];
        $idInforme = null;
        if ($informe->getIdEvaluacion() == null) {
            $idInforme = $this->informeSeguimientoDao->nuevoInformeSeguimiento($idPaciente, $informe);
        } else {
            $idInforme = $this->informeSeguimientoDao->modificarInformeSeguimiento($informe);
        }

        return $idInforme;
    }

    public function eliminarInformeSeguimiento($idInforme) {
        return $this->informeSeguimientoDao->eliminarInformeSeguimiento($idInforme);
    }
}