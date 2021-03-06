<?php

require_once('daos/PacienteDAO.php');

class PacientesController
{

    private $pacienteDao;


    public function __construct()
    {
        $this->pacienteDao = new PacienteDAO();
    }

    public function verPaciente($idPaciente)
    {
        return $this->pacienteDao->getPaciente($idPaciente);
    }
    public function guardarPaciente($paciente,$idTerapeuta)
    {
        $idPaciente = null;
        if ($paciente->getIdPaciente() == null) {
            $idPaciente = $this->pacienteDao->nuevoPaciente($paciente);
            $this->pacienteDao->asignarTerapeuta($idTerapeuta, $idPaciente);
        } else {
            $idPaciente = $this->pacienteDao->modificarPaciente($paciente);
        }

        return $idPaciente;
    }

    public function getListaPacientes($idTerapeuta)
    {
        return $this->pacienteDao->getListaPacientes($idTerapeuta);
    }
    public function getListaPacientesSinCuidador($idTerapeuta)
    {
        return $this->pacienteDao->getListaPacientesSinCuidador($idTerapeuta);
    }
    public function eliminarPaciente($idPaciente)
    {
        return $this->pacienteDao->eliminarPaciente($idPaciente);
    }
    public function asignarCuidador($idCuidador, $idPaciente)
    {
        return $this->pacienteDao->asignarCuidador($idCuidador, $idPaciente);
    }
    public function asignarTerapeuta($idTerapeuta, $idPaciente)
    {
        return $this->pacienteDao->asignarTerapeuta($idTerapeuta, $idPaciente);
    }

    public function eliminarTerapeuta($idTerapeuta, $idPaciente)
    {
        return $this->pacienteDao->eliminarTerapeuta($idTerapeuta, $idPaciente);
    }

    public function comprobarTerapeuta($idTerapeuta, $idPaciente)
    {
        return $this->pacienteDao->comprobarTerapeuta($idTerapeuta, $idPaciente);
    }

    public function getPacienteCuidador($idCuidador)
    {
        return $this->pacienteDao->getPacienteCuidador($idCuidador);
    }
}
