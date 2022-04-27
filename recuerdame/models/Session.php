<?php

if (!isset($_SESSION)) { 
    session_start(); 
}

class Session {

    public static function getIdPaciente()
    {
        $idPaciente = null;
        if (isset($_SESSION) && isset($_SESSION['idPaciente'])) {
            $idPaciente = $_SESSION['idPaciente'];
        }

        return $idPaciente;
    }

    public static function usuarioLogado()
    {
        return isset($_SESSION) && isset($_SESSION['usuario']);
    }

    public static function esTerapeuta()
    {
        return isset($_SESSION) && isset($_SESSION['esTerapeuta']) && $_SESSION['esTerapeuta'];
    }

    public static function esCuidador()
    {
        return isset($_SESSION) && isset($_SESSION['esCuidador']) && $_SESSION['esCuidador'];
    }
}

