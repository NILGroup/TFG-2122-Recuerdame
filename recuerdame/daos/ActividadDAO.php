<?php
    
    require_once('models/CalendarioModel.php');
    require_once('configdb.php');
 
class ActividadDAO{

    private $db;

    public function __construct() {
        $this->db = new Configdb();
    }
    
    public function getActividad($idIActividad) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM actividad WHERE id = '$idActividad'")
            or die ($conexion->error);

        $i = $row->fetch_assoc();

        $actividad = new CalendarioModel();
        $actividad->setIdActividad($i['id']);
        $actividad->setFecha($i['start']);
        $actividad->setTitulo($i['title']);
        $actividad->setObservaciones($i['description']);
        $actividad->setColor($i['color']);

        return $actividad;
    }

    public function nuevaActividad($actividad){
        session_start();
        $conexion = $this->db->getConexion();
        $consultaSQL = "INSERT INTO actividad (id, title, start, description, id_paciente, color)
                        VALUES (?, ?, ?, ?, ?, ?);";       
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            NULL,
            $actividad->getTitulo(), 
            $actividad->getFecha(),
            $actividad->getObservaciones(),
            $_SESSION['idPaciente'],
            $actividad->getColor()
           ));

        $stmt->close();

        return $conexion->insert_id;
    }

    public function modificarActividad($actividad){
        $conexion = $this->db->getConexion();
        $consultaSQL = "UPDATE actividad 
                        SET title = ?, start = ?, description = ?, color = ?
                        WHERE id = ?;";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            $actividad->getTitulo(), 
            $actividad->getFecha(),
            $actividad->getObservaciones(),
            $actividad->getColor(),
            $actividad->getIdActividad()
             ));

        $stmt->close();

        return $actividad->getIdActividad();
    }

    public function getListaActividades($idPaciente) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT id FROM actividad WHERE id_paciente = '$idPaciente'")
        or die ($conexion->error);

        while ($rows = $row->fetch_assoc()) {
            $listaActividades[] = $rows;
        };

        return $listaActividades;
    }

    public function eliminarActividad($idActividad) {
        $conexion = $this->db->getConexion();
        $conexion->query("DELETE FROM actividad WHERE id = '$idActividad'")
            or die($conexion->error);
    }

}