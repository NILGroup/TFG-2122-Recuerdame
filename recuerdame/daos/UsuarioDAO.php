<?php

    require_once('configdb.php');
    require_once('models/Usuario.php');

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

        return $usuario
    }

}
