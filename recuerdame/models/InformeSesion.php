<?php
 
class InformeSesion{

    private $idSesion;
    private $fechaFinalizacion;
    private $respuesta;
    private $observaciones;
    
    public function __construct($idSesion, $fechaFinalizacion, $respuesta, $observaciones){
        $this->idSesion = $idSesion;
        $this->fechaFinalizacion = $fechaFinalizacion;
        $this->respuesta = $respuesta;
        $this->observaciones = $observaciones;
    }
    
    public function getIdSesion(){
        return $this->idSesion;
    }

    public function getFechaFinalizacion(){
        return $this->fechaFinalizacion;
    }

    public function getRespuesta(){
        return $this->respuesta;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }

}