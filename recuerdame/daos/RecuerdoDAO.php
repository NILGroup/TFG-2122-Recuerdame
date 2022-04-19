<?php

require_once('configdb.php');
require_once('models/Recuerdo.php');

class RecuerdoDAO
{

    private $db;

    public function __construct()
    {
        $this->db = new Configdb();
    }

    /**
     * Datos de un recuerdo.
     */
    public function getRecuerdo($idRecuerdo)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM recuerdo WHERE id_recuerdo = '$idRecuerdo'")
            or die($conexion->error);

        $r = $row->fetch_assoc();

        $recuerdo = new Recuerdo();
        $recuerdo->setIdRecuerdo($r['id_recuerdo']);
        $recuerdo->setFecha($r['fecha']);
        $recuerdo->setNombre($r['nombre']);
        $recuerdo->setDescripcion($r['descripcion']);
        $recuerdo->setLocalizacion($r['localizacion']);
        $recuerdo->setIdEtapa($r['id_etapa']);
        $recuerdo->setIdCategoria($r['id_categoria']);
        $recuerdo->setIdEmocion($r['id_emocion']);
        $recuerdo->setIdEstado($r['id_estado']);
        $recuerdo->setIdEtiqueta($r['id_etiqueta']);
        $recuerdo->setPuntuacion($r['puntuacion']);
        $recuerdo->setIdPaciente($r['id_paciente']);

        return $recuerdo;
    }

    /**
     * Lista de recuerdos de un paciente.
     */
    public function getListaRecuerdos($idPaciente)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT r.id_recuerdo AS idRecuerdo, r.fecha, r.nombre, e.nombre AS nombreEtapa,
                c.nombre AS nombreCategoria, em.nombre AS nombreEmocion, es.nombre AS nombreEstado,
                et.nombre AS nombreEtiqueta, r.descripcion
                FROM recuerdo r 
                LEFT JOIN etapa e ON e.id_etapa = r.id_etapa
                LEFT JOIN categoria c ON c.id_categoria = r.id_categoria
                LEFT JOIN emocion em ON em.id_emocion = r.id_emocion
                LEFT JOIN estado es ON es.id_estado = r.id_estado
                LEFT JOIN etiqueta et ON et.id_etiqueta = r.id_etiqueta
                WHERE r.id_paciente = '$idPaciente'
                ORDER BY r.fecha ASC")
            or die($conexion->error);

        $listaRecuerdos = array();
        while ($rows = $row->fetch_assoc()) {
            $listaRecuerdos[] = $rows;
        };

        return $listaRecuerdos;
    }

    /**
     * Crea un nuevo recuerdo.
     */
    public function nuevoRecuerdo($idPaciente, $recuerdo)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "INSERT INTO recuerdo (nombre, fecha, descripcion, localizacion,
                            id_etapa, id_categoria, id_emocion, id_estado, id_etiqueta, puntuacion, id_paciente) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            $recuerdo->getNombre(),
            $recuerdo->getFecha(),
            $recuerdo->getDescripcion(),
            $recuerdo->getLocalizacion(),
            $recuerdo->getIdEtapa(),
            $recuerdo->getIdCategoria(),
            $recuerdo->getIdEmocion(),
            $recuerdo->getIdEstado(),
            $recuerdo->getIdEtiqueta(),
            $recuerdo->getPuntuacion(),
            $idPaciente
        ));

        $stmt->close();

        return $conexion->insert_id;
    }

    /**
     * Modifica los datos de un recuerdo.
     */
    public function modificarRecuerdo($recuerdo)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "UPDATE recuerdo 
                        SET nombre = ?, fecha = ?, descripcion = ?, localizacion = ?,
                            id_etapa = ?, id_categoria = ?, id_emocion = ?, id_estado = ?,
                            id_etiqueta = ?, puntuacion = ?
                        WHERE id_recuerdo = ?;";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            $recuerdo->getNombre(),
            $recuerdo->getFecha(),
            $recuerdo->getDescripcion(),
            $recuerdo->getLocalizacion(),
            $recuerdo->getIdEtapa(),
            $recuerdo->getIdCategoria(),
            $recuerdo->getIdEmocion(),
            $recuerdo->getIdEstado(),
            $recuerdo->getIdEtiqueta(),
            $recuerdo->getPuntuacion(),
            $recuerdo->getIdRecuerdo()
        ));

        $stmt->close();

        return $recuerdo->getIdRecuerdo();
    }

    /**
     * Elimina el registro de una sesión.
     */
    public function eliminarRecuerdo($idRecuerdo)
    {
        $conexion = $this->db->getConexion();
        $conexion->query("DELETE FROM recuerdo WHERE id_recuerdo = '$idRecuerdo'")
            or die($conexion->error);
    }

    /**
     * Lista de los recuerdos de una sesión.
     */
    public function getListaRecuerdosSesion($idSesion)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT r.id_recuerdo AS idRecuerdo, s.id_sesion AS idSesion, r.fecha, r.nombre, e.nombre AS nombreEtapa,
        c.nombre AS nombreCategoria, em.nombre AS nombreEmocion, es.nombre AS nombreEstado,
        et.nombre AS nombreEtiqueta 
                FROM sesion_recuerdo s 
                JOIN recuerdo r ON r.id_recuerdo = s.id_recuerdo
                LEFT JOIN etapa e ON e.id_etapa = r.id_etapa
                LEFT JOIN categoria c ON c.id_categoria = r.id_categoria
                LEFT JOIN emocion em ON em.id_emocion = r.id_emocion
                LEFT JOIN estado es ON es.id_estado = r.id_estado
                LEFT JOIN etiqueta et ON et.id_etiqueta = r.id_etiqueta
                WHERE s.id_sesion = '$idSesion'")
            or die($conexion->error);

        $listaRecuerdosSesion = array();
        while ($rows = $row->fetch_assoc()) {
            $listaRecuerdosSesion[] = $rows;
        };

        return $listaRecuerdosSesion;
    }

    /**
     * Lista de recuerdos de un paciente para mostrar la Historia de Vida.
     */
    public function getListaRecuerdosHistoriaVida($idPaciente, $fechaInicio, $fechaFin, $idEtapa, $idCategoria, $idEtiqueta)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "SELECT *
        FROM recuerdo r
        WHERE r.id_paciente = '$idPaciente'";

        if ($fechaInicio != NULL && !empty($fechaInicio)) {
            $consultaSQL = $consultaSQL . "AND r.fecha >= '$fechaInicio'";
        }

        if ($fechaFin != NULL && !empty($fechaFin)) {
            $consultaSQL = $consultaSQL . "AND r.fecha <= '$fechaFin'";
        }

        if ($idEtapa != NULL && !empty($idEtapa)) {
            $consultaSQL = $consultaSQL . "AND r.id_etapa = '$idEtapa'";
        }

        if ($idCategoria != NULL && !empty($idCategoria)) {
            $consultaSQL = $consultaSQL . "AND r.id_categoria = '$idCategoria'";
        }

        if ($idEtiqueta != NULL && !empty($idEtiqueta)) {
            $consultaSQL = $consultaSQL . "AND r.id_etiqueta = '$idEtiqueta'";
        }

        if ($idEtiqueta != NULL && !empty($idEtiqueta)) {
            $consultaSQL = $consultaSQL . "ORDER BY r.fecha";
        }

        $row = $conexion->query($consultaSQL) or die($conexion->error);

        $listaRecuerdosHistoriaVida = array();
        while ($rows = $row->fetch_assoc()) {
            $listaRecuerdosHistoriaVida[] = $rows;
        };

        return $listaRecuerdosHistoriaVida;
    }

    /**
     * Listado de las sesiones de un paciente con o sin recuerdo.
     * Se utiliza en la pantalla de añadir personas relacionadas a un recuerdo
     * y tiene que mostrar todas las personas relacionadas de un paciente e indicar cuales pertenecen al recuerdo.
     */
    public function getListaRecuerdosRelacionadasSesionAnadir($idPaciente, $idSesion)
    {
        $conexion = $this->db->getConexion();

        $row = $conexion->query("SELECT r.id_recuerdo AS idRecuerdo,
        r.fecha, r.nombre, e.nombre AS nombreEtapa,
        c.nombre AS nombreCategoria, em.nombre AS nombreEmocion, es.nombre AS nombreEstado,
        et.nombre AS nombreEtiqueta,
        (SELECT sr.id_sesion FROM sesion_recuerdo sr 
        WHERE sr.id_recuerdo = r.id_recuerdo AND sr.id_sesion = $idSesion) AS id_sesion
        FROM recuerdo r
        LEFT JOIN etapa e ON e.id_etapa = r.id_etapa
        LEFT JOIN categoria c ON c.id_categoria = r.id_categoria
        LEFT JOIN emocion em ON em.id_emocion = r.id_emocion
        LEFT JOIN estado es ON es.id_estado = r.id_estado
        LEFT JOIN etiqueta et ON et.id_etiqueta = r.id_etiqueta
        AND r.id_paciente = $idPaciente")
            or die($conexion->error);

        $listaRecuerdos = array();
        while ($rows = $row->fetch_assoc()) {
            $listaRecuerdos[] = $rows;
        };

        return $listaRecuerdos;
    }

    /**
     * Lista de los archivos multimedia de un recuerdo.
     */
    public function getListaMultimediaRecuerdo($idRecuerdo)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT m.*
                FROM multimedia m
                JOIN recuerdo_multimedia rm ON m.id_multimedia = rm.id_multimedia
                WHERE rm.id_recuerdo = $idRecuerdo")
            or die($conexion->error);

        $listaMultimedia = array();
        while ($rows = $row->fetch_assoc()) {
            $listaMultimedia[] = $rows;
        };

        return $listaMultimedia;
    }

    /**
     * Crea un nuevo archivo multimedia y lo asigna a un recuerdo.
     */
    public function nuevoMultimedia($idRecuerdo, $listaFicheros)
    {
        try {
            $conexion = $this->db->getConexion();
            $conexion->begin_transaction();

            foreach ($listaFicheros as $fichero) {
                $consultaSQL = "INSERT INTO multimedia (id_multimedia, nombre, fichero) 
                            VALUES (?, ?, ?);";
                $stmt = $conexion->prepare($consultaSQL);
                $stmt->execute(array(
                    NULL,
                    $fichero,
                    $fichero
                ));

                $idMultimedia = $conexion->insert_id;

                $consultaSQL = "INSERT INTO recuerdo_multimedia (id_recuerdo, id_multimedia) 
                            VALUES (?, ?);";
                $stmtr = $conexion->prepare($consultaSQL);
                $stmtr->execute(array(
                    $idRecuerdo,
                    $idMultimedia
                ));
            }
            $conexion->commit();
            $stmt->close();
            $stmtr->close();

        } catch (Exception $e) {
            $conexion->rollback();
        }

        return $idMultimedia;
    }

    /**
     * Asigna una lista de archivos multimedia existentes al recuerdo.
     */
    public function anadirMultimedia($idRecuerdo, $listaMultimedia) 
    {
        try {
            $conexion = $this->db->getConexion();
            $conexion->begin_transaction();

            // Se borran todos los archivos multimedia del recuerdo para después actualizarlas
            $conexion->query("DELETE FROM recuerdo_multimedia WHERE id_recuerdo = $idRecuerdo")
            or die($conexion->error);

            foreach ($listaMultimedia as $idMultimedia) {
                // Se busca si ya existe la relación entre el archivo y el recuerdo
                $row = $conexion->query("SELECT * FROM recuerdo_multimedia WHERE id_recuerdo = $idRecuerdo AND id_multimedia = $idMultimedia")
                             or die($conexion->error);
                
                // Si no existe, se crea
                if ($row->num_rows == 0){
                    $consultaSQL = "INSERT INTO recuerdo_multimedia (id_recuerdo, id_multimedia) 
                    VALUES (".$idRecuerdo.", ".$idMultimedia.");";

                    $conexion->query($consultaSQL) or die($conexion->error);
                }
            }

            $conexion->commit();

        } catch (Exception $e) {
            $conexion->rollback();
        }
    }

    /**
     * Elimina la relación de un archivo multimedia con un recuerdo.
     */
    public function eliminarMultimedia($idRecuerdo, $idMultimedia)
    {
        $conexion = $this->db->getConexion();
        $conexion->query("DELETE FROM recuerdo_multimedia WHERE id_recuerdo = $idRecuerdo AND id_multimedia = $idMultimedia")
            or die($conexion->error);
    }

    /**
     * Crea una nueva persona relacionada y la asigna a un recuerdo.
     */
    public function nuevaPersonaRelacionada($idPaciente, $idRecuerdo, $personaRelacionada)
    {
        try {
            $conexion = $this->db->getConexion();
            $conexion->begin_transaction();
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
                $idPaciente
            ));

            $idPersonaRelacionada = $conexion->insert_id;

            $consultaSQL = "INSERT INTO recuerdo_persona_relacionada (id_recuerdo, id_persona_relacionada) 
                        VALUES (?, ?);";
            $stmtr = $conexion->prepare($consultaSQL);
            $stmtr->execute(array(
                $idRecuerdo,
                $idPersonaRelacionada
            ));

            $conexion->commit();
            $stmt->close();
            $stmtr->close();

        } catch (Exception $e) {
            $conexion->rollback();
        }

        return $idPersonaRelacionada;
    }

    /**
     * Asigna una lista de personas relacionadas existentes al recuerdo.
     */
    public function anadirPersonasRelacionadas($idRecuerdo, $listaPersonasRelacionadas) 
    {
        try {
            $conexion = $this->db->getConexion();
            $conexion->begin_transaction();

            // Se borran todas las personas relacionadas del recuerdo para después actualizarlas
            $conexion->query("DELETE FROM recuerdo_persona_relacionada WHERE id_recuerdo = $idRecuerdo")
            or die($conexion->error);

            foreach ($listaPersonasRelacionadas as $idPersonaRelacionada) {
                // Se busca si ya existe la relación entre la persona relacionada y el recuerdo
                $row = $conexion->query("SELECT * FROM recuerdo_persona_relacionada WHERE id_recuerdo = $idRecuerdo AND id_persona_relacionada = $idPersonaRelacionada")
                             or die($conexion->error);
                
                // Si no existe, se crea
                if ($row->num_rows == 0){
                    $consultaSQL = "INSERT INTO recuerdo_persona_relacionada (id_recuerdo, id_persona_relacionada) 
                    VALUES (".$idRecuerdo.", ".$idPersonaRelacionada.");";

                    $conexion->query($consultaSQL) or die($conexion->error);
                }
            }

            $conexion->commit();

        } catch (Exception $e) {
            $conexion->rollback();
        }
    }

    /**
     * Elimina la relación de una persona relacionada con un recuerdo.
     */
    public function eliminarPersonaRelacionada($idRecuerdo, $idPersonaRelacionada)
    {
        $conexion = $this->db->getConexion();
        $conexion->query("DELETE FROM recuerdo_persona_relacionada WHERE id_recuerdo = $idRecuerdo AND id_persona_relacionada = $idPersonaRelacionada")
            or die($conexion->error);
    }
}
