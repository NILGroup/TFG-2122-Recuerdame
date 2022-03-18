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
        $recuerdo->setIdCategoria(empty($idCategoria) ? NULL : $idCategoria);
        $recuerdo->setIdEmocion(empty($idEmocion) ? NULL : $idEmocion);
        $recuerdo->setIdEstado(empty($idEstado) ? NULL : $idEstado);
        $recuerdo->setIdEtiqueta(empty($idEtiqueta) ? NULL : $idEtiqueta);
        $recuerdo->setPuntuacion($puntuacion);
      
        $recuerdosController = new RecuerdosController();
        $idRecuerdo = $recuerdosController->guardarRecuerdo($recuerdo);
        
        header("Location: verDatosRecuerdo.php?idRecuerdo=$idRecuerdo");

    } else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarRecuerdo') {
        include("controllers/RecuerdosController.php");

        $idRecuerdo = $_GET['idRecuerdo'];
      
        $recuerdosController = new RecuerdosController();
        $recuerdosController->eliminarRecuerdo($idRecuerdo);
        
        header("Location: listadoRecuerdos.php");
    }
?>