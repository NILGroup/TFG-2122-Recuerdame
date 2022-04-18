<?php

class Aplicacion {
    private static $instancia;
    private $bdDatosConexion;
    private $rutaRaizApp;
    private $dirInstalacion;

    public static function getSingleton() {
        if (  !self::$instancia instanceof self) {
           self::$instancia = new self;
        }
        return self::$instancia;
    }

    private function __construct() {}

    public function init($bdDatosConexion, $rutaRaizApp, $dirInstalacion){
      $this->bdDatosConexion = $bdDatosConexion;

      $this->rutaRaizApp = $rutaRaizApp;
      $tamRutaRaizApp = mb_strlen($this->rutaRaizApp);
      if ($tamRutaRaizApp > 0 && $this->rutaRaizApp[$tamRutaRaizApp-1] !== '/') {
        $this->rutaRaizApp .= '/';
      }

      $this->dirInstalacion = $dirInstalacion;
      $tamDirInstalacion = mb_strlen($this->dirInstalacion);
      if ($tamDirInstalacion > 0 && $this->dirInstalacion[$tamDirInstalacion-1] !== '/') {
        $this->dirInstalacion .= '/';
      }

      $this->conn = null;
      session_start();
    }

    public function resuelve($path = '') {
      if (strlen($path) > 0 && $path[0] == '/') {
        $path = mb_substr($path, 1);
      }
      return $this->rutaRaizApp . $path;
    }

    public function doInclude($path = '') {
      if (strlen($path) > 0 && $path[0] == '/') {
        $path = mb_substr($path, 1);
      }
      include($this->dirInstalacion . '/'.$path);
    }

    public function login($user, $nombre, $sexo) {
      $_SESSION['login'] = true;
      $_SESSION['correo'] = $user->getCorreo();
      $_SESSION['contrasenia'] = $user->getContrasenia();
      //$_SESSION['rol'] = $user->getRol();
   
  }

  public function logout() {
    //Doble seguridad: unset + destroy
    unset($_SESSION["login"]);
    unset($_SESSION["correo"]);
    unset($_SESSION["contrasenia"]);
    //unset($_SESSION["rol"]);
  
    session_destroy();
    session_start();
  }

  public function usuarioLogueado() {
    return isset($_SESSION["login"]) && ($_SESSION["login"]===true);
  }

  public function nombreUsuario() {
    return isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
  }
/*
  public function tieneRol($rol, $cabeceraError=NULL, $mensajeError=NULL) {
    if (!isset($_SESSION['rol']) || $rol != $_SESSION['rol']) {
      if ( !is_null($cabeceraError) && ! is_null($mensajeError) ) {
        $bloqueContenido=<<<EOF
        <h1>$cabeceraError!</h1>
        <p>$mensajeError.</p>
EOF;
        echo $bloqueContenido;
      }

      return false;
    }

    return true;
  }
*/
    public function conexionBd() {
      if (! $this->conn ) {
        $bdHost = $this->bdDatosConexion['host'];
        $bdUser = $this->bdDatosConexion['user'];
        $bdPass = $this->bdDatosConexion['pass'];
        $bd = $this->bdDatosConexion['db_name'];

        $this->conn = new \mysqli($bdHost, $bdUser, $bdPass, $bd);
        if ( $this->conn->connect_errno ) {
          echo "Error de conexi�n a la BD: (" . $this->conn->connect_errno . ") " . utf8_encode($this->conn->connect_error);
          exit();
        }
        if ( ! $this->conn->set_charset("utf8mb4")) {
          echo "Error al configurar la codificaci�n de la BD: (" . $this->conn->errno . ") " . utf8_encode($this->conn->error);
          exit();
        }
      }
      return $this->conn;
    }

  }
?