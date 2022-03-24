<?php

require_once('configdb.php');
require_once('models/Paciente.php');

class PacienteDAO
{
    private $db;

    public function __construct()
    {
        $this->db = new Configdb();
    }

    public function getPaciente($idPaciente)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM paciente WHERE id_paciente = '$idPaciente'")
            or die($conexion->error);

        $p = $row->fetch_assoc();

        $paciente = new Paciente();
        $paciente->setIdPaciente($p['id_paciente']);
        $paciente->setNombre($p['nombre']);
        $paciente->setApelliods($p['apellidos']);
        $paciente->setGenero($p['genero']);
        $paciente->setLugarNacimiento($p['lugar_nacimiento']);
        $paciente->setNacionalidad($p['nacionalidad']);
        $paciente->setFechaNacimiento($p['fecha_nacimiento']);
        $paciente->setIdTipoResidencia($p['tipo_residencia']);
        $paciente->setResidenciaActual($p['residencia_actual']);

        return $paciente;
    }
}
