<?php

    require_once('daos/PersonaRelacionadaDAO.php');

class PersonasRelacionadasController{

    private $personaRelacionadaDao;
    
    public function __construct() {
        $this->personaRelacionadaDao = new PersonaRelacionadaDAO();
    }

    public function getListaPersonasRelacionadas() {
        return $this->personaRelacionadaDao->getListaPersonasRelacionadas(1);
    }

    public function verPersonaRelacionada($idPersonaRelacionada) {
        return $this->personaRelacionadaDao->getPersonaRelacionada($idPersonaRelacionada);
    }

    public function guardarPersonaRelacionada($personaRelacionada) {
        $idPersonaRelacionada = null;
        if ($personaRelacionada->getIdPersonaRelacionada() == null) {
            $idPersonaRelacionada = $this->personaRelacionadaDao->nuevaPersonaRelacionada($personaRelacionada);
        } else {
            $idPersonaRelacionada = $this->personaRelacionadaDao->modificarPersonaRelacionada($personaRelacionada);
        }

        return $idPersonaRelacionada;
    }

    public function eliminarPersonaRelacionada($idPersonaRelacionada) {
        $this->personaRelacionadaDao->eliminarPersonaRelacionada($idPersonaRelacionada);
    }
}

?>