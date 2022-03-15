<?php

    require_once('daos/RecuerdoDAO.php');

class RecuerdosController{
    
    private $listaRecuerdos;
    private $recuerdoDao;
    
    public function __construct() {
        $this->recuerdoDao = new RecuerdoDAO();
        $this->listaRecuerdos = $this->recuerdoDao->getListaRecuerdos(1);
    }

    public function getListaRecuerdos() {
        return $this->listaRecuerdos;
    }

    public function verRecuerdo($idRecuerdo) {
        return $this->recuerdoDao->getRecuerdo($idRecuerdo);
    }

    public function eliminarRecuerdo($idRecuerdo) {
        $this->recuerdoDao->eliminarRecuerdo($idRecuerdo);
        return $this->listaRecuerdos = $this->recuerdoDao->getListaRecuerdos(1);;
    }
}

?>