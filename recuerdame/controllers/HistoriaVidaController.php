<?php

require_once('daos/RecuerdoDAO.php');

class HistoriaVidaController
{

    private $recuerdoDao;

    public function __construct()
    {
        $this->recuerdoDao = new RecuerdoDAO();
    }

    public function generarLibro($idPaciente, $fechaInicio, $fechaFin, $idEtapa, $idCategoria, $idEtiqueta)
    {
        return $this->listaRecuerdos = $this->recuerdoDao->getListaRecuerdosHistoriaVida($idPaciente, $fechaInicio, $fechaFin, $idEtapa, $idCategoria, $idEtiqueta);
    }
}
