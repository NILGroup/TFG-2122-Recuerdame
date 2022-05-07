<?php
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
        if ($_POST['genero'] == 'Hombre') {
            $paciente->setGenero('H');
        } else {
            $paciente->setGenero('M');
        }
        $paciente->setLugarNacimiento($_POST['lugarNac']);
        $paciente->setNacionalidad($_POST['nacionalidad']);
        $paciente->setTipoResidencia($_POST['casa']);
        $paciente->setResidenciaActual($_POST['residencia']);
        $paciente->setFechaNacimiento($_POST['fecha']);
        $paciente->setIdTerapeuta($_GET['idUsuario']);
        if(isset($_POST['terapeuta'])){
            $paciente->setIdTerapeuta($_POST['terapeuta']);
        }
        $pacientesController->guardarPaciente($paciente);

        if(isset($_POST['terapeuta'])){
            $pacientesController->cambiarTerapeuta($idTerapeuta,$idPaciente);
        }


        header("Location: listadoPacientes.php");
?>