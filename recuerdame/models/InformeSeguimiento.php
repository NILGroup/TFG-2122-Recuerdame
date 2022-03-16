<?php

class InformeSeguimiento{

    private $idEvaluacion;
    private $idPacientes;
    private $fecha
    private $gds;
    private $fechaGds;
    private $mental;
    private $fechaMental;
    private $cdr;
    private $fechaCdr;
    private $diagnostico;
    private $observaciones;
    private $nombreEscala
    private $escala;
    private $fechaEscala;

    function __construct($idEvaluacion, $idPacientes, $fecha, $gds, $fechaGds, $mental, $fechaMental, 
                         $cdr, $fechaCdr, $diagnostico, $observaciones, $nombreEscala, $escala, $fechaEscala){
        this->$idEvaluacion = $idEvaluacion;
        this->$idPacientes = $idPacientes;
        this->$fecha = $fecha;
        this->$gds = $gds;
        this->$fechaGds = $fechaGds;
        this->$mental = $mental;
        this->$fechaMental = $fechaMental;
        this->$cdr = $cdr;
        this->$fechaCdr = $fechaCdr;
        this->$diagnostico = $diagnostico;
        this->$observaciones = $observaciones;
        this->$nombreEscala = $nombreEscala;
        this->$escala = $escala;
        this->$fechaEscala = $fechaEscala;
    }

    public function getIdEvaluacion(){
        return $this->idEvaluacion;
    }
    public function getIdPacientes(){
        return $this->idPacientes;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getGds(){
        return $this->gds;
    }
    public function getFechaGds(){
        return $this->fechaGds;
    }
    public function gemMntal(){
        return $this->mental;
    }
    public function getFechaMental(){
        return $this->fechaMental;
    }
    public function getCdr(){
        return $this->cdr;
    }
    public function getFechaCdr(){
        return $this->fechaCdr;
    }
    public function getDiagnostico(){
        return $this->diagnostico;
    }
    public function getObservaciones(){
        return $this->observaciones;
    }
    public function getNombreEscala(){
        return $this->nombreEscala;
    }
    public function getEscala(){
        return $this->escala;
    }
    public function getFechaEscala(){
        return $this->fechaEscala;
    }
    

}

