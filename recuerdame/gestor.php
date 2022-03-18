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

    } else if (isset($_POST['guardarPersonaRelacionada'])) {
        include("controllers/PersonasRelacionadasController.php");

        $idPersonaRelacionada = $_GET['idPersonaRelacionada'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $ocupacion = $_POST['ocupacion'];
        $email = $_POST['email'];
        $idTipoRelacion = $_POST['idTipoRelacion'];

        echo "<script>console.log('Debug idTipoRelacion: " . $idTipoRelacion . "' );</script>";

        $personaRelacionada = new PersonaRelacionada();
        $personaRelacionada->setIdPersonaRelacionada($idPersonaRelacionada);
        $personaRelacionada->setNombre($nombre);
        $personaRelacionada->setApellidos($apellidos);
        $personaRelacionada->setTelefono($telefono);
        $personaRelacionada->setOcupacion($ocupacion);
        $personaRelacionada->setEmail($email);
        $personaRelacionada->setIdTipoRelacion($idTipoRelacion);
      
        $personasRelacionadasController = new PersonasRelacionadasController();
        $idPersonaRelacionada = $personasRelacionadasController->guardarPersonaRelacionada($personaRelacionada);
        
        header("Location: verDatosPersonaRelacionada.php?idPersonaRelacionada=$idPersonaRelacionada");

    } else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarPersonaRelacionada') {
        include("controllers/PersonasRelacionadasController.php");

        $idPersonaRelacionada = $_GET['idPersonaRelacionada'];
      
        $personasRelacionadasController = new PersonasRelacionadasController();
        $personasRelacionadasController->eliminarPersonaRelacionada($idPersonaRelacionada);
        
        header("Location: listadoPersonasRelacionadas.php");
    }
?>