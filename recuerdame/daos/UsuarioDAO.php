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

    public function getUsuario($id){
        echo "<script>console.log('Debug Objects: " . $id . "' );</script>";
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM usuario WHERE id_usuario = '$id'")
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
     * Login.
     */
    public function login($nombreUsuario)
    {

        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM usuario WHERE correo = '$nombreUsuario'")
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

    /*comprobar que no se ingresan dos usuarios con el mismo correo o nombre de usuario*/
    public function comprobarUsuario($usuario){

        $conexion = $this->db->getConexion();
        $nombreUsuario = $usuario->getNombreUsuario();
        $correo = $usuario->getCorreo();
        $row = $conexion->query("SELECT * FROM usuario WHERE nombre_usuario = '$nombreUsuario' or correo = '$correo'")
            or die($conexion->error);

        $u = $row->fetch_assoc();

        if ($u == null){
            return null;
        } else {
            return 1;
        }

    }

    public function nuevoUsuario($usuario)
    {
        $conexion = $this->db->getConexion();
        $password = password_hash($usuario->getContrasenia(), PASSWORD_DEFAULT);
        $consultaSQL = "INSERT INTO usuario (id_usuario, nombre_usuario, correo, contrasenia, nombre, apellidos,
        rol 
         ) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $conexion->prepare($consultaSQL);
        $stmt->execute(array(
            NULL,
            $usuario->getNombreUsuario(),
            $usuario->getCorreo(),
            $password,
            $usuario->getNombre(),
            $usuario->getApellidos(),
            $usuario->getRol()
        ));

        $stmt->close();

        return $conexion->insert_id;
    }


    //recoger los terapeutas


    public function getListaTerapeutas()
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM usuario WHERE rol = 'TERAPEUTA'")
            or die($conexion->error);

        $listaTerapeutas = array();
        while ($rows = $row->fetch_assoc()) {
            $listaTerapeutas[] = $rows;
        };

        return $listaTerapeutas;
    }

    /**
     * Modificar.
     */
    public function modificarUsuario($password,$mail)
    {

        $conexion = $this->db->getConexion();

        $pass = password_hash($password, PASSWORD_DEFAULT);
        $row = $conexion->query("UPDATE usuario SET contrasenia = '$pass' WHERE correo = '$mail'")
            or die($conexion->error);

       
    }
}
