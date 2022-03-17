<?php

class Recuerdo {

    private $idRecuerdo;
    private $fecha;
    private $nombre;
    private $descripcion;
    private $localizacion;
    private $idEtapa;
    private $idCategoria;
    private $idEmocion;
    private $idEstado;
    private $idEtiqueta;
    private $puntuacion;
    private $idPaciente;

    function __construct() {
    }

    public function getIdRecuerdo() {
        return $this->idRecuerdo;
    }
    public function setIdRecuerdo($idRecuerdo) {
        $this->idRecuerdo = $idRecuerdo;

        return $this;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;

        return $this;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;

        return $this;
    }
    public function getLocalizacion() {
        return $this->localizacion;
    }
    public function setLocalizacion($localizacion) {
        $this->localizacion = $localizacion;

        return $this;
    }
    public function getIdEtapa() {
        return $this->idEtapa;
    }
    public function setIdEtapa($idEtapa) {
        $this->idEtapa = $idEtapa;

        return $this;
    }
    public function getIdCategoria() {
        return $this->idCategoria;
    }
    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;

        return $this;
    }
    public function getIdEmocion() {
        return $this->idEmocion;
    }
    public function setIdEmocion($idEmocion) {
        $this->idEmocion = $idEmocion;

        return $this;
    }
    public function getIdEstado() {
        return $this->idEstado;
    }
    public function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;

        return $this;
    }
    public function getIdEtiqueta() {
        return $this->idEtiqueta;
    }
    public function setIdEtiqueta($idEtiqueta) {
        $this->idEtiqueta = $idEtiqueta;

        return $this;
    }
    public function getPuntuacion() {
        return $this->puntuacion;
    }
    public function setPuntuacion($puntuacion) {
        $this->puntuacion = $puntuacion;

        return $this;
    }
    public function getIdPaciente() {
        return $this->idPaciente;
    }
    public function setIdPaciente($idPaciente) {
        $this->idPaciente = $idPaciente;

        return $this;
    }
}

