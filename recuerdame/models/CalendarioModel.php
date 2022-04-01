<?php
 
class CalendarioModel{

    private $idActividad;
    private $titulo;
    private $fecha;
    private $observaciones;
    private $color;
    
    public function __construct(){
    }
    
    public function getIdActividad(){
        return $this->idActividad;
    }
    public function setIdActividad($idActividad){
        $this->idActividad = $idActividad;
        return $this;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
        return $this;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
        return $this;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }
    public function setObservaciones( $observaciones){
        $this->observaciones = $observaciones;
        return $this;
    }
    public function getColor(){
        return $this->color;
    }
    public function setColor( $color){
        $this->color = $color;
        return $this;
    }



}
?>