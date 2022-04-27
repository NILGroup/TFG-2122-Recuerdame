<?php
    require_once('models/Session.php');
    if (!Session::usuarioLogado()) {
        header("Location: login.php");
    }

?>