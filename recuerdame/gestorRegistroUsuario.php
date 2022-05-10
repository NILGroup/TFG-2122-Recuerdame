<?php
        
        include("controllers/UsuarioController.php");
        include("controllers/PacientesController.php");

        $pacienteController = new PacientesController();
        $usuarioController = new UsuarioController();
        $usuario = new Usuario();

        $idPaciente = $_POST['paciente'];
        $usuario->setNombre($_POST['name']);
        $usuario->setApellidos($_POST['apellidos']);
        $usuario->setContrasenia($_POST['password']);
        $usuario->setNombreUsuario($_POST['nick']);
        $usuario->setCorreo($_POST['mail']);

        if($_GET['rol']=='CUIDADOR') {
                $usuario->setRol('CUIDADOR');

        }else{
                $usuario->setRol('TERAPEUTA');
        }
       
       if ($usuarioController->comprobarUsuario($usuario) == NULL){
               
                $idCuidador = $usuarioController->guardarUsuario($usuario);
                if($_GET['rol']=='CUIDADOR') {
                        
                        $pacienteController->asignarCuidador($idCuidador,$idPaciente);
                        echo "<script> alert('Usuario creado.'); window.location='listadoPacientes.php'</script>";
 
                }else{
                        header("Location: login.php?mensajeExito='Se ha registrado correctamente'");
                }
                
        }else{
                if($_GET['rol']=='CUIDADOR') {
                        echo "<script> alert('No se pudo crear el cuidador (correo o nombre de usuario ya existente).'); window.location='listadoPacientes.php'</script>";
                }else{
                        
                        header("Location: registroTerapeuta.php?mensajeError='el usuario o el correo ya esta registrado'");
                }
                
                
         }
       
?>