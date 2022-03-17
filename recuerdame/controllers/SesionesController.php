<?php

    require_once('daos/SesionDAO.php');

class SesionesController{
    
    private $listaSesiones;
    private $sesionDao;
    
    public function __construct() {
        $this->sesionDao = new SesionDAO();
        $this->listaSesiones = $this->sesionDao->getListaSesiones(1);
    }

    public function getListaSesiones() {
        return $this->listaSesiones;
    }

    public function verSesion($idSesion) {
        return $this->sesionDao->getSesion($idSesion);
    }

    public function eliminarSesion($idSesion) {
        $this->sesionDao->eliminarSesion($idSesion);
        return $this->listaSesiones = $this->sesionDao->getListaSesiones(1);;
    }
}

?>