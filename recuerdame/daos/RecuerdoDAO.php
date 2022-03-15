<?php

    require_once('configdb.php');
    require_once('models/Recuerdo.php');

class RecuerdoDAO{

    private $db;

    public function __construct() {
        $this->db = new Configdb();
    }

    public function getRecuerdo($idRecuerdo) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM recuerdo WHERE id_recuerdo = '$idRecuerdo'")
            or die ($conexion->error);

        $recuerdo = $row->fetch_assoc();
        return $recuerdo;
    }

    public function getListaRecuerdos($idPaciente) {
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
            or die ($conexion->error);

        while ($rows = $row->fetch_assoc()) {
            $listaRecuerdos[] = $rows;
        };

        return $listaRecuerdos;
    }

    public function eliminarRecuerdo($idRecuerdo) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("DELETE * FROM recuerdo WHERE id_recuerdo = '$idRecuerdo'")
            or die ($conexion->error);
    }

}

?>