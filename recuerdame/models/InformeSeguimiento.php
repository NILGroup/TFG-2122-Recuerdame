<?php

class InformeSeguimiento{

    private $informes;
    
    public function __construct(){
        $this->informes = array(
        array("1","21/11/2021","Alzheimer en estado leve"),
        array("2","21/02/2022","Alzheimer en estado medio"),
        array("3","21/04/2022","Alzheimer en estado medio"),
        array("4","21/06/2022","Alzheimer en estado avanzado"),
        );
    }
    
    public function ImprimeInforme($id){
        echo utf8_encode("<h1> Informe de seguimiento: ".$this->informes[$id - 1][0]."<h1>");
        echo utf8_encode("<h4> Fecha de la evaluación: ".$this->informes[$id - 1][1]."<h4>");
        echo utf8_encode("<h4> Diagnóstico: ".$this->informes[$id - 1][2]."<h4>");
    }
    
	public function imprimeListaInformes(){
		// Seach at the Base datos
        return $this->informes;
	}

}

