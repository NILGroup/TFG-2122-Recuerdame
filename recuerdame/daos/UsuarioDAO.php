<?php

    require_once('configdb.php');
    require_once('models/Usuario.php');
	use Aplicacion as App;

class UsuarioDAO{

    private $db;

    public function __construct() {
        $this->db = new Configdb();
    }

    public function getUsuario($idUsuario) {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM usuario WHERE id_usuario = '$idUsuario'")
            or die ($conexion->error);

        $u = $row->fetch_assoc();

        $usuario = new Usuario();
        $usuario->setIdUsuario($u['id_usuario']);
        $usuario->setNombre($u['nombre']);
        $usuario->setApellidos($u['apellidos']);
        $usuario->setCorreo($u['correo']);
        $usuario->setContrasenia($u['contrasenia']);

        return $usuario;
        
    }

    public function getUsuarioForLogin($correo){
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM usuario WHERE correo = '$correo'")
            or die ($conexion->error);

        $u = $row->fetch_assoc();
        
        $usuario = new Usuario();
        $usuario->setIdUsuario($u['id_usuario']);
        $usuario->setNombre($u['nombre']);
        $usuario->setApellidos($u['apellidos']);
        $usuario->setCorreo($u['correo']);
        $usuario->setContrasenia($u['contrasenia']);

        return $usuario;
    }

    public static function compruebaLogin($correo, $pass){
			$app = App::getSingleton();
            $con = $app->conexionBd();
			$sql = sprintf("SELECT * FROM usuario WHERE correo = '$correo'");
			$rs = $con->query($sql); //or die ($con->error);
			$login =false;
			if($rs){
				while($row = $rs->fetch_assoc()){    
					//$hash = $row['Pass'];
					//$key='';  
				    //$passBd = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($hash), MCRYPT_MODE_CBC, md5(md5($key))), "\0");

                    $passBd = $row['contrasenia'];

					if ($pass == $passBd) { 
						//$usuario = new Usuario($row['IdUsuario'], $row['DNI'], $pass, $row['Rol']);
						$usuario = new Usuario();
                        $usuario->setIdUsuario($row['id_usuario']);
                        $usuario->setNombre($row['nombre']);
                        $usuario->setApellidos($row['apellidos']);
                        $usuario->setCorreo($row['correo']);
                        $usuario->setContrasenia($pass);

                        /*
						if($row['Rol'] == 'Paciente'){
							$daoP = new DaoPacientes();
							$nombre = $daoP->buscaNombrePaciente($row['DNI']);
							$sexo = $daoP->buscaSexoPaciente($row['DNI']);
						}elseif ($row['Rol'] == 'Medico') {
							$daoM = new DaoMedicos();
							$nombre = $daoM->buscaNombreMedico($row['DNI']);
							$sexo = '';
						}
						*/
						$app->login($usuario);
						$login=true;
					}
				}
			}
			return $login;
		}

    public static function usuarioCorrecto($correo){
		$app = App::getSingleton();
		$con = $app->conexionBd();
		$sql = sprintf("SELECT * FROM usuarios WHERE correo = '$correo'", $con->real_escape_string($correo));
		    
		$rs = $con->query($sql) or die ($con->error);
		if($rs != NULL){
		    $num_cols = $rs->num_rows;
		    $rs->free();
		    return $num_cols;
		}
	}

}
