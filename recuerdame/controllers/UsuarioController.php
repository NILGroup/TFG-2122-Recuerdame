<?php

require_once('daos/UsuarioDAO.php');

class UsuarioController
{

    private $usuarioDao;

    public function __construct()
    {
        $this->usuarioDao = new UsuarioDAO();
    }

    public function getUsuario($idUsuario)
    {
        return $this->usuarioDao->getUsuario($idUsuario);
    }

    public function guardarUsuario($usuario)
    {
        $idUsuario = null;
        if ($usuario->getIdUsuario() == null) {
            $idUsuario = $this->usuarioDao->nuevoUsuario($usuario);
        } else {
            $idUsuario = $this->usuarioDao->modificarUsuario($usuario);
        }

        return $idUsuario;
    }

    public function comprobarUsuario($usuario)
    {

        return  $this->usuarioDao->comprobarUsuario($usuario);
    }
    public function getListaUsuarios($rol)
    {
        return $this->usuarioDao->getListaUsuarios($rol);
    }
    public function getListaTerapeutas()
    {
        return $this->usuarioDao->getListaTerapeutas();
    }
    public function modificarContrasenia($pass, $mail)
    {
        return $this->usuarioDao->modificarUsuario($pass, $mail);
    }
}
