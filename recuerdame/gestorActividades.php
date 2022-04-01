<?php
if (isset($_POST['title'])) {
        include("controllers/CalendarioController.php");
        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $titulo = $_POST['title'];
        $descripcion = $_POST['obs'];
        $color = $_POST['color'];
        $del = $_POST['btnEliminar'];
        $add = $_POST['btnAccion'];
       

        $actividad = new CalendarioModel();
        $actividad->setIdActividad($id);
        $actividad->setFecha($fecha);
        $actividad->setTitulo($titulo);
        $actividad->setObservaciones($descripcion);
        $actividad->setColor($color);
        
        
        $calendarioController = new CalendarioController();
        
        if(isset($add)){
            $calendarioController->guardarActividad($actividad);
        }
        else if(isset($del)){
         $calendarioController->eliminarActividad($id);
        }
            
        
        header("Location: calendario.php");

    } 
?>