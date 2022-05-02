<?php

require_once('configdb.php');
require_once('models/Usuario.php');

class UsuarioDAO
{

    private $db;

    public function __construct()
    {
        $this->db = new Configdb();
    }

    /**
     * Login.
     */
    public function login($nombreUsuario)
    {

        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM usuario WHERE nombre_usuario = '$nombreUsuario'")
            or die($conexion->error);

        $u = $row->fetch_assoc();

        if ($u == null){
            return null;
        } else {
            $usuario = new Usuario();
            $usuario->setIdUsuario($u['id_usuario']);
            $usuario->setNombreUsuario($u['nombre_usuario']);
            $usuario->setContrasenia($u['contrasenia']);
            $usuario->setNombre($u['nombre']);
            $usuario->setApellidos($u['apellidos']);
            $usuario->setRol($u['rol']); 
            return $usuario;
        }
    }

    /**
     * Modificar.
     */
    public function modificarUsuario()
    {

        $conexion = $this->db->getConexion();
        $pass = password_hash("valeria", PASSWORD_DEFAULT);
        $row = $conexion->query("UPDATE usuario SET contrasenia = '$pass' WHERE id_usuario = 2")
            or die($conexion->error);

        $u = $row->fetch_assoc();
    }
}
