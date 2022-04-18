<?php
	
   
	require_once ('daos/UsuarioDAO.php');

class UsuarioController{
    
    private $usuarioDao;
    
    public function __construct() {
        $this->usuarioDao = new UsuarioDAO();
    }
    
	public static function comprobarLogin($correo, $pass){
		$correoN = htmlspecialchars(trim(strip_tags($correo)));
	    $passN = htmlspecialchars(trim(strip_tags($pass)));
	      
	    //if($this->$dao->usuarioCorrecto($dniN) == 0){
	    if($this->usuarioDao->usuarioCorrecto($correoN) == 0){
	        //usuario no correct, no existe
	        return false;
	    }
	    else{
	        $login = $this->usuarioDao->compruebaLogin($correoN, $passN);
	        return $login;
	        
	    }
	}
}

?>