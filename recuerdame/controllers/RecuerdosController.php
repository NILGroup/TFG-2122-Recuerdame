<?php

    require_once('daos/RecuerdoDAO.php');

class RecuerdosController{

    private $recuerdoDao;
    
    public function __construct() {
        $this->recuerdoDao = new RecuerdoDAO();
    }

    public function getListaRecuerdos() {
        return $this->listaRecuerdos = $this->recuerdoDao->getListaRecuerdos(1);
    }

    public function verRecuerdo($idRecuerdo) {
        return $this->recuerdoDao->getRecuerdo($idRecuerdo);
    }

    public function guardarRecuerdo($recuerdo) {
        $idRecuerdo = null;
        if ($recuerdo->getIdRecuerdo() == null) {
            $idRecuerdo = $this->recuerdoDao->nuevoRecuerdo($recuerdo);
        } else {
            $idRecuerdo = $this->recuerdoDao->modificarRecuerdo($recuerdo);
        }

        return $idRecuerdo;
    }

    public function eliminarRecuerdo($idRecuerdo) {
        $this->recuerdoDao->eliminarRecuerdo($idRecuerdo);
    }

    public function getListaRecuerdosSesion() {
        return $this->listaRecuerdos = $this->recuerdoDao->getListaRecuerdosSesion(1);
    }

    public function getListaMultimediaRecuerdo($idRecuerdo) {
        return $this->recuerdoDao->getListaMultimediaRecuerdo($idRecuerdo);
    }
}

?>