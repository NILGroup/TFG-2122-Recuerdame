<?php

class InformeSeguimiento{

    private $idEvaluacion;
    private $idPacientes;
    private $fecha;
    private $gds;
    private $fechaGds;
    private $mental;
    private $fechaMental;
    private $cdr;
    private $fechaCdr;
    private $diagnostico;
    private $observaciones;
    private $nombreEscala;
    private $escala;
    private $fechaEscala;

    function __construct(){
    }

    public function getIdEvaluacion(){
        return $this->idEvaluacion;
    }
    public function setIdEvaluacion($idEvaluacion){
        $this->idEvaluacion = $idEvaluacion;
        return $this;
    }

    public function getIdPacientes(){
        return $this->idPacientes;
    }
    public function setIdPacientes($idPacientes){
        $this->idPacientes = $idPacientes;
        return $this;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
        return $this;
    }

    public function getGds(){
        return $this->gds;
    }
    public function setGds($gds){
        $this->gds = $gds;
        return $this;
    }

    public function getFechaGds(){
        return $this->fechaGds;
    }
    public function setFechaGds($fechaGds){
        $this->fechaGds = $fechaGds;
        return $this; 
    }

    public function getMental(){
        return $this->mental;
    }
    public function setMental($mental){
        $this->mental = $mental;
        return $this;
    }

    public function getFechaMental(){
        return $this->fechaMental;
    }
    public function setFechaMental($fechaMental){
        $this->fechaMental = $fechaMental;
        return $this;
    }

    public function getCdr(){
        return $this->cdr;
    }
    public function setCdr($cdr){
        $this->cdr = $cdr;
        return $this;
    }

    public function getFechaCdr(){
        return $this->fechaCdr;
    }
    public function setFechaCdr($fechaCdr){
        $this->fechaCdr = $fechaCdr;
        return $this;
    }

    public function getDiagnostico(){
        return $this->diagnostico;
    }
    public function setDiagnostico($diagnostico){
        $this->diagnostico = $diagnostico;
        return $this;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }
    public function setObservaciones($observaciones){
        $this->observaciones = $observaciones;
        return $this;
    }

    public function getNombreEscala(){
        return $this->nombreEscala;
    }
    public function setNombreEscala($nombreEscala){
        $this->nombreEscala = $nombreEscala;
        return $this;
    }

    public function getEscala(){
        return $this->escala;
    }
    public function setEscala($escala){
        $this->escala = $escala;
        return $this;
    }

    public function getFechaEscala(){
        return $this->fechaEscala;
    }
    public function setFechaEscala($fechaEscala){
        $this->fechaEscala = $fechaEscala;
        return $this;
    }
    
}

