<?php

    require_once('daos/MultimediaDAO.php');

class MultimediaController{

    private $multimediaDao;
    
    public function __construct() {
        $this->multimediaDao = new MultimediaDAO();
    }

    /**
     * Lista de los ficheros multimedia de toda la aplicación. Se buscan las que están relacionadas con el recuerdo
     * para indicarlo en la pantalla
     */
    public function getListaMultimediaRecuerdoAnadir($idRecuerdo) {
        return $this->multimediaDao->getListaMultimediaRecuerdoAnadir($idRecuerdo);
    }
}

?>