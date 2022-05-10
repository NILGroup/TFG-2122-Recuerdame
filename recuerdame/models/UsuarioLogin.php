<?php

class UsuarioLogin {

    private $idUsuario;
    private $iniciales;
    private $nombre;
    private $esTerapeuta;
    private $esCuidador;

    function __construct() {
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIniciales()
    {
        return $this->iniciales;
    }

    public function setIniciales($iniciales)
    {
        $this->iniciales = $iniciales;

        return $this;
    }

    public function getEsTerapeuta()
    {
        return $this->esTerapeuta;
    }

    public function setEsTerapeuta($esTerapeuta)
    {
        $this->esTerapeuta = $esTerapeuta;

        return $this;
    }

    public function getEsCuidador()
    {
        return $this->esCuidador;
    }

    public function setEsCuidador($esCuidador)
    {
        $this->esCuidador = $esCuidador;

        return $this;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}

