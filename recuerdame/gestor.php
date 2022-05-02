<?php
require_once('models/Session.php');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['login'])) {
    include("controllers/LoginController.php");
    Session::cleanError();

    $username = $_POST['usuario'];
    $password = $_POST['contrasena'];

    $loginController = new LoginController();
    $ok = $loginController->login($username, $password);

    if (!$ok) {
        Session::setError('Usuario o contraseña incorrectos.');
        header("Location: login.php");
    }

    if (Session::esTerapeuta()){
        header("Location: listadoPacientes.php");
    }

    if (Session::esCuidador()){
        header("Location: verDatosPaciente.php");
    }

} else if (isset($_GET['logout'])) {
    Session::cleanSession();

    header("Location: login.php");
} else if (isset($_POST['guardarRecuerdo'])) {
    include("controllers/RecuerdosController.php");
    include("controllers/SesionesController.php");

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

    $ventanaDesde = null;
    if (isset($_GET['ventanaDesde'])) {
        $ventanaDesde = $_GET['ventanaDesde'];
    }

    $ventanaHacia = null;
    if (isset($_GET['ventanaHacia'])) {
        $ventanaHacia = $_GET['ventanaHacia'];
    }

    $idSesion = null;
    if (isset($_GET['idSesion'])) {
        $idSesion = $_GET['idSesion'];
    }

    $idPaciente = Session::getIdPaciente();
    if ($idPaciente == null) {
        // Error
    }

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

    // Se guardan los datos del recuerdo
    if (isset($idSesion) && !empty($idSesion)) {
        $sesionesController = new SesionesController();
        $idRecuerdo = $sesionesController->guardarRecuerdo($idPaciente, $idSesion, $recuerdo);

        if (isset($ventanaDesde) && !empty($ventanaDesde)) {
            header("Location: verDatosRecuerdo.php?idRecuerdo=$idRecuerdo&idSesion=$idSesion&ventanaDesde=$ventanaDesde");
        } else {
            header("Location: verDatosRecuerdo.php?idRecuerdo=$idRecuerdo&idSesion=$idSesion");
        }
    } else {
        $recuerdosController = new RecuerdosController();
        $idRecuerdo = $recuerdosController->guardarRecuerdo($idPaciente, $recuerdo);

        if ($ventanaHacia != null) {

            if ($ventanaDesde != null) {
                header("Location: $ventanaHacia?idRecuerdo=$idRecuerdo&ventanaDesde=$ventanaDesde");
            } else {
                header("Location: $ventanaHacia?idRecuerdo=$idRecuerdo");
            }
        } else if (isset($ventanaDesde) && !empty($ventanaDesde)) {
            header("Location: verDatosRecuerdo.php?idRecuerdo=$idRecuerdo&ventanaDesde=$ventanaDesde");
        } else {
            header("Location: verDatosRecuerdo.php?idRecuerdo=$idRecuerdo");
        }
    }
} else if (isset($_GET['getMultimediaRecuerdoList'])) {
    $idRecuerdo = $_GET['idRecuerdo'];

    $recuerdosController = new RecuerdosController();
    $recuerdosController->getListaMultimediaRecuerdo($idRecuerdo);
} else if (isset($_GET['accion']) && $_GET['accion'] == 'guardarMultimediaRecuerdo') {
    include("controllers/RecuerdosController.php");

    $idRecuerdo = $_GET['idRecuerdo'];
    $listaMultimedia = array();

    if (isset($_POST['checkMultimedia']) && isset($idRecuerdo)) {
        foreach ($_POST['checkMultimedia'] as $value) {
            array_push($listaMultimedia, $value);
        }
    }

    $recuerdosController = new RecuerdosController();
    $recuerdosController->anadirMultimedia($idRecuerdo, $listaMultimedia);

    header("Location: modificarDatosRecuerdo.php?idRecuerdo=$idRecuerdo");
} else if (isset($_GET['eliminarMultimediaRecuerdo'])) {
    include("controllers/RecuerdosController.php");
    $idRecuerdo = $_GET['idRecuerdo'];
    $idMultimedia = $_GET['idMultimedia'];

    $recuerdosController = new RecuerdosController();
    $recuerdosController->eliminarMultimedia($idRecuerdo, $idMultimedia);

    header("Location: modificarDatosRecuerdo.php?idRecuerdo=$idRecuerdo");
} else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarRecuerdo') {
    include("controllers/RecuerdosController.php");

    $idRecuerdo = $_GET['idRecuerdo'];

    $recuerdosController = new RecuerdosController();
    $recuerdosController->eliminarRecuerdo($idRecuerdo);

    header("Location: listadoRecuerdos.php");
} else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarRecuerdoSesion') {
    include("controllers/SesionesController.php");

    $idRecuerdo = $_GET['idRecuerdo'];
    $idSesion = $_GET['idSesion'];

    $sesionesController = new SesionesController();
    $sesionesController->eliminarRecuerdo($idSesion, $idRecuerdo);

    header("Location: modificarDatosSesion.php?idSesion=$idSesion");
} else if (isset($_POST['guardarPersonaRelacionada'])) {
    include("controllers/PersonasRelacionadasController.php");
    include("controllers/RecuerdosController.php");

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

    $idPaciente = Session::getIdPaciente();
    if ($idPaciente == null) {
        // Error
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
        $idPersonaRelacionada = $recuerdosController->guardarPersonaRelacionada($idPaciente, $idRecuerdo, $personaRelacionada);

        if ($ventanaDesde != null) {
            header("Location: verDatosPersonaRelacionada.php?idPersonaRelacionada=$idPersonaRelacionada&idRecuerdo=$idRecuerdo&ventanaDesde=$ventanaDesde");
        } else {
            header("Location: verDatosPersonaRelacionada.php?idPersonaRelacionada=$idPersonaRelacionada&idRecuerdo=$idRecuerdo");
        }
    } else {
        $personasRelacionadasController = new PersonasRelacionadasController();
        $idPersonaRelacionada = $personasRelacionadasController->guardarPersonaRelacionada($idPaciente, $personaRelacionada);

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
    $listaPersonasRelacionadas = array();

    if (isset($_POST['checkPersonaRelacionada']) && isset($idRecuerdo)) {
        foreach ($_POST['checkPersonaRelacionada'] as $value) {
            array_push($listaPersonasRelacionadas, $value);
        }
    }

    $recuerdosController = new RecuerdosController();
    $recuerdosController->anadirPersonasRelacionadas($idRecuerdo, $listaPersonasRelacionadas);

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

    $idPaciente = Session::getIdPaciente();
    if ($idPaciente == null) {
        // Error
    }

    $informeSeguimientoController = new InformeSeguimientoController();
    $idInforme = $informeSeguimientoController->guardarInformeSeguimiento($idPaciente, $informe);

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
} else if (isset($_GET['historiaVida']) && $_GET['historiaVida'] == 'pdf') {

    if (isset($_GET['idPaciente'])) {
        header("Location: generarPDFHistoriaVida.php");
    }
} else if (isset($_POST['guardarSesion'])) {
    include("controllers/SesionesController.php");

    $idSesion = $_GET['idSesion'];
    $fecha = $_POST['fecha'];
    $idEtapa = $_POST['idEtapa'];
    $objetivo = $_POST['objetivo'];
    $descripcion = $_POST['descripcion'];
    $barreras = $_POST['barreras'];
    $facilitadores = $_POST['facilitadores'];
    $idUsuario = $_GET['idUsuario'];

    $idPaciente = Session::getIdPaciente();
    if ($idPaciente == null) {
        // Error
    }

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
    $idSesion = $sesionesController->guardarSesion($idPaciente, $sesion);

    header("Location: verDatosSesion.php?idSesion=$idSesion");
} else if (isset($_GET['getMultimediaSesionList'])) {
    $idSesion = $_GET['idSesion'];

    $sesionesController = new SesionesController();
    $idSesion->getListaMultimediaSesion($idSesion);
} else if (isset($_GET['accion']) && $_GET['accion'] == 'guardarMultimediaSesion') {
    include("controllers/SesionesController.php");

    $idSesion = $_GET['idSesion'];
    $listaMultimedia = array();

    if (isset($_POST['checkMultimedia']) && isset($idSesion)) {
        foreach ($_POST['checkMultimedia'] as $value) {
            array_push($listaMultimedia, $value);
        }
    }

    $sesionesController = new SesionesController();
    $sesionesController->anadirMultimedia($idSesion, $listaMultimedia);

    header("Location: modificarDatosSesion.php?idSesion=$idSesion");
} else if (isset($_GET['eliminarMultimediaSesion'])) {
    include("controllers/SesionesController.php");
    $idSesion = $_GET['idSesion'];
    $idMultimedia = $_GET['idMultimedia'];

    $sesionesController = new SesionesController();
    $sesionesController->eliminarMultimedia($idSesion, $idMultimedia);

    header("Location: modificarDatosSesion.php?idSesion=$idSesion");
} else if (isset($_GET['accion']) && $_GET['accion'] == 'guardarRecuerdoRelacionadoSesion') {
    include("controllers/SesionesController.php");

    $idSesion = $_GET['idSesion'];
    $listaRecuerdos = array();

    if (isset($_POST['checkRecuerdo']) && isset($idSesion)) {
        foreach ($_POST['checkRecuerdo'] as $value) {
            array_push($listaRecuerdos, $value);
        }
    }

    $sesionesController = new SesionesController();
    $sesionesController->anadirRecuerdos($idSesion, $listaRecuerdos);

    header("Location: modificarDatosSesion.php?idSesion=$idSesion");
} else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarSesion') {
    include("controllers/SesionesController.php");

    $idSesion = $_GET['idSesion'];

    $sesionesController = new SesionesController();
    $sesionesController->eliminarSesion($idSesion);

    header("Location: listadoSesiones.php");
} else if (isset($_GET['accion']) && $_GET['accion'] == 'eliminarPaciente') {
    include("controllers/PacientesController.php");
    $idPaciente = $_GET['idPaciente'];

    $pacientesController = new PacientesController();
    $pacientesController->eliminarPaciente($idPaciente);


    header("Location: listadoPacientes.php");
} else if (isset($_GET['accion']) && $_GET['accion'] == 'guardarPaciente') {
    include("controllers/PacientesController.php");
    if (isset($_GET['idPaciente'])) {
        $idPaciente = $_GET['idPaciente'];
    } else {
        $idPaciente = NULL;
    }

    $pacientesController = new PacientesController();
    $paciente = new Paciente();
    $paciente->setNombre($_POST['nombre']);
    $paciente->setApellidos($_POST['apellidos']);
    if ($_POST['genero'] == 'hombre') {
        $paciente->setGenero('H');
    } else {
        $paciente->setGenero('M');
    }
    $paciente->setLugarNacimiento($_POST['lugarNac']);
    $paciente->setNacionalidad($_POST['nacionalidad']);
    $paciente->setTipoResidencia($_POST['casa']);
    $paciente->setResidenciaActual($_POST['residencia']);
    $paciente->setFechaNacimiento($_POST['fecha']);

    $pacientesController->guardarPaciente($paciente);


    header("Location: listadoPacientes.php");
} else if (isset($_GET['cambiarPaciente'])) {
    include("controllers/PacientesController.php");
    require_once('models/PacienteCabecera.php');
    $pacientesController = new PacientesController();

    if (isset($_GET['idPaciente'])) {
        $idPaciente = $_GET['idPaciente'];

        $paciente = $pacientesController->verPaciente($idPaciente);
        $cumpleanos = new DateTime($paciente->getFechaNacimiento());
        $hoy = new DateTime();
        $edad = $hoy->diff($cumpleanos);

        $genero = '';
        if ($paciente->getGenero() == 'H'){
            $genero = 'Hombre';
        }  else if ($paciente->getGenero() == 'M') {
            $genero = 'Mujer';
        }

        $nombre = ($paciente->getNombre()) . " " . ($paciente->getApellidos());
        $p = new PacienteCabecera();
        $p->setIdPaciente($paciente->getIdPaciente());
        $p->setNombre($nombre);
        $p->setEdad($edad);
        $p->setGenero($genero);
        $p->setCodigoGenero($paciente->getGenero());

        Session::setPaciente($p);
        header("Location: listadoSesiones.php");
    }
}
