<?php

    require_once('daos/SesionDAO.php');

    if (!isset($_SESSION['idPaciente'])) {
        session_start();
    }

class SesionesController{
    
    private $sesionDao;
    
    public function __construct() {
        $this->sesionDao = new SesionDAO();
    }

    public function getListaSesiones() {
        $idPaciente = $_SESSION['idPaciente'];
        return $this->listaSesiones = $this->sesionDao->getListaSesiones($idPaciente);
    }

    public function verSesion($idSesion) {
        return $this->sesionDao->getSesion($idSesion);
    }

    public function guardarSesion($sesion) {
        $idPaciente = $_SESSION['idPaciente'];
        $idSesion = null;
        if ($sesion->getIdSesion() == null) {
            $idSesion = $this->sesionDao->nuevaSesion($idPaciente, $sesion);
        } else {
            $idSesion = $this->sesionDao->modificarSesion($sesion);
        }

        return $idSesion;
    }

    public function eliminarSesion($idSesion) {
        $this->sesionDao->eliminarSesion($idSesion);
    }

    /**
     * Crea o modifica un recuerdo
     */
    public function guardarRecuerdo($idSesion, $recuerdo) {
        $idPaciente = $_SESSION['idPaciente'];
        $idRecuerdo = null;
        if ($recuerdo->getIdRecuerdo() == null) {
            $idRecuerdo = $this->sesionDao->nuevoRecuerdo($idPaciente, $idSesion, $recuerdo);
        } else {
            $this->recuerdoDao = new RecuerdoDAO();
            $idRecuerdo = $this->recuerdoDao->modificarRecuerdo($recuerdo);
        }

        return $idRecuerdo;
    }

    /**
     * Actualiza la lista de recuerdos que están asignados a la sesión.
     * Asigna la lista de recuerdos que se pasa por parámetro y se borran las demás relaciones
     */
    public function anadirRecuerdos($idSesion, $listaRecuerdos) {
        $this->sesionDao->anadirRecuerdos($idSesion, $listaRecuerdos);
    }

    /**
     * Elimina la relación entre la sesión y un recuerdo
     */
    public function eliminarRecuerdo($idSesion, $idRecuerdo) {
        $this->sesionDao->eliminarRecuerdo($idSesion, $idRecuerdo);
    }

    /**
     * Lista de archivos multimedia de una sesión
     */
    public function getListaMultimediaSesion($idSesion) {
        return $this->sesionDao->getListaMultimediaSesion($idSesion);
    }

    /**
     * Registra un nuevo fichero multimedia y lo asigna a una sesión
     */
    public function guardarMultimedia($idSesion, $listaFicheros) {
        $this->sesionDao->nuevoMultimedia($idSesion, $listaFicheros);
    }

    /**
     * Actualiza la lista de archivos multimedia que están asignados a la sesión.
     * Asigna la lista de archivos multimedia que se pasa por parámetro y se borran los demás archivos
     */
    public function anadirMultimedia($idSesion, $listaMultimedia) {
        $this->sesionDao->anadirMultimedia($idSesion, $listaMultimedia);
    }

    /**
     * Elimina un archivo multimedia de una sesión
     */
    public function eliminarMultimedia($idSesion, $listaFicheros) {
        $this->sesionDao->eliminarMultimedia($idSesion, $listaFicheros);
    }
}
