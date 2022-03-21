<?php
 
class InformeSesion{

    private $idSesion;
    private $fechaFinalizacion;
    private $respuesta;
    private $observaciones;
    
    public function __construct(){
    }
    
    public function getIdSesion(){
        return $this->idSesion;
    }
    public function setIdSesion($idSesion){
        $this->idSesion = $idSesion;
        return $this;
    }

    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
        return $this;
    }

    public function getFechaFinalizacion(){
        return $this->fechaFinalizacion;
    }
    public function setFechaFinalizacion($fechaFinalizacion){
        $this->fechaFinalizacion = $fechaFinalizacion;
        return $this;
    }

    public function getRespuesta(){
        return $this->respuesta;
    }
    public function setRespuesta($respuesta){
        $this->respuesta = $respuesta;
        return $this;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }
    public function setObservaciones( $observaciones){
        $this->observaciones = $observaciones;
        return $this;
    }


}