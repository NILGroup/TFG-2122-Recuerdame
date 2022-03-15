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
        echo utf8_encode("<h1> Informe de sesión: ".$this->informes[$id - 1][0]."<h1>");
        echo utf8_encode("<h4> Fecha de la sesión: ".$this->informes[$id - 1][1]."<h4>");
        echo utf8_encode("<h4> Numero de la sesión: ".$this->informes[$id - 1][2]."<h4>");
        echo utf8_encode("<h4> Reaccion del paciente a la sesión: ".$this->informes[$id - 1][3]."<h4>");

    }

	public function imprimeListaInformes(){
		// Seach at the Base datos
        return $this->informes;
	}

}