<?php

    require_once('configdb.php');
    require_once('models/Sesion.php');

class SesionDAO{

    private $db;

    public function __construct() {
        $this->db = new Configdb();
    }

    public function getSesion($idSesion) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM sesion WHERE id_sesion = '$idSesion'")
            or die ($conexion->error);

        $sesion = $row->fetch_assoc();
        return $sesion;
    }

    public function getListaSesiones($idPaciente) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT s.id_sesion AS idSesion, s.fecha, s.objetivo
            FROM sesion s
            WHERE s.id_paciente = '$idPaciente'")
        or die ($conexion->error);

        while ($rows = $row->fetch_assoc()) {
            $listaSesiones[] = $rows;
        };

        return $listaSesiones;
    }

    public function eliminarSesion($idSesion) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("DELETE * FROM sesion WHERE id_sesion = '$idSesion'")
            or die ($conexion->error);
    }

}

?>