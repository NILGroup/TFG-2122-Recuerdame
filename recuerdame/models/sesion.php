<?php

class Sesion{

    private $idSesion;
    private $fecha;
    private $idEtapa;
    private $objetivo;
    private $descripcion;
    private $barreras;
    private $facilitadores;
    private $fechaFinalizada;
    private $idPaciente;
    private $idUsuario;
    private $respuesta;
    private $observaciones;
    private $nombreUsuario;

    function __construct(){
    }

    public function getIdSesion(){
        return $this->idSesion;
    }
    public function setIdSesion($idSesion) {
        $this->idSesion = $idSesion;

        return $this;
    }

    public function getFecha() {
        return $this->fecha;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;

        return $this;
    }

    public function getIdEtapa() {
        return $this->idEtapa;
    }
    public function setIdEtapa($idEtapa) {
        $this->idEtapa = $idEtapa;

        return $this;
    }

    public function getObjetivo() {
        return $this->objetivo;
    }
    public function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;

        return $this;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getBarreras() {
        return $this->barreras;
    }
    public function setBarreras($barreras) {
        $this->barreras = $barreras;

        return $this;
    }

    public function getFacilitadores() {
        return $this->facilitadores;
    }
    public function setFacilitadores($facilitadores) {
        $this->facilitadores = $facilitadores;

        return $this;
    }

    public function getFechaFinalizada() {
        return $this->fechaFinalizada;
    }
    public function setFechaFinalizada($fechaFinalizada) {
        $this->fechaFinalizada = $fechaFinalizada;

        return $this;
    }

    public function getIdPaciente() {
        return $this->idPaciente;
    }
    public function setIdPaciente($idPaciente) {
        $this->idPaciente = $idPaciente;

        return $this;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getRespuesta() {
        return $this->respuesta;
    }
    public function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;

        return $this;
    }

    public function getObservaciones() {
        return $this->observaciones;
    }
    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }
    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

}