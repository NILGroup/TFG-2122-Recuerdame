<?php

    require_once('daos/InformeSesionDAO.php');

class InformeSesionController{
    
    private $listaInformeSesion;
    private $informeSesionDao;
    
    public function __construct() {
        $this->informeSesionDao = new InformeSesionDAO();
        $this->listaInformeSesion = $this->informeSesionDao->getListaInformeSesion(1);
        
    }

    public function getListaInformeSesion() {
        return $this->listaInformeSesion;
    }

    public function verInformeSesion($idInforme) {
        return  $this->informeSesionDao->getInformeSesion($idInforme);
    }

    public function guardarInformeSesion($informe) {
        $idInforme = null;
        if ($informe->getIdSesion() == null) {
            $idInforme = $this->informeSesionDao->nuevoInformeSesion($informe);
        } else {
            $idInforme = $this->informeSesionDao->modificarInformeSesion($informe);
        }

        return $idInforme;
    }

    public function eliminarInformeSesion($idInforme) {
        return $this->informeSesionDao->eliminarInformeSesion($idInforme);
    }

}