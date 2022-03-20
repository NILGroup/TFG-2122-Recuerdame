<?php

    require_once('daos/InformeSeguimientoDAO.php');

class InformeSeguimientoController{

    private $listaInformeSeguimiento;
    private $informeSeguimientoDao;
    
    public function __construct() {
        $this->informeSeguimientoDao = new InformeSeguimientoDAO();
        $this->listaInformeSeguimiento = $this->informeSeguimientoDao->getListaInformeSeguimiento(1);
    }
    
    public function getListaInformeSeguimiento() {
        return $this->listaInformeSeguimiento;
    }

    public function verInformeSeguimiento($idInforme) {
        return $this->informeSeguimientoDao->getInformeSeguimiento($idInforme);
    }

    public function guardarInformeSeguimiento($informe) {
        $idInforme = null;
        if ($informe->getIdEvaluacion() == null) {
            $idInforme = $this->informeSeguimientoDao->nuevoInformeSeguimiento($informe);
        } else {
            $idInforme = $this->informeSeguimientoDao->modificarInformeSeguimiento($informe);
        }

        return $idInforme;
    }

    public function eliminarInformeSeguimiento($idInforme) {
        return $this->informeSeguimientoDao->eliminarInformeSeguimiento($idInforme);
    }
}