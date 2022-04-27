<?php
require_once('models/Session.php');
if (isset($_POST['title'])) {
        include("controllers/CalendarioController.php");
        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $titulo = $_POST['title'];
        $descripcion = $_POST['obs'];
        $color = $_POST['color'];
    
        
       

        $actividad = new CalendarioModel();
        $actividad->setIdActividad($id);
        $actividad->setFecha($fecha);
        $actividad->setTitulo($titulo);
        $actividad->setObservaciones($descripcion);
        $actividad->setColor($color);
        
        
        $calendarioController = new CalendarioController();
        
        if(isset($_POST['btnAccion'])){

            $idPaciente = Session::getIdPaciente();
            if ($idPaciente == null) {
                // Error
            }

            $calendarioController->guardarActividad($idPaciente, $actividad);
        }
        else if(isset($_POST['btnEliminar'])){
            $calendarioController->eliminarActividad($id);
        }
            
        
        header("Location: calendario.php");

    } 
?>