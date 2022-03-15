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

    function __construct($idRecuerdo, $fecha, $nombre, $descripcion, $localizacion, $idEtapa, $idCategoria, 
        $idEmocion, $idEstado, $idEtiqueta, $puntuacion, $idPaciente) {
        $this->idRecuerdo = $idRecuerdo;
        $this->fecha = $fecha;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->localizacion = $localizacion;
        $this->idEtapa = $idEtapa;
        $this->idCategoria = $idCategoria;
        $this->idEmocion = $idEmocion;
        $this->idEstado = $idEstado;
        $this->idEtiqueta = $idEtiqueta;
        $this->puntuacion = $puntuacion;
        $this->idPaciente = $idPaciente;
    }

    public function getIdRecuerdo(){
        return $this->idRecuerdo;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getLocalizacion() {
        return $this->localizacion;
    }
    public function getIdEtapa() {
        return $this->idEtapa;
    }
    public function getIdCategoria() {
        return $this->idCategoria;
    }
    public function getIdEmocion() {
        return $this->idEmocion;
    }
    public function getIdEstado() {
        return $this->idEstado;
    }
    public function getIdEtiqueta() {
        return $this->idEtiqueta;
    }
    public function getPuntuacion() {
        return $this->puntuacion;
    }
    public function getIdPaciente() {
        return $this->idPaciente;
    }
}

