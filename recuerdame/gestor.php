<?php
    if (isset($_POST['guardarRecuerdo'])) {
        include("controllers/RecuerdosController.php");

        $idRecuerdo = $_GET['idRecuerdo'];
        $fecha = $_POST['fecha'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $localizacion = $_POST['localizacion'];
        $idEtapa = $_POST['idEtapa'];
        $idCategoria = $_POST['idCategoria'];
        $idEmocion = $_POST['idEmocion'];
        $idEstado = $_POST['idEstado'];
        $idEtiqueta = $_POST['idEtiqueta'];
        $puntuacion = $_POST['puntuacion'];

        $recuerdo = new Recuerdo();
        $recuerdo->setIdRecuerdo($idRecuerdo);
        $recuerdo->setFecha($fecha);
        $recuerdo->setNombre($nombre);
        $recuerdo->setDescripcion($descripcion);
        $recuerdo->setLocalizacion($localizacion);
        $recuerdo->setIdEtapa($idEtapa);
        $recuerdo->setIdCategoria($idCategoria);
        $recuerdo->setIdEmocion($idEmocion);
        $recuerdo->setIdEstado($idEstado);
        $recuerdo->setIdEtiqueta($idEtiqueta);
        $recuerdo->setPuntuacion($puntuacion);
      
        $recuerdosController = new RecuerdosController();
        $idRecuerdo = $recuerdosController->guardarRecuerdo($recuerdo);
        
        header("Location: verDatosRecuerdo.php?idRecuerdo=$idRecuerdo");
    }
?>