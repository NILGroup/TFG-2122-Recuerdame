<?php

require_once("daos/UsuarioDAO.php");
require_once('models/UsuarioLogin.php');
require_once('models/RolEnum.php');
require_once("controllers/PacientesController.php");

class LoginController
{

    private $usuarioDAO;

    public function __construct()
    {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function verUsuario($id){
        return $this->usuarioDAO->getUsuario($id);
    }

    public function login($username, $password)
    {
        $usuario = $this->usuarioDAO->login($username);

        if ($usuario == null) {
            return;
        }

        if (!password_verify($password, $usuario->getContrasenia())) {
            $usuario = null;
            return;
        }
        $iniciales = '';
        $nombre = '';
        if ($usuario->getNombre() != null) {
            $iniciales = substr($usuario->getNombre(), 0, 1);
            $nombre = $usuario->getNombre();
        }

        if ($usuario->getNombre() != null) {
            $iniciales .= substr($usuario->getApellidos(), 0, 1);
            $nombre .= " " . $usuario->getApellidos();
        }

        $us = new UsuarioLogin();
        $us->setIdUsuario($usuario->getIdUsuario());
        $us->setIniciales($iniciales);
        $us->setNombre($nombre);

        $us->setEsTerapeuta(false);
        $us->setEsCuidador(false);

        match (RolEnum::fromRol($usuario->getRol())) {
            RolEnum::TERAPEUTA => $us->setEsTerapeuta(true),
            RolEnum::CUIDADOR => $us->setEsCuidador(true),
        };
        Session::setUsuario($us);

        if (Session::esTerapeuta()) {
            header("Location: listadoPacientes.php");
        }

        if (Session::esCuidador()) {
            $pacientesController = new PacientesController();
            $paciente = $pacientesController->verPaciente(1);

            $cumpleanos = new DateTime($paciente->getFechaNacimiento());
            $hoy = new DateTime();
            $edad = $hoy->diff($cumpleanos);

            $genero = '';
            if ($paciente->getGenero() == 'H') {
                $genero = 'Hombre';
            } else if ($paciente->getGenero() == 'M') {
                $genero = 'Mujer';
            }

            $nombre = ($paciente->getNombre()) . " " . ($paciente->getApellidos());
            $p = new PacienteCabecera();
            $p->setIdPaciente($paciente->getIdPaciente());
            $p->setNombre($nombre);
            $p->setEdad($edad);
            $p->setGenero($genero);
            $p->setCodigoGenero($paciente->getGenero());

            Session::setPaciente($p);
            header("Location: verDatosPaciente.php");
        }

        return $usuario;
    }
}
