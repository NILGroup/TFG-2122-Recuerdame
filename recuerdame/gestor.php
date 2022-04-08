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

    }  else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarRecuerdo') {
        include("controllers/RecuerdosController.php");

        $idRecuerdo = $_GET['idRecuerdo'];
      
        $recuerdosController = new RecuerdosController();
        $recuerdosController->eliminarRecuerdo($idRecuerdo);
        
        header("Location: listadoRecuerdos.php");

    } else if (isset($_POST['guardarPersonaRelacionada'])) {
        include("controllers/PersonasRelacionadasController.php");

        $idRecuerdo = $_GET['idRecuerdo'];
        $idPersonaRelacionada = $_GET['idPersonaRelacionada'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $telefono = $_POST['telefono'];
        $ocupacion = $_POST['ocupacion'];
        $email = $_POST['email'];
        $idTipoRelacion = $_POST['idTipoRelacion'];

        $ventanaDesde = null;
        if (isset($_GET['ventanaDesde'])) {
            $ventanaDesde = $_GET['ventanaDesde'];
        }

        $personaRelacionada = new PersonaRelacionada();
        $personaRelacionada->setIdPersonaRelacionada($idPersonaRelacionada);
        $personaRelacionada->setNombre($nombre);
        $personaRelacionada->setApellidos($apellidos);
        $personaRelacionada->setTelefono($telefono);
        $personaRelacionada->setOcupacion($ocupacion);
        $personaRelacionada->setEmail($email);
        $personaRelacionada->setIdTipoRelacion($idTipoRelacion);
      
        // Se guardan los datos de la persona relacionada
        if (isset($idRecuerdo)) {
            $recuerdosController = new RecuerdosController();
            $idPersonaRelacionada = $recuerdosController->guardarPersonaRelacionada($idRecuerdo, $personaRelacionada);

            header("Location: verDatosPersonaRelacionada.php?idPersonaRelacionada=$idPersonaRelacionada&idRecuerdo=$idRecuerdo");
        } else {
            $personasRelacionadasController = new PersonasRelacionadasController();
            $idPersonaRelacionada = $personasRelacionadasController->guardarPersonaRelacionada($personaRelacionada);

            if ($ventanaDesde != null) {
                header("Location: verDatosPersonaRelacionada.php?idPersonaRelacionada=$idPersonaRelacionada&ventanaDesde=$ventanaDesde");
            } else {
                header("Location: verDatosPersonaRelacionada.php?idPersonaRelacionada=$idPersonaRelacionada");
            }
        }

    } else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarPersonaRelacionada') {
        include("controllers/PersonasRelacionadasController.php");

        $idPersonaRelacionada = $_GET['idPersonaRelacionada'];
      
        $personasRelacionadasController = new PersonasRelacionadasController();
        $personasRelacionadasController->eliminarPersonaRelacionada($idPersonaRelacionada);
        
        header("Location: listadoPersonasRelacionadas.php");
    
    } else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarPersonaRelacionadaRecuerdo') {
        include("controllers/RecuerdosController.php");

        $idPersonaRelacionada = $_GET['idPersonaRelacionada'];
        $idRecuerdo = $_GET['idRecuerdo'];
      
        $recuerdosController = new RecuerdosController();
        $recuerdosController->eliminarPersonaRelacionada($idRecuerdo, $idPersonaRelacionada);
        
        header("Location: modificarDatosRecuerdo.php?idRecuerdo=$idRecuerdo");

    } else if (isset($_GET['accion']) && $_GET['accion'] == 'guardarPersonaRelacionadaRecuerdo') {
        include("controllers/RecuerdosController.php");

        $idRecuerdo = $_GET['idRecuerdo'];

        if (isset($_POST['checkPersonaRelacionada'])) {
            $listaPersonasRelacionadas = array();
            foreach ($_POST['checkPersonaRelacionada'] as $value) {
                array_push($listaPersonasRelacionadas, $value);
            }

            $recuerdosController = new RecuerdosController();
            $recuerdosController->anadirPersonasRelacionadas($idRecuerdo, $listaPersonasRelacionadas);
        }
        
        header("Location: modificarDatosRecuerdo.php?idRecuerdo=$idRecuerdo");

    } else if (isset($_POST['guardarInformeSeguimiento'])) {
        
        include("controllers/InformeSeguimientoController.php");
        $idInforme = $_GET['idInforme'];
        $fecha = $_POST['fecha'];
        $gds = $_POST['gds'];
        $fechaGds = $_POST['gds_fecha'];
        $mental = $_POST['mental'];
        $fechaMental = $_POST['mental_fecha'];
        $cdr = $_POST['cdr'];
        $fechaCdr = $_POST['cdr_fecha'];
        $diagnostico = $_POST['diagnostico'];
        $observaciones = $_POST['observaciones'];
        $nombreEscala = $_POST['nombre_escala'];
        $escala = $_POST['escala'];
        $fechaEscala = $_POST['fecha_escala'];

        $informe = new InformeSeguimiento();
        $informe->setIdEvaluacion($idInforme);
        $informe->setFecha($fecha);
        $informe->setGds($gds);
        $informe->setFechaGds($fechaGds);
        $informe->setMental($mental);
        $informe->setFechaMental($fechaMental);
        $informe->setCdr($cdr);
        $informe->setFechaCdr($fechaCdr);
        $informe->setDiagnostico($diagnostico);
        $informe->setObservaciones($observaciones);
        $informe->setNombreEscala($nombreEscala);
        $informe->setEscala($escala);
        $informe->setFechaEscala($fechaEscala);

        $informeSeguimientoController = new InformeSeguimientoController();
        $idInforme = $informeSeguimientoController->guardarInformeSeguimiento($informe);
        
        header("Location: verDatosInformeSeguimiento.php?idInforme=$idInforme");

    } else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarInformeSeguimiento') {
        include("controllers/InformeSeguimientoController.php");

        $idInformeSeguimiento = $_GET['idInforme'];
      
        $informeSeguimientoController = new InformeSeguimientoController();
        $informeSeguimientoController->eliminarInformeSeguimiento($idInformeSeguimiento);
        
        header("Location: listadoInformesSeguimiento.php");

    } else if (isset($_POST['guardarInformeSesion'])) {
        
        include("controllers/InformeSesionController.php");
        $idInforme = $_GET['idInforme'];
        $fecha = $_POST['fecha'];
        $fecha_finalizada = $_POST['fecha_finalizada'];
        $respuesta = $_POST['respuesta'];
        $observaciones = $_POST['observaciones'];
        $informe = new InformeSesion();
        $informe->setIdSesion($idInforme);
        $informe->setFecha($fecha);
        $informe->setFechaFinalizacion($fecha_finalizada);
        $informe->setRespuesta($respuesta);
        $informe->setObservaciones($observaciones);

        $informeSesionController = new InformeSesionController();
        $idInforme = $informeSesionController->guardarInformeSesion($informe);
        
        header("Location: verDatosInformeSesion.php?idInforme=$idInforme");

    } else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarInformeSesion') {
        include("controllers/InformeSesionController.php");

        $idInformeSesion = $_GET['idInforme'];
      
        $informeSesionController = new InformeSesionController();
        $informeSesionController->eliminarInformeSesion($idInformeSesion);
        
        header("Location: listadoInformesSesion.php");
        
    } else if (isset($_GET['historiaVida']) && $_GET['historiaVida'] == 'libro') {
        header("Location: historiaVidaLibro.php");

    } else if (isset($_GET['historiaVida']) && $_GET['historiaVida'] == 'pdf') {

        if (isset($_GET['idPaciente'])) {
            header("Location: generarPDFHistoriaVida.php");
        }

    } else if(isset($_POST['guardarSesion'])) {
        include("controllers/SesionesController.php");
        
        $idSesion = $_GET['idSesion'];
        $fecha = $_POST['fecha'];
        $idEtapa = $_POST['idEtapa'];
        $objetivo = $_POST['objetivo'];
        $descripcion = $_POST['descripcion'];
        $barreras = $_POST['barreras'];
        $facilitadores = $_POST['facilitadores'];
        $idUsuario = $_GET['idUsuario'];
        echo "<script> console.log('Usuario: " . $idUsuario . "'); </script>";
        echo "<script> console.log('Usuario: " . $_GET['idUsuario'] . "'); </script>";

        $sesion = new Sesion();
        $sesion->setIdSesion($idSesion);
        $sesion->setFecha($fecha);
        $sesion->setIdEtapa($idEtapa);
        $sesion->setObjetivo($objetivo);
        $sesion->setDescripcion($descripcion);
        $sesion->setBarreras($barreras);
        $sesion->setFacilitadores($facilitadores);
        $sesion->setIdUsuario($idUsuario);
      
        $sesionesController = new SesionesController();
        $idSesion = $sesionesController->guardarSesion($sesion);
        
        header("Location: verDatosSesion.php?idSesion=$idSesion");

    } else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarSesion') {
        include("controllers/SesionesController.php");

        $idSesion = $_GET['idSesion'];
      
        $sesionesController = new SesionesController();
        $sesionesController->eliminarSesion($idSesion);
        
        header("Location: listadoSesiones.php");
    }
