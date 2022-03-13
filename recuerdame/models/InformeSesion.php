<?php

class InformeSesion{

    private $informes;
    
    public function __construct(){
        $this->informes = array(
        array("1","21/11/2021","1","Positiva"),
        array("2","10/12/2021","2","Neutral"),
        array("3","21/12/2021","3","Negativa"),
        array("4","05/01/2022","4","Positiva"),
        );
    }
    
    public function ImprimeInforme($id){

    }

	public function imprimeListaInformes(){
		// Seach at the Base datos
        return $this->informes;
	}

}