<?php

    require_once('daos/RecuerdoDAO.php');

class HistoriaVidaController{

    private $recuerdoDao;
    
    public function __construct() {
        $this->recuerdoDao = new RecuerdoDAO();
    }

    public function generarLibro() {
        return $this->listaRecuerdos = $this->recuerdoDao->getListaRecuerdosHistoriaVida(1);
    }

    public function generarPDF() {
        return $this->listaRecuerdos = $this->recuerdoDao->getListaRecuerdos(1);
    }
}

?>