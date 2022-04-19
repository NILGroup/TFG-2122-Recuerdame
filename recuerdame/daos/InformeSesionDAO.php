<?php

require_once('models/InformeSesion.php');
require_once('configdb.php');

class InformeSesionDAO
{

    private $db;

    public function __construct()
    {
        $this->db = new Configdb();
    }

    public function getInformeSesion($idInforme)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM sesion WHERE id_sesion = '$idInforme'")
            or die($conexion->error);

        $i = $row->fetch_assoc();

        $informe = new InformeSesion();
        $informe->setIdSesion($i['id_sesion']);
        $informe->setFecha($i['fecha']);
        $informe->setFechaFinalizacion($i['fecha_finalizada']);
        $informe->setRespuesta($i['respuesta']);
        $informe->setObservaciones($i['observaciones']);

        return $informe;
    }

    public function nuevoInformeSesion($informe)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "INSERT INTO sesion (fecha_finalizada, respuesta, observaciones)
                        VALUES (?, ?, ?,)
                        WHERE id_sesion = ?;";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            $informe->getFechaFinalizacion(),
            $informe->getRespuesta(),
            $informe->getObservaciones(),
            $informe->getIdSesion(),
        ));

        $stmt->close();

        return $informe->getIdSesion();
    }

    public function modificarInformeSesion($informe)
    {
        $conexion = $this->db->getConexion();
        $consultaSQL = "UPDATE sesion 
                        SET fecha_finalizada = ?, respuesta = ?, observaciones = ?
                        WHERE id_sesion = ?;";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            $informe->getFechaFinalizacion(),
            $informe->getRespuesta(),
            $informe->getObservaciones(),
            $informe->getIdSesion(),
        ));

        $stmt->close();

        return $informe->getIdSesion();
    }

    public function getListaInformeSesion($idPaciente)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT s.id_sesion AS idInforme, s.respuesta, s.observaciones,  s.fecha_finalizada
            FROM sesion s
            WHERE s.fecha_finalizada IS NOT NULL
            AND id_paciente = $idPaciente
            ORDER BY s.fecha ASC")
            or die($conexion->error);

        $listaInformes = array();
        while ($rows = $row->fetch_assoc()) {
            $listaInformes[] = $rows;
        };

        return $listaInformes;
    }

    public function eliminarInformeSesion($idInforme)
    {
        $conexion = $this->db->getConexion();
        $conexion->query("UPDATE sesion SET
                        fecha_finalizada = NULL, respuesta = NULL, observaciones = NULL 
                        WHERE id_sesion = '$idInforme'")
            or die($conexion->error);
    }
}
