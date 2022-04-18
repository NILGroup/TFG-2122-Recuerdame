<?php
	
    require_once('daos/UsuarioDAO.php');
	use \daos\UsuarioDAO as DU;

class UsuarioController{
    
    private $usuarioDao;
    private $usuario;
    
    public function __construct() {
        $this->usuarioDao = new UsuarioDAO();

   
    }
    
	public static function comprobarLogin($correo, $pass){
		$correoN = htmlspecialchars(trim(strip_tags($correo)));
	    $passN = htmlspecialchars(trim(strip_tags($pass)));
	      
	    //if($this->$dao->usuarioCorrecto($dniN) == 0){
	    if(DU::usuarioCorrecto($correoN) == 0){
	        //usuario no correcto, no existe
	        return false;
	    }else{
	        //$login = $this->$dao->compruebaLogin($dniN, $passN);
	        $login = DU::compruebaLogin($correoN, $passN);
	        return $login;
	    }
    }
}

?>