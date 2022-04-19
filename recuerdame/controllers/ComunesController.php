<?php

    require_once('daos/ComunesDAO.php');

    if (!isset($_SESSION['idPaciente'])) {
        session_start();
    }

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

    public function getEtapa($idEtapa) {
        return $this->comunesDao->getEtapa($idEtapa);
    }

    public function getCategoria($idCategoria) {
        return $this->comunesDao->getCategoria($idCategoria);
    }

    public function getEtiqueta($idEtiqueta) {
        return $this->comunesDao->getEtiqueta($idEtiqueta);
    }
}

?>