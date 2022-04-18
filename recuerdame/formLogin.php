<?php
	require_once ('configdb.php');
	require_once ('controllers/UsuarioController.php');

	$lista = new UsuarioController();

	$correo = $_REQUEST['correo'];
	$pass = $_REQUEST['contrasenia'];

	$login = $lista->comprobarLogin($correo, $pass);

	if($login){
		echo "true";
	}
	else
		echo "string";
	
	if(!$login){
		$ok = 'false';
		header("Location: login.php?ok=$ok");
	}
	else
	{ 
		header("Location: listadoPacientes.php");
	/*
		$hola = $_SESSION['rol'];
		echo $hola;
		//header("Location: ../../index.php");
		if($app->tieneRol('Paciente')){
			//Es paciente va a su perfil
			header("Location: ../../DatosPaciente.php");
		}else if($app->tieneRol('Medico')){
			//Es médico, va a su perfil
			header("Location: ../../DatosMedico.php");
		}elseif ($app->tieneRol('Admin')) {
			//Es admin, va al panel de administracion
			header("Location: ../../panelAdministracion.php");
		}
		*/
	}
 ?>
