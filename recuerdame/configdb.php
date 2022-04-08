<?php

class Configdb {
    // Atributos para la conexión
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "recuerdame";

    // Conector
    private $conexion;

    // Errores
    private $error = false;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

        if ($this->conexion->connect_error) {
            $this->error = true;
        }
    }

    /**
     * Función para comprobar si hay algún error en la conexión
     */
    function isError() {
        return $this->error;
    }

    public function getConexion() {
        return $this->conexion;
    }

    function __destruct() {
        $this->conexion->close();
    }
}

?>