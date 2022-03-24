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

    public function getListaRecuerdos($idPaciente)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT r.id_recuerdo AS idRecuerdo, r.fecha, r.nombre, e.nombre AS nombreEtapa,
                c.nombre AS nombreCategoria, em.nombre AS nombreEmocion, es.nombre AS nombreEstado,
                et.nombre AS nombreEtiqueta
                FROM recuerdo r 
                LEFT JOIN etapa e ON e.id_etapa = r.id_etapa
                LEFT JOIN categoria c ON c.id_categoria = r.id_categoria
                LEFT JOIN emocion em ON em.id_emocion = r.id_emocion
                LEFT JOIN estado es ON es.id_estado = r.id_estado
                LEFT JOIN etiqueta et ON et.id_etiqueta = r.id_etiqueta
                WHERE r.id_paciente = '$idPaciente'")
            or die($conexion->error);

        $listaRecuerdos = array();
        while ($rows = $row->fetch_assoc()) {
            $listaRecuerdos[] = $rows;
        };

        return $listaRecuerdos;
    }

    public function nuevoRecuerdo($recuerdo)
    {
        $conexion = $this->db->getConexion();
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
            1
        ));

        $stmt->close();

        return $conexion->insert_id;
    }

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

    public function eliminarRecuerdo($idRecuerdo)
    {
        $conexion = $this->db->getConexion();
        $conexion->query("DELETE FROM recuerdo WHERE id_recuerdo = '$idRecuerdo'")
            or die($conexion->error);
    }

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

    public function getListaRecuerdosHistoriaVida($idPaciente)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT *
                FROM recuerdo r
                WHERE r.id_paciente = '$idPaciente'
                ORDER BY r.fecha")
            or die($conexion->error);

        $listaRecuerdosHistoriaVida = array();
        while ($rows = $row->fetch_assoc()) {
            $listaRecuerdosHistoriaVida[] = $rows;
        };

        return $listaRecuerdosHistoriaVida;
    }

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
}
