<?php

class Paciente {

    private $idPaciente;
    private $nombre;
    private $apellidos;
    private $genero;
    private $lugarNacimiento;
    private $nacionalidad;
    private $fechaNacimiento;
    private $tipoResidencia;
    private $residenciaActual;
    private $idTerapeuta;

    function __construct() {
    }
    public function getIdPaciente()
    {
        return $this->idPaciente;
    }
    public function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;

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
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }
    public function getLugarNacimiento()
    {
        return $this->lugarNacimiento;
    }
    public function setLugarNacimiento($lugarNacimiento)
    {
        $this->lugarNacimiento = $lugarNacimiento;

        return $this;
    }
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }
    public function getTipoResidencia()
    {
        return $this->tipoResidencia;
    }
    public function setTipoResidencia($tipoResidencia)
    {
        $this->tipoResidencia = $tipoResidencia;

        return $this;
    }
    public function getResidenciaActual()
    {
        return $this->residenciaActual;
    }
    public function setResidenciaActual($residenciaActual)
    {
        $this->residenciaActual = $residenciaActual;

        return $this;
    }
    public function getIdTerapeuta()
    {
        return $this->idTerapeuta;
    }
    public function setidTerapeuta($idTerapeuta)
    {
        $this->idTerapeuta = $idTerapeuta;

        return $this;
    }
    public function getIdCuidador()
    {
        return $this->idCuidador;
    }
    public function setidCuidador($idCuidador)
    {
        $this->idCuidador = $idCuidador;

        return $this;
    }
}

