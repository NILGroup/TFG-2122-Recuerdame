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

    public function nuevaSesion($sesion) {
        $conexion = $this->db->getConexion();
        $consultaSQL = "INSERT INTO sesion (id_sesion, fecha, id_etapa, objetivo, descripcion,
                            barreras, facilitadores, id_Paciente) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            NULL,
            $sesion->getIdSesion(), 
            $sesion->getFecha(), 
            $sesion->getIdEtapa(),
            $sesion->getObjetivo(),
            $sesion->getDescripcion(),
            $sesion->getBarreras(),
            $sesion->getFacilitadores(),
            $sesion->getIdPaciente(),
            1
            ));

        $stmt->close();

        return $conexion->insert_id;
    }

    public function modificarSesion($sesion) {
        $conexion = $this->db->getConexion();
        $consultaSQL = "UPDATE sesion 
                        SET fecha = ?, id_etapa = ?, objetivo = ?, descripcion = ?, barreras = ?, 
                        facilitadores = ?, id_paciente = ?
                        WHERE id_sesion = ?;";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            $sesion->getFecha(), 
            $sesion->getIdEtapa(),
            $sesion->getObjetivo(),
            $sesion->getDescripcion(),
            $sesion->getBarreras(),
            $sesion->getFacilitadores(),
            $sesion->getIdPaciente(),
            $sesion->getIdSesion(), 
            ));

        $stmt->close();

        return $sesion->getIdSesion();
    }

    public function eliminarSesion($idSesion) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("DELETE * FROM sesion WHERE id_sesion = '$idSesion'")
            or die ($conexion->error);
    }

}

?>