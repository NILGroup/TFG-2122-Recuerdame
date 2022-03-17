<?php

    require_once('daos/ComunesDAO.php');

class ComunesController{
    
    private $comunesDao;
    
    public function __construct() {
        $this->comunesDao = new ComunesDAO();
    }

    public function getListaEtapas() {
        return $this->listaEtapas = $this->comunesDao->getListaEtapas();
    }

    public function getListaCategorias() {
        return $this->listaCategorias = $this->comunesDao->getListaCategorias();
    }

    public function getListaEmociones() {
        return $this->listaEmociones = $this->comunesDao->getListaEmociones();
    }

    public function getListaEstados() {
        return $this->listaEstados = $this->comunesDao->getListaEstados();
    }

    public function getListaEtiquetas() {
        return $this->listaEtiquetas = $this->comunesDao->getListaEtiquetas();
    }

    public function getListaTiposRelacion() {
        return $this->listaTiposRelacion = $this->comunesDao->getListaTiposRelacion();
    }

    public function getListaTerapeutas() {
        return $this->listaTerapeutas = $this->comunesDao->getListaTerapeutas();
    }
}

?>