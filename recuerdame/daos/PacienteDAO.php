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
    public function getListaPacientes($idTerapeuta)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM paciente p join terapeuta t on p.id_paciente = t.id_paciente WHERE id_terapeuta = '$idTerapeuta'")
            or die($conexion->error);

        $listaPacientes = array();
        while ($rows = $row->fetch_assoc()) {
            $listaPacientes[] = $rows;
        };

        return $listaPacientes;
    }
    //lista de pacientes sin cuidador asignado
    public function getListaPacientesSinCuidador($idTerapeuta)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM paciente p join terapeuta t on p.id_paciente = t.id_paciente WHERE id_cuidador IS NULL and id_terapeuta = '$idTerapeuta'")
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
         tipo_residencia, residencia_actual, id_cuidador) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
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
            $paciente->getResidenciaActual(),
            $paciente->getIdCuidador()
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

        return $paciente->getIdPaciente();
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

    /**
     * Asignar id_cuidador al paciente
     */
    public function asignarCuidador($idCuidador, $idPaciente)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "UPDATE paciente
                        SET id_cuidador = ?
                        WHERE id_paciente = ?;";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            $idCuidador,
            $idPaciente
        ));

        $stmt->close();

        return 1;
    }

    public function asignarTerapeuta($idTerapeuta, $idPaciente){

        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM terapeuta WHERE id_paciente = '$idPaciente' and id_terapeuta = '$idTerapeuta'")
            or die($conexion->error);

        $u = $row->fetch_assoc();

        if ($u == null){

            $consultaSQL = "INSERT INTO terapeuta (id_paciente, id_terapeuta)
                    VALUES (?,?)";
            $stmt = $conexion->prepare($consultaSQL);
            $stmt->execute(array(
                $idPaciente,
                $idTerapeuta
            ));

            $stmt->close();
            return 1;
        } else {
            return NULL;
        }

    }


    public function comprobarTerapeuta($idTerapeuta, $idPaciente)
    {
       
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM terapeuta WHERE id_paciente = '$idPaciente' and id_terapeuta = '$idTerapeuta'")
            or die($conexion->error);

        $u = $row->fetch_assoc();

        if ($u == null){
            return NULL;
        } else {
            return 1;
        }
    }


    public function eliminarTerapeuta($idTerapeuta, $idPaciente){
       

        $conexion = $this->db->getConexion();
        $conexion->query("DELETE FROM terapeuta WHERE id_terapeuta = $idTerapeuta AND id_paciente = $idPaciente")
            or die($conexion->error);
    
        return 1;
    }
    /**
     * Recupera el paciente asociado al cuidador logado
     */
    public function getPacienteCuidador($idCuidador)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM paciente WHERE id_cuidador = '$idCuidador'")
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
}
