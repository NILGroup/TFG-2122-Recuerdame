<?php

    require_once('daos/SesionDAO.php');

class SesionesController{
    
    private $listaSesiones;
    private $sesionDao;
    
    public function __construct() {
        $this->sesionDao = new SesionDAO();
   
    }

    public function getListaSesiones() {
        return $this->listaSesiones = $this->sesionDao->getListaSesiones(1);
    }

    public function verSesion($idSesion) {
        return $this->sesionDao->getSesion($idSesion);
    }

    public function guardarSesion($sesion) {
        $idSesion = null;
        if ($sesion->getIdSesion() == null) {
            $idSesion = $this->sesionDao->nuevaSesion($sesion);
        } else {
            $idSesion = $this->sesionDao->modificarSesion($sesion);
        }

        return $idSesion;
    }

    public function eliminarSesion($idSesion) {
        $this->sesionDao->eliminarSesion($idSesion);
    }
}

?>