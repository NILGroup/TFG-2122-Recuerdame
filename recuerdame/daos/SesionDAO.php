<?php

require_once('configdb.php');
require_once('models/sesion.php');

class SesionDAO
{

    private $db;

    public function __construct()
    {
        $this->db = new Configdb();
    }

    public function getSesion($idSesion)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT s.*, u.nombre as nombre, u.apellidos as apellidos FROM sesion s join usuario u on u.id_usuario = s.id_usuario WHERE id_sesion = '$idSesion'")
            or die($conexion->error);

        $s = $row->fetch_assoc();

        $sesion = new Sesion();
        $sesion->setIdSesion($s['id_sesion']);
        $sesion->setFecha($s['fecha']);
        $sesion->setIdEtapa($s['id_etapa']);
        $sesion->setObjetivo($s['objetivo']);
        $sesion->setDescripcion($s['descripcion']);
        $sesion->setBarreras($s['barreras']);
        $sesion->setFacilitadores($s['facilitadores']);
        $sesion->setIdPaciente($s['id_paciente']);
        $sesion->setIdUsuario($s['id_usuario']);
        $sesion->setFechaFinalizada($s['fecha_finalizada']);
        $sesion->setRespuesta($s['respuesta']);
        $sesion->setObservaciones($s['observaciones']);

        $nombre = '';
        if ($s['nombre'] != null) {
            $nombre = $s['nombre'];
        }

        if ($s['apellidos'] != null) {
            $nombre .= " " . $s['apellidos'];
        }

        $sesion->setNombreUsuario($nombre);

        return $sesion;
    }

    public function getListaSesiones($idPaciente)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT s.id_sesion AS idSesion, s.fecha, s.objetivo, s.fecha_finalizada
            FROM sesion s
            WHERE s.id_paciente = '$idPaciente'
            ORDER BY s.fecha DESC")
            or die($conexion->error);

        $listaSesiones = array();
        while ($rows = $row->fetch_assoc()) {
            $listaSesiones[] = $rows;
        };

        return $listaSesiones;
    }

    public function nuevaSesion($idPaciente, $sesion)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "INSERT INTO sesion (id_sesion, fecha, id_etapa, objetivo, descripcion,
                            barreras, facilitadores, id_usuario, id_paciente) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            NULL,
            $sesion->getFecha(),
            $sesion->getIdEtapa(),
            $sesion->getObjetivo(),
            $sesion->getDescripcion(),
            $sesion->getBarreras(),
            $sesion->getFacilitadores(),
            $sesion->getIdUsuario(),
            $idPaciente
        ));

        $stmt->close();

        return $conexion->insert_id;
    }

    public function modificarSesion($sesion)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "UPDATE sesion 
                        SET fecha = ?, id_etapa = ?, objetivo = ?, descripcion = ?, barreras = ?, 
                        facilitadores = ?, id_usuario = ?
                        WHERE id_sesion = ?;";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            $sesion->getFecha(),
            $sesion->getIdEtapa(),
            $sesion->getObjetivo(),
            $sesion->getDescripcion(),
            $sesion->getBarreras(),
            $sesion->getFacilitadores(),
            $sesion->getIdUsuario(),
            $sesion->getIdSesion()
        ));

        $stmt->close();

        return $sesion->getIdSesion();
    }

    public function eliminarSesion($idSesion)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("DELETE FROM sesion WHERE id_sesion = '$idSesion'")
            or die($conexion->error);
    }

    /**
     * Asigna una lista de recuerdos existentes a la sesión.
     */
    public function anadirRecuerdos($idSesion, $listaRecuerdos)
    {
        try {
            $conexion = $this->db->getConexion();
            $conexion->begin_transaction();

            // Se borran todos los recuerdos de la sesió para después actualizarlas
            $conexion->query("DELETE FROM sesion_recuerdo WHERE id_sesion = $idSesion")
                or die($conexion->error);

            foreach ($listaRecuerdos as $idRecuerdo) {
                // Se busca si ya existe la relación entre el recuerdo y la sesión
                $row = $conexion->query("SELECT * FROM sesion_recuerdo WHERE id_recuerdo = $idRecuerdo AND id_sesion = $idSesion")
                    or die($conexion->error);

                // Si no existe, se crea
                if ($row->num_rows == 0) {
                    $consultaSQL = "INSERT INTO sesion_recuerdo (id_sesion, id_recuerdo) 
                    VALUES (" . $idSesion . ", " . $idRecuerdo . ");";

                    $conexion->query($consultaSQL) or die($conexion->error);
                }
            }

            $conexion->commit();
        } catch (Exception $e) {
            $conexion->rollback();
        }
    }

    /**
     * Crea un nuevo recuerdo y lo asigna a una sesión.
     */
    public function nuevoRecuerdo($idPaciente, $idSesion, $recuerdo)
    {
        try {
            $conexion = $this->db->getConexion();
            $conexion->begin_transaction();

            $consultaSQL = "INSERT INTO recuerdo (id_recuerdo, nombre, fecha, descripcion, localizacion,
                            id_etapa, id_categoria, id_emocion, id_estado, id_etiqueta, puntuacion, id_paciente) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

            $stmt = $conexion->prepare($consultaSQL);

            $stmt->execute(array(
                NULL,
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

            $idRecuerdo = $conexion->insert_id;

            $consultaSQL = "INSERT INTO sesion_recuerdo (id_sesion, id_recuerdo) 
                            VALUES (?, ?);";
            $stmtr = $conexion->prepare($consultaSQL);

            $stmtr->execute(array(
                $idSesion,
                $idRecuerdo
            ));

            $conexion->commit();
            $stmt->close();
            $stmtr->close();

        } catch (Exception $e) {
            $conexion->rollback();
        }

        return $idRecuerdo;
    }

    /**
     * Elimina la relación de un recuerdo con una sesión
     */
    public function eliminarRecuerdo($idSesion, $idRecuerdo)
    {
        $conexion = $this->db->getConexion();
        $conexion->query("DELETE FROM sesion_recuerdo WHERE id_sesion = $idSesion AND id_recuerdo = $idRecuerdo")
            or die($conexion->error);
    }

    /**
     * Lista de los archivos multimedia de una sesión.
     */
    public function getListaMultimediaSesion($idSesion)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT m.*
                FROM multimedia m
                JOIN sesion_multimedia sm ON m.id_multimedia = sm.id_multimedia
                WHERE sm.id_sesion = $idSesion")
            or die($conexion->error);

        $listaMultimedia = array();
        while ($rows = $row->fetch_assoc()) {
            $listaMultimedia[] = $rows;
        };

        return $listaMultimedia;
    }

    /**
     * Crea un nuevo archivo multimedia y lo asigna a una sesión.
     */
    public function nuevoMultimedia($idSesion, $listaFicheros)
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

                $consultaSQL = "INSERT INTO sesion_multimedia (id_sesion, id_multimedia) 
                            VALUES (?, ?);";
                $stmtr = $conexion->prepare($consultaSQL);
                $stmtr->execute(array(
                    $idSesion,
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
     * Asigna una lista de archivos multimedia existentes a la sesión.
     */
    public function anadirMultimedia($idSesion, $listaMultimedia)
    {
        try {
            $conexion = $this->db->getConexion();
            $conexion->begin_transaction();

            // Se borran todos los archivos multimedia de la sesión para después actualizarlas
            $conexion->query("DELETE FROM sesion_multimedia WHERE id_sesion = $idSesion")
                or die($conexion->error);

            foreach ($listaMultimedia as $idMultimedia) {
                // Se busca si ya existe la relación entre el archivo y la sesión
                $row = $conexion->query("SELECT * FROM sesion_multimedia WHERE id_sesion = $idSesion AND id_multimedia = $idMultimedia")
                    or die($conexion->error);

                // Si no existe, se crea
                if ($row->num_rows == 0) {
                    $consultaSQL = "INSERT INTO sesion_multimedia (id_sesion, id_multimedia) 
                    VALUES (" . $idSesion . ", " . $idMultimedia . ");";

                    $conexion->query($consultaSQL) or die($conexion->error);
                }
            }

            $conexion->commit();
        } catch (Exception $e) {
            $conexion->rollback();
        }
    }

    /**
     * Elimina la relación de un archivo multimedia con una sesión.
     */
    public function eliminarMultimedia($idSesion, $idMultimedia)
    {
        $conexion = $this->db->getConexion();
        $conexion->query("DELETE FROM sesion_multimedia WHERE id_sesion = $idSesion AND id_multimedia = $idMultimedia")
            or die($conexion->error);
    }
}
