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
        $idPaciente = $_SESSION['idPaciente'];
        return $this->personaRelacionadaDao->getListaPersonasRelacionadas($idPaciente);
    }

    /**
     * Lista de personas relacionadas que están asignadas a un recuerdo
     */
    public function getListaPersonasRelacionadasRecuerdo($idRecuerdo) {
        $idPaciente = $_SESSION['idPaciente'];
        return $this->personaRelacionadaDao->getListaPersonasRelacionadasRecuerdo($idPaciente, $idRecuerdo);
    }

    /**
     * Lista de las personas relacionadas de un paciente. Se buscan las que están relacionadas con el recuerdo
     * para indicarlo en la pantalla
     */
    public function getListaPersonasRelacionadasRecuerdoAnadir($idRecuerdo) {
        $idPaciente = $_SESSION['idPaciente'];
        return $this->personaRelacionadaDao->getListaPersonasRelacionadasRecuerdoAnadir($idPaciente, $idRecuerdo);
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
        $idPaciente = $_SESSION['idPaciente'];
        $idPersonaRelacionada = null;
        if ($personaRelacionada->getIdPersonaRelacionada() == null) {
            $idPersonaRelacionada = $this->personaRelacionadaDao->nuevaPersonaRelacionada($idPaciente, $personaRelacionada);
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