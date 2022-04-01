<?php

    require_once('daos/ActividadDAO.php');

class CalendarioController{
    
    private $listaActividades;
    private $actividadDao;
    
    public function __construct() {
        $this->actividadDao = new ActividadDAO();
        $this->listaActividades = $this->actividadDao->getListaActividades(1);
    }

    
    public function getListaActividades() {
        return $this->listaActividades;
    }

    public function guardarActividad($actividad) {
        $idActividad = null;
        if ($actividad->getIdActividad() == null) {
            $idActividad = $this->actividadDao->nuevaActividad($actividad);
        } else {
            $idActividad = $this->actividadDao->modificarActividad($actividad);
        }

        return $idActividad;
    }
    public function verActividad($idActividad) {
        return $this->actividadDao->getActividad($idActividad);
    }

    public function eliminarActividad($idActividad) {
        $this->actividadDao->eliminarActividad($idActividad);
        return $this->listaActividades = $this->actividadDao->getListaActividades(1);;
    }
}

?>