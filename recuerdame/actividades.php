<?php
     session_start();
     $idPaciente = $_SESSION['idPaciente'];
     require_once('configdb.php');
     $db = new Configdb();
     $conexion = $db->getConexion();
        $row = $conexion->query("SELECT *  FROM actividad WHERE id_paciente = $idPaciente")
        or die ($conexion->error);

        while ($rows = $row->fetch_assoc()) {
            $listaActividades[] = $rows;
            
        }
        echo json_encode($listaActividades);

       
?>