<?php

class ListaSesion{

    private $idSesion;
    private $fecha;
    private $idEtapa;
    private $objetivo;
    private $descripcion;
    private $barreras;
    private $facilitadores;
    private $fechaFinalizada;
    private $idPaciente;

    function __construct($idSesion, $fecha, $idEtapa, $objetivo, $descripcion, $barreras, $facilitadores, $fechaFinalizada, 
        $idPaciente) {

        $this->idSesion = $idSesion;
        $this->fecha = $fecha;
        $this->idEtapa = $idEtapa;
        $this->objetivo = $objetivo;
        $this->descripcion = $descripcion;
        $this->barreras = $barreras;
        $this->facilitadores = $facilitadores;
        $this->fechaFinalizada = $fechaFinalizada;
        $this->idPaciente = $idPaciente;
    }

    public function getIdSesion(){
        return $this->idSesion;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getIdEtapa() {
        return $this->idEtapa;
    }
    public function getObjetivo() {
        return $this->objetivo;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getBarreras() {
        return $this->barreras;
    }
    public function getFacilitadores() {
        return $this->facilitadores;
    }
    public function getFechaFinalizada() {
        return $this->fechaFinalizada;
    }
    public function getIdPaciente() {
        return $this->idPaciente;
    }

}