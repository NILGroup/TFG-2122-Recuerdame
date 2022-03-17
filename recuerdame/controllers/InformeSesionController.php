<?php

    require_once('daos/InformeSesionDAO.php');

class InformeSesionController{
    
    private $listaInformeSesion;
    private $informeSesionDao;
    
    public function __construct() {
        $this->informeSesionDao = new InformeSesionDAO();
        
    }

    public function getListaInformeSesion() {
        $this->listaInformeSesion= $this->informeSesionDao->getListaInformeSesion(1);
        return $this->listaInformeSesion;
    }

    public function verInformeSesion($idInforme) {
        return $this->informeSesionDao->getRecuerdo($idInforme);
    }

    public function eliminarInformeSesion($idInforme) {
        $this->informeSesionDao->eliminarInforme($idInforme);
        return $this->listaInformeSesion = $this->informeSesionDao->getListaInformeSesion(1);
    }

}