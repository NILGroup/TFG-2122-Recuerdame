<?php

require_once('configdb.php');
require_once('models/PersonaRelacionada.php');

class PersonaRelacionadaDAO
{

    private $db;

    public function __construct()
    {
        $this->db = new Configdb();
    }

    /**
     * Datos de una persona relacionada.
     */
    public function getPersonaRelacionada($idPersonaRelacionada)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM persona_relacionada WHERE id_persona_relacionada = '$idPersonaRelacionada'")
            or die($conexion->error);

        $p = $row->fetch_assoc();

        $personaRelacionada = new PersonaRelacionada();
        $personaRelacionada->setIdPersonaRelacionada($p['id_persona_relacionada']);
        $personaRelacionada->setNombre($p['nombre']);
        $personaRelacionada->setApellidos($p['apellidos']);
        $personaRelacionada->setTelefono($p['telefono']);
        $personaRelacionada->setOcupacion($p['ocupacion']);
        $personaRelacionada->setEmail($p['email']);
        $personaRelacionada->setIdTipoRelacion($p['id_tipo_relacion']);

        return $personaRelacionada;
    }

    /**
     * Listado de todas las personas relacionadas de un paciente.
     */
    public function getListaPersonasRelacionadas($idPaciente)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT p.id_persona_relacionada AS idPersonaRelacionada,
                p.nombre, p.apellidos, t.nombre AS nombreTipoRelacion
                FROM persona_relacionada p
                LEFT JOIN tipo_relacion t ON t.id_tipo_relacion = p.id_tipo_relacion
                WHERE p.id_paciente = $idPaciente")
            or die($conexion->error);

        $listaPersonasRelacionadas = array();
        while ($rows = $row->fetch_assoc()) {
            $listaPersonasRelacionadas[] = $rows;
        };

        return $listaPersonasRelacionadas;
    }

    /**
     * Listado de las personas relacionadas de un paciente y un recuerdo.
     * Se utiliza al añadir o modificar un recuerdo para mostrar las personas relacionadas de ese recuerdo.
     */
    public function getListaPersonasRelacionadasRecuerdo($idPaciente, $idRecuerdo)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT p.id_persona_relacionada AS idPersonaRelacionada,
                p.nombre, p.apellidos, t.nombre AS nombreTipoRelacion, rp.id_recuerdo
                FROM persona_relacionada p
                LEFT JOIN recuerdo_persona_relacionada rp ON rp.id_persona_relacionada = p.id_persona_relacionada
                LEFT JOIN tipo_relacion t ON t.id_tipo_relacion = p.id_tipo_relacion
                WHERE p.id_paciente = $idPaciente
                AND rp.id_recuerdo = $idRecuerdo")
            or die($conexion->error);

        $listaPersonasRelacionadas = array();
        while ($rows = $row->fetch_assoc()) {
            $listaPersonasRelacionadas[] = $rows;
        };

        return $listaPersonasRelacionadas;
    }

    /**
     * Listado de las personas relacionadas de un paciente con o sin recuerdo.
     * Se utiliza en la pantalla de añadir personas relacionadas a un recuerdo
     * y tiene que mostrar todas las personas relacionadas de un paciente e indicar cuales pertenecen al recuerdo.
     */
    public function getListaPersonasRelacionadasRecuerdoAnadir($idPaciente, $idRecuerdo)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT p.id_persona_relacionada AS idPersonaRelacionada,
                p.nombre, p.apellidos, t.nombre AS nombreTipoRelacion, rp.id_recuerdo
                FROM persona_relacionada p
                LEFT JOIN recuerdo_persona_relacionada rp ON rp.id_persona_relacionada = p.id_persona_relacionada
                LEFT JOIN tipo_relacion t ON t.id_tipo_relacion = p.id_tipo_relacion
                WHERE p.id_paciente = $idPaciente
                AND (rp.id_recuerdo = $idRecuerdo OR rp.id_recuerdo IS NULL)")
            or die($conexion->error);

        $listaPersonasRelacionadas = array();
        while ($rows = $row->fetch_assoc()) {
            $listaPersonasRelacionadas[] = $rows;
        };

        return $listaPersonasRelacionadas;
    }

    /**
     * Añade una nueva persona relacionada al paciente.
     */
    public function nuevaPersonaRelacionada($personaRelacionada)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "INSERT INTO persona_relacionada (id_persona_relacionada, nombre, apellidos, telefono, ocupacion,
                            email, id_tipo_relacion, id_paciente) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            NULL,
            $personaRelacionada->getNombre(),
            $personaRelacionada->getApellidos(),
            $personaRelacionada->getTelefono(),
            $personaRelacionada->getOcupacion(),
            $personaRelacionada->getEmail(),
            $personaRelacionada->getIdTipoRelacion(),
            1
        ));

        $stmt->close();

        return $conexion->insert_id;
    }

    /**
     * Modifica los datos de una persona relacionada.
     */
    public function modificarPersonaRelacionada($personaRelacionada)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "UPDATE persona_relacionada 
                        SET nombre = ?, apellidos = ?, telefono = ?, ocupacion = ?,
                            email = ?, id_tipo_relacion = ?
                        WHERE id_persona_relacionada = ?;";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            $personaRelacionada->getNombre(),
            $personaRelacionada->getApellidos(),
            $personaRelacionada->getTelefono(),
            $personaRelacionada->getOcupacion(),
            $personaRelacionada->getEmail(),
            $personaRelacionada->getIdTipoRelacion(),
            $personaRelacionada->getIdPersonaRelacionada()
        ));

        $stmt->close();

        return $personaRelacionada->getIdPersonaRelacionada();
    }

    /**
     * Elimina el registro de una persona relacionada.
     */
    public function eliminarPersonaRelacionada($idPersonaRelacionada)
    {
        $conexion = $this->db->getConexion();
        $conexion->query("DELETE FROM persona_relacionada WHERE id_persona_relacionada = $idPersonaRelacionada")
            or die($conexion->error);
    }
}
