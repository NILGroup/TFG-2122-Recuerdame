<?php

class UsuarioLogin {

    private $idUsuario;
    private $iniciales;

    function __construct() {
    }

    /**
     * Get the value of idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of iniciales
     */ 
    public function getIniciales()
    {
        return $this->iniciales;
    }

    /**
     * Set the value of iniciales
     *
     * @return  self
     */ 
    public function setIniciales($iniciales)
    {
        $this->iniciales = $iniciales;

        return $this;
    }
}

