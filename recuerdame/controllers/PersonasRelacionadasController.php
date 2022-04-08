<?php

    require_once('daos/PersonaRelacionadaDAO.php');

class PersonasRelacionadasController{

    private $personaRelacionadaDao;
    
    public function __construct() {
        $this->personaRelacionadaDao = new PersonaRelacionadaDAO();
    }

    /**
     * Lista de personas relacionadas
     */
    public function getListaPersonasRelacionadas() {
        return $this->personaRelacionadaDao->getListaPersonasRelacionadas(1);
    }

    /**
     * Lista de personas relacionadas que están asignadas a un recuerdo
     */
    public function getListaPersonasRelacionadasRecuerdo($idRecuerdo) {
        return $this->personaRelacionadaDao->getListaPersonasRelacionadasRecuerdo(1, $idRecuerdo);
    }

    /**
     * Lista de las personas relacionadas de un paciente. Se buscan las que están relacionadas con el recuerdo
     * para indicarlo en la pantalla
     */
    public function getListaPersonasRelacionadasRecuerdoAnadir($idRecuerdo) {
        return $this->personaRelacionadaDao->getListaPersonasRelacionadasRecuerdoAnadir(1, $idRecuerdo);
    }

    /**
     * Datos de una persona relacionada
     */
    public function verPersonaRelacionada($idPersonaRelacionada) {
        return $this->personaRelacionadaDao->getPersonaRelacionada($idPersonaRelacionada);
    }

    /**
     * Crea o modifica una persona relacionada
     */
    public function guardarPersonaRelacionada($personaRelacionada) {
        $idPersonaRelacionada = null;
        if ($personaRelacionada->getIdPersonaRelacionada() == null) {
            $idPersonaRelacionada = $this->personaRelacionadaDao->nuevaPersonaRelacionada($personaRelacionada);
        } else {
            $idPersonaRelacionada = $this->personaRelacionadaDao->modificarPersonaRelacionada($personaRelacionada);
        }

        return $idPersonaRelacionada;
    }

    /**
     * Elimina una persona relacionada
     */
    public function eliminarPersonaRelacionada($idPersonaRelacionada) {
        $this->personaRelacionadaDao->eliminarPersonaRelacionada($idPersonaRelacionada);
    }
}

?>