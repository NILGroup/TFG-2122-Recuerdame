<?php

class Multimedia {

    private $idMultimedia;
    private $nombre;
    private $fichero;

    function __construct() {
    }

    public function getIdMultimedia()
    {
        return $this->idMultimedia;
    }

    public function setIdMultimedia($idMultimedia)
    {
        $this->idMultimedia = $idMultimedia;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFichero()
    {
        return $this->fichero;
    }

    public function setFichero($fichero)
    {
        $this->fichero = $fichero;

        return $this;
    }
}

