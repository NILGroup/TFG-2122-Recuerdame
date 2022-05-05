<?php
        
        include("controllers/UsuarioController.php");

    
        $usuarioController = new UsuarioController();
        $usuario = new Usuario();
        echo $_POST['name'];
        echo $_POST['apellidos'];
        echo  $_POST['password'];
        echo $_POST['mail'];
        echo $_POST['nick'];
        $usuario->setNombre($_POST['name']);
        $usuario->setApellidos($_POST['apellidos']);
        $usuario->setContrasenia($_POST['password']);
        $usuario->setNombreUsuario($_POST['nick']);
        $usuario->setCorreo( $_POST['mail']);
        $usuario->setRol('TERAPEUTA');
       
       if ($usuarioController->comprobarUsuario($usuario) == NULL){
                $usuarioController->guardarUsuario($usuario);
                header("Location: login.php?mensajeExito='Se ha registrado correctamente'");
        }else{
                header("Location: registroTerapeuta.php?mensajeError='el usuario o el correo ya esta registrado'");
         }
       
?>