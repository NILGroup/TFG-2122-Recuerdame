<?php

    require_once('daos/UsuarioDAO.php');

class UsuarioController{

    private $usuarioDao;
    

    public function __construct() {
        $this->usuarioDao = new UsuarioDAO();
        
    }

   
    public function guardarUsuario($usuario) {
        $idUsuario = null;
        if ($usuario->getIdUsuario() == null) {
            $idUsuario = $this->usuarioDao->nuevoUsuario($usuario);
        } else {
            $idUsuario = $this->usuarioDao->modificarUsuario($usuario);
        }

        return $idPaciente;
    }
    
    public function comprobarUsuario($usuario){

          return  $this->usuarioDao->comprobarUsuario($usuario);
    }
    public function getListaUsuarios($rol) {
        return $this->usuarioDao->getListaUsuarios($rol);
    }
    
}
?>