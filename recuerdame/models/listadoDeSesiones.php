<?php

class ListaSesion{

    private $lista;
    
    public function __construct(){
        $this->lista = array(
        array("1","09/02/2022","Objetivo","No finalizada"),
        array("2","01/02/2022","Objetivo","Finalizada"),
        array("3","20/01/2022","Objetivo","Finalizada"),
        array("4","10/01/2022","Objetivo","Finalizada"),
        array("5","27/01/2022","Objetivo","Finalizada"),
        );
    }
    
    public function ImprimeLista($id){

    }

	public function imprimeListaSesiones(){
		// Seach at the Base datos
        return $this->lista;
	}

}