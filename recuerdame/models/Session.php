<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once('models/PacienteCabecera.php');

class Session
{

    public static function getIdPaciente()
    {
        $idPaciente = null;
        if (isset($_SESSION) && isset($_SESSION['paciente'])) {
            $idPaciente = unserialize($_SESSION['paciente'])->getIdPaciente();
        }

        return $idPaciente;
    }

    public static function getCabeceraNombrePaciente()
    {
        $nombre = '';
        if (isset($_SESSION) && isset($_SESSION['paciente'])) {
            $nombre = unserialize($_SESSION['paciente'])->getNombre();
        }

        return $nombre;
    }

    public static function getCabeceraEdadPaciente()
    {
        $edad = '';
        if (isset($_SESSION) && isset($_SESSION['paciente'])) {
            $edad = unserialize($_SESSION['paciente'])->getEdad();
        }

        return $edad;
    }

    public static function getCabeceraGeneroPaciente()
    {
        $genero = '';
        if (isset($_SESSION) && isset($_SESSION['paciente'])) {
            $genero = unserialize($_SESSION['paciente'])->getGenero();
        }

        return $genero;
    }

    public static function getCabeceraGeneroCodePaciente()
    {
        $genero = '';
        if (isset($_SESSION) && isset($_SESSION['paciente'])) {
            $genero = unserialize($_SESSION['paciente'])->getCodigoGenero();
        }

        return $genero;
    }

    public static function setUsuario($usuario)
    {
        $_SESSION['usuario'] = serialize($usuario);
    }

    public static function setPaciente($paciente)
    {
        $_SESSION['paciente'] = serialize($paciente);
    }

    public static function usuarioLogado()
    {
        return isset($_SESSION) && isset($_SESSION['usuario']);
    }

    public static function esTerapeuta(): bool
    {
        return isset($_SESSION) && isset($_SESSION['usuario']) && unserialize($_SESSION['usuario'])->getEsTerapeuta();
    }

    public static function esCuidador(): bool
    {
        return isset($_SESSION) && isset($_SESSION['usuario']) && unserialize($_SESSION['usuario'])->getEsCuidador();
    }

    public static function cleanSession()
    {
        unset($_SESSION["usuario"]);
        unset($_SESSION["paciente"]);
    }
}
