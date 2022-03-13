<?php

class InformeSeguimiento{

    private $informes;
    
    public function __construct(){
        $this->informes = array(
        array("1","21/11/2021","Alzeimer en estado leve"),
        array("2","21/02/2022","Alzeimer en estado medio"),
        array("3","21/04/2022","Alzeimer en estado medio"),
        array("4","21/06/2022","Alzeimer en estado avanzado"),
        );
    }
    
    public function ImprimeInforme($id){

    }

	public function imprimeListaInformes(){
		// Seach at the Base datos
        return $this->informes;
	}

}

