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
        $row = $conexion->query("SELECT s.*, u.nombre as nombreUsuario FROM sesion s join usuario u on u.id_usuario = s.id_usuario WHERE id_sesion = '$idSesion'")
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
        $sesion->setIdUsuario($s['id_usuario']);
        $sesion->setFechaFinalizada($s['fecha_finalizada']);
        $sesion->setRespuesta($s['respuesta']);
        $sesion->setObservaciones($s['observaciones']);
        $sesion->setNombreUsuario($s['nombreUsuario']);


        return $sesion;
    }

    public function getListaSesiones($idPaciente) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT s.id_sesion AS idSesion, s.fecha, s.objetivo
            FROM sesion s
            WHERE s.id_paciente = '$idPaciente'")
        or die ($conexion->error);

        $listaSesiones = array();
        while ($rows = $row->fetch_assoc()) {
            $listaSesiones[] = $rows;
        };

        return $listaSesiones;
    }

    public function nuevaSesion($sesion) 
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
            1
        ));

        $stmt->close();

        return $conexion->insert_id;
    }

    public function modificarSesion($sesion) 
    {
        echo "<script> console.log('Usuario: " . $sesion->getIdUsuario() . "'); </script>";
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

    public function eliminarSesion($idSesion) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("DELETE * FROM sesion WHERE id_sesion = '$idSesion'")
            or die ($conexion->error);
    }

}
