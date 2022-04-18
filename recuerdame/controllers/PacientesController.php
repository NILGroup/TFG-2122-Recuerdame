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
    public function guardarPaciente($paciente) {
        $idPaciente = null;
        if ($paciente->getIdPaciente() == null) {
            $idPaciente = $this->pacienteDao->nuevoPaciente($paciente);
        } else {
            $idPaciente = $this->pacienteDao->modificarPaciente($paciente);
        }

        return $idPaciente;
    }
     
    public function getListaPacientes() {
        return $this->pacienteDao->getListaPacientes();
    }
    public function eliminarPaciente($idPaciente) {
        return $this->pacienteDao->eliminarPaciente($idPaciente);
    }
}

?>