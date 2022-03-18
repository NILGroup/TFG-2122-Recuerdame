<?php

    require_once('models/InformeSesion.php');
    require_once('configdb.php');
 
class InformeSesionDAO{

    private $db;

    public function __construct() {
        $this->db = new Configdb();
    }
    
    public function getInformeSesion($idInforme) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM sesion WHERE id_sesion = '$idInforme'")
            or die ($conexion->error);

        $informe = $row->fetch_assoc();
        return $informe;
    }

    public function getListaInformeSesion($idPaciente) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT s.id_sesion AS idInforme, s.respuesta, s.observaciones,  s.fecha_finalizada
            FROM sesion s
            WHERE s.fecha_finalizada IS NOT NULL")
        or die ($conexion->error);

        while ($rows = $row->fetch_assoc()) {
            $listaInformes[] = $rows;
        };

        return $listaInformes;
    }

    public function eliminarInformeSesion($idInforme) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("DELETE * FROM sesion WHERE id_sesion = '$idInforme'")
            or die ($conexion->error);
    }

}