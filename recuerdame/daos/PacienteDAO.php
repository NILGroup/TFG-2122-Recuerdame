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
        $paciente->setApellidos($p['apellidos']);
        $paciente->setGenero($p['genero']);
        $paciente->setLugarNacimiento($p['lugar_nacimiento']);
        $paciente->setNacionalidad($p['nacionalidad']);
        $paciente->setFechaNacimiento($p['fecha_nacimiento']);
        $paciente->setTipoResidencia($p['tipo_residencia']);
        $paciente->setResidenciaActual($p['residencia_actual']);

        return $paciente;
    }
    /**
     * Lista de pacientes
     */
    public function getListaPacientes()
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM paciente
               ")
            or die($conexion->error);

        $listaPacientes = array();
        while ($rows = $row->fetch_assoc()) {
            $listaPacientes[] = $rows;
        };

        return $listaPacientes;
    }

    /**
     * Crea un nuevo paciente
     */
    public function nuevoPaciente($paciente)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "INSERT INTO paciente (id_paciente, nombre, apellidos,
         genero, lugar_nacimiento, nacionalidad, fecha_nacimiento, 
         tipo_residencia, residencia_actual) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            NULL,
            $paciente->getNombre(),
            $paciente->getApellidos(),
            $paciente->getGenero(),
            $paciente->getLugarNacimiento(),
            $paciente->getNacionalidad(),
            $paciente->getFechaNacimiento(),
            $paciente->getTipoResidencia(),
            $paciente->getResidenciaActual()
        ));

        $stmt->close();

        return $conexion->insert_id;
    }

    /**
     * Modifica los datos de un paciente
     */
    public function modificarPaciente($paciente)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "UPDATE paciente
                        SET nombre = ?, apellidos = ?, genero = ?, lugar_nacimiento = ?,
                            nacionalidad = ?, fecha_nacimiento = ?, tipo_residencia = ?, residencia_actual = ?
                        WHERE id_paciente = ?;";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            $paciente->getNombre(),
            $paciente->getApellidos(),
            $paciente->getGenero(),
            $paciente->getLugarNacimiento(),
            $paciente->getNacionalidad(),
            $paciente->getFechaNacimiento(),
            $paciente->getTipoResidencia(),
            $paciente->getResidenciaActual(),
            $paciente->getIdPaciente()
        ));

        $stmt->close();

        return $recuerdo->getIdPaciente();
    }

    /**
     * Elimina un paciente
     */
    public function eliminarPaciente($idPaciente)
    {
        $conexion = $this->db->getConexion();
        $conexion->query("DELETE FROM paciente WHERE id_paciente = '$idPaciente'")
            or die($conexion->error);
    }

}
