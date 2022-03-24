<?php

    require_once('daos/PacienteDAO.php');

class PacientesController{

    private $pacienteDao;
    
    public function __construct() {
        $this->pacienteDao = new PacienteDAO();
    }

    public function verPaciente($idPaciente) {
        return $this->pacienteDao->getPaciente($idPaciente);
    }
}

?>