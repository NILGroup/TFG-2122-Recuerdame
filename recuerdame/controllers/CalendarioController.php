<?php

    require_once('daos/ActividadDAO.php');

class CalendarioController{
    
    private $actividadDao;
    
    public function __construct() {
        $this->actividadDao = new ActividadDAO();
    }

    public function getListaActividades($idPaciente) {
        return $this->actividadDao->getListaActividades($idPaciente);
    }

    public function guardarActividad($idPaciente, $actividad) {
        $idActividad = null;
        if ($actividad->getIdActividad() == null) {
            $idActividad = $this->actividadDao->nuevaActividad($idPaciente, $actividad);
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
        return $this->listaActividades = $this->actividadDao->getListaActividades(1);
    }
}

?>