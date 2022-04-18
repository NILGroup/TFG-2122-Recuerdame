<?php

    require_once('daos/UsuarioDAO.php');

class usuarioController{
    
    private $usuarioDao;
    private $usuario;
    
    public function __construct() {
        $this->usuarioDao = new UsuarioDAO();

   
    }
    public function loginUsuario($correo, $contraseña){
    $this->usuario = $this->usuarioDao->getUsuarioForLogin($correo);
        if(usuario != null){
            if($this->usuario->getContrasenia() == $contrasenia){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}

?>