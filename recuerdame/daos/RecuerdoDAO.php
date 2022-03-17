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

        $recuerdo = $row->fetch_assoc();
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

        while ($rows = $row->fetch_assoc()) {
            $listaRecuerdos[] = $rows;
        };

        return $listaRecuerdos;
    }

    public function nuevoRecuerdo($recuerdo) {
        $conexion = $this->db->getConexion();

        $consultaSQL = "INSERT INTO recuerdo (id_recuerdo, nombre, fecha, descripcion, localizacion,
            id_etapa, id_categoria, id_emocion, id_estado, id_etiqueta, puntuacion, id_paciente) 
            VALUES (NULL
                    , '" . $recuerdo->getNombre() . "'
                    , '" . $recuerdo->getFecha() . "'
                    , '" . $recuerdo->getDescripcion() . "'
                    , '" . $recuerdo->getLocalizacion() . "'
                    , " . $recuerdo->getIdEtapa() . "
                    , " . $recuerdo->getIdCategoria() . "
                    , " . $recuerdo->getIdEmocion() . "
                    , " . $recuerdo->getIdEstado() . "
                    , " . $recuerdo->getIdEtiqueta() . "
                    , '" . $recuerdo->getPuntuacion() . "'
                    , 1)";
        $conexion->query($consultaSQL) or die($conexion->error);

        return $conexion->insert_id;
    }

    public function modificarRecuerdo($recuerdo) {
        $consultaSQL = "UPDATE recuerdo SET
                        nombre = '" . $recuerdo->getNombre() . "'
                        WHERE id_recuerdo = '" . $recuerdo->getIdRecuerdo() . "'";
        $conexion = $this->db->getConexion();
        $conexion->query($consultaSQL)
            or die($conexion->error);

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

        while ($rows = $row->fetch_assoc()) {
            $listaRecuerdosSesion[] = $rows;
        };

        return $listaRecuerdosSesion;
    }
}
