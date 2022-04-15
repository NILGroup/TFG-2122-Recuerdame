<?php

require_once('configdb.php');
require_once('models/Multimedia.php');

class MultimediaDAO
{

    private $db;

    public function __construct()
    {
        $this->db = new Configdb();
    }

    /**
     * Datos de un fichero multimedia.
     */
    public function getMultimedia($idMultimedia)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM multimedia WHERE id_multimedia = '$idMultimedia'")
            or die($conexion->error);

        $m = $row->fetch_assoc();

        $multimedia = new Multimedia();
        $multimedia->setIdMultimedia($m['id_multimedia']);
        $multimedia->setNombre($m['nombre']);
        $multimedia->setFichero($m['fichero']);

        return $multimedia;
    }

    /**
     * Listado de todos los ficheros multimedia.
     */
    public function getListaMultimedia($idMultimedia)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM multimedia") or die($conexion->error);

        $listaMultimedia = array();
        while ($rows = $row->fetch_assoc()) {
            $listaMultimedia[] = $rows;
        };

        return $listaMultimedia;
    }

    /**
     * Listado de los archivos multimedia de la aplicación con o sin recuerdo.
     * Se utiliza en la pantalla de añadir archivos multimedia a un recuerdo
     * y tiene que mostrar todos los archivos de la aplicación e indicar cuales pertenecen al recuerdo.
     */
    public function getListaMultimediaRecuerdoAnadir($idRecuerdo)
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT m.id_multimedia AS idMultimedia,
                m.nombre, m.fichero,
                (SELECT rm.id_recuerdo FROM recuerdo_multimedia rm
                WHERE rm.id_multimedia = m.id_multimedia AND rm.id_recuerdo = $idRecuerdo) AS id_recuerdo
                FROM multimedia m")
            or die($conexion->error);

        $listaMultimedia = array();
        while ($rows = $row->fetch_assoc()) {
            $listaMultimedia[] = $rows;
        };

        return $listaMultimedia;
    }
}
