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

        $i = $row->fetch_assoc();

        $informe = new InformeSeguimiento();
        $informe->setIdEvaluacion($i['id_evaluacion']);
        $informe->setIdPacientes($i['id_paciente']);
        $informe->setFecha($i['fecha']);
        $informe->setGds($i['gds']);
        $informe->setFechaGds($i['gds_fecha']);
        $informe->setMental($i['mental']);
        $informe->setFechaMental($i['mental_fecha']);
        $informe->setCdr($i['cdr']);
        $informe->setFechaCdr($i['cdr_fecha']);
        $informe->setDiagnostico($i['diagnostico']);
        $informe->setObservaciones($i['observaciones']);
        $informe->setNombreEscala($i['nombre_escala']);
        $informe->setEscala($i['escala']);
        $informe->setFechaEscala($i['fecha_escala']);

        return $informe;
    }

    public function nuevoInformeSeguimiento($informe) {
        $conexion = $this->db->getConexion();
        $consultaSQL = "INSERT INTO evaluacion (id_evaluacion, fecha, gds, gds_fecha, mental, mental_fecha, cdr, cdr_fecha,
                            diagnostico, observaciones, nombre_escala, escala, fecha_escala, id_paciente)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            NULL,
            $informe->getFecha(), 
            $informe->getGds(),
            $informe->getFechaGds(),
            $informe->getMental(),
            $informe->getFechaMental(),
            $informe->getCdr(),
            $informe->getFechaCdr(),
            $informe->getDiagnostico(),
            $informe->getObservaciones(),
            $informe->getNombreEscala(),
            $informe->getEscala(),
            $informe->getFechaEscala(),
            1
            ));

        $stmt->close();

        return $conexion->insert_id;
    }

    public function modificarInformeSeguimiento($informe) {
        $conexion = $this->db->getConexion();
        $consultaSQL = "UPDATE evaluacion 
                        SET fecha = ?, gds = ?, gds_fecha = ?,
                            mental = ?, mental_fecha = ?, 
                            cdr = ?, cdr_fecha = ?,
                            diagnostico = ?, observaciones = ?,
                            nombre_escala = ?, escala = ?, fecha_escala = ? 
                        WHERE id_evaluacion = ?;";

        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            $informe->getFecha(), 
            $informe->getGds(),
            $informe->getFechaGds(),
            $informe->getMental(),
            $informe->getFechaMental(),
            $informe->getCdr(),
            $informe->getFechaCdr(),
            $informe->getDiagnostico(),
            $informe->getObservaciones(),
            $informe->getNombreEscala(),
            $informe->getEscala(),
            $informe->getFechaEscala(),
            $informe->getIdEvaluacion(),
            ));

        $stmt->close();

        return $informe->getIdEvaluacion();
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
        $conexion->query("DELETE FROM evaluacion WHERE id_evaluacion = '$idInforme'")
            or die ($conexion->error);
    }

}