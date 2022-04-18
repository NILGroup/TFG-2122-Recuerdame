<?php

    require_once('daos/RecuerdoDAO.php');

class RecuerdosController{

    private $recuerdoDao;
    
    public function __construct() {
        $this->recuerdoDao = new RecuerdoDAO();
    }

    /**
     * Listado de recuerdos de un paciente
     */
    public function getListaRecuerdos() {
        return $this->listaRecuerdos = $this->recuerdoDao->getListaRecuerdos(1);
    }

    /**
     * Datos de un recuerdo
     */
    public function verRecuerdo($idRecuerdo) {
        return $this->recuerdoDao->getRecuerdo($idRecuerdo);
    }

    /**
     * Crea o modifica un recuerdo
     */
    public function guardarRecuerdo($recuerdo) {
        $idRecuerdo = null;
        if ($recuerdo->getIdRecuerdo() == null) {
            $idRecuerdo = $this->recuerdoDao->nuevoRecuerdo($recuerdo);
        } else {
            $idRecuerdo = $this->recuerdoDao->modificarRecuerdo($recuerdo);
        }

        return $idRecuerdo;
    }


    /**
     * Elimina el registro de un recuerdo
     */
    public function eliminarRecuerdo($idRecuerdo) {
        $this->recuerdoDao->eliminarRecuerdo($idRecuerdo);
    }

    /**
     * Lista de recuerdos de una sesión
     */
    public function getListaRecuerdosSesion($idSesion) {
        $listaSesiones = array();
        if ($idSesion != null) {
            $listaSesiones = $this->recuerdoDao->getListaRecuerdosSesion($idSesion);
        }

        return $listaSesiones;
    }

     /**
     * Lista de las recuerdos relacionados con una sesion. Se buscan las que están relacionadas con el recuerdo
     * para indicarlo en la pantalla
     */
    public function getListaRecuerdosRelacionadosSesionAnadir($idRecuerdo) {
        return $this->recuerdoDao->getListaRecuerdosRelacionadasSesionAnadir(1, $idRecuerdo);
    }
    

    /**
     * Lista de archivos multimedia de un recuerdo
     */
    public function getListaMultimediaRecuerdo($idRecuerdo) {
        return $this->recuerdoDao->getListaMultimediaRecuerdo($idRecuerdo);
    }

    /**
     * Registra un nuevo fichero multimedia y lo asigna a un recuerdo
     */
    public function guardarMultimedia($idRecuerdo, $listaFicheros) {
        $this->recuerdoDao->nuevoMultimedia($idRecuerdo, $listaFicheros);
    }

    /**
     * Actualiza la lista de archivos multimedia que están asignados al recuerdo.
     * Asigna la lista de archivos multimedia que se pasa por parámetro y se borran los demás archivos
     */
    public function anadirMultimedia($idRecuerdo, $listaMultimedia) {
        $this->recuerdoDao->anadirMultimedia($idRecuerdo, $listaMultimedia);
    }

    /**
     * Elimina un archivo multimedia de un recuerdo
     */
    public function eliminarMultimedia($idRecuerdo, $listaFicheros) {
        $this->recuerdoDao->eliminarMultimedia($idRecuerdo, $listaFicheros);
    }

    /**
     * Registra una nueva persona relacionada y la asigna a un recuerdo
     */
    public function guardarPersonaRelacionada($idRecuerdo, $personaRelacionada) {
        $idPersonaRelacionada = null;
        if ($personaRelacionada->getIdPersonaRelacionada() == null) {
            $idPersonaRelacionada = $this->recuerdoDao->nuevaPersonaRelacionada($idRecuerdo, $personaRelacionada);
        } else {
            $this->personaRelacionadaDao = new PersonaRelacionadaDAO();
            $idPersonaRelacionada = $this->personaRelacionadaDao->modificarPersonaRelacionada($personaRelacionada);
        }

        return $idPersonaRelacionada;
    }

    /**
     * Actualiza la lista de personas relacionadas que están asignadas al recuerdo.
     * Asigna la lista de personas relacionadas que se pasa por parámetro y se borran las demás relaciones
     */
    public function anadirPersonasRelacionadas($idRecuerdo, $listaPersonasRelacionadas) {
        $this->recuerdoDao->anadirPersonasRelacionadas($idRecuerdo, $listaPersonasRelacionadas);
    }

    /**
     * Elimina la relación entre el recuerdo y una persona relacionada
     */
    public function eliminarPersonarelacionada($idRecuerdo, $idPersonaRelacionada) {
        $this->recuerdoDao->eliminarPersonaRelacionada($idRecuerdo, $idPersonaRelacionada);
    }
}

?>