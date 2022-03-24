<?php

require_once('configdb.php');

class ComunesDAO
{

    private $db;

    public function __construct()
    {
        $this->db = new Configdb();
    }

    public function getListaCategorias()
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM categoria")
            or die($conexion->error);

        $listaCategorias = array();
        while ($rows = $row->fetch_assoc()) {
            $listaCategorias[] = $rows;
        };
        return $listaCategorias;
    }

    public function getListaEmociones()
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM emocion")
            or die($conexion->error);

        $listaEmociones = array();
        while ($rows = $row->fetch_assoc()) {
            $listaEmociones[] = $rows;
        };
        return $listaEmociones;
    }

    public function getListaEtapas()
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM etapa")
            or die($conexion->error);

        $listaEtapas = array();
        while ($rows = $row->fetch_assoc()) {
            $listaEtapas[] = $rows;
        };
        return $listaEtapas;
    }

    public function getListaEstados()
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM estado")
            or die($conexion->error);

        $listaEstados = array();
        while ($rows = $row->fetch_assoc()) {
            $listaEstados[] = $rows;
        };
        return $listaEstados;
    }

    public function getListaEtiquetas()
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM etiqueta")
            or die($conexion->error);

        $listaEtiquetas = array();
        while ($rows = $row->fetch_assoc()) {
            $listaEtiquetas[] = $rows;
        };
        return $listaEtiquetas;
    }

    public function getListaTiposRelacion()
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM tipo_relacion")
            or die($conexion->error);

        $listaTiposRelacion = array();
        while ($rows = $row->fetch_assoc()) {
            $listaTiposRelacion[] = $rows;
        };
        return $listaTiposRelacion;
    }

    public function getListaTerapeutas()
    {
        $conexion = $this->db->getConexion();
        $row = $conexion->query("SELECT * FROM usuario")
            or die($conexion->error);

        $listaTerapeutas = array();
        while ($rows = $row->fetch_assoc()) {
            $listaTerapeutas[] = $rows;
        };
        return $listaTerapeutas;
    }
}
