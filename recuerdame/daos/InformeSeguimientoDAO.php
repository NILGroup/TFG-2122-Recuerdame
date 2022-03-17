<?php

    include('models/InformeSeguimiento.php');
    include('configdb.php');
 
class InformeSeguimientoDAO{

    private $db;

    public function __construct() {
        $this->db = new Configdb();
    }
    
    public function getInformeSeguimiento($idInforme) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM evaluacion WHERE id_evaluacion = '$idInforme'")
            or die ($conexion->error);

        $informe = $row->fetch_assoc();
        return $informe;
    }

    public function getListaInformeSeguimiento($idPaciente) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT i.id_evaluacion AS idInforme, i.fecha, i.diagnostico
            FROM evaluacion i
            WHERE i.id_paciente = '$idPaciente'")
        or die ($conexion->error);

        while ($rows = $row->fetch_assoc()) {
            $listaInformes[] = $rows;
        };

        return $listaInformes;
    }

    public function eliminarInformeSeguimiento($idInforme) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("DELETE * FROM evaluacion WHERE id_evaluacion = '$idInforme'")
            or die ($conexion->error);
    }

}