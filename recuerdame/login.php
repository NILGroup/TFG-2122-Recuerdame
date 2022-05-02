﻿<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <script src="public/datatable/datatables.min.js"></script>
    <link rel="stylesheet" href="public/datatable/datatables.min.css">
    <script src="public/js/table.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "models/Session.php" ?>
    <form action="gestor.php" method="POST">
        <div class="card form-login">
            <img src="public/img/Marca_recuerdame.png" class="card-img-top">
            <div class="card-body">
                <div class="row mb-3">
                    <input class="form-control" type="text" name="usuario" value="" placeholder="Usuario" required>
                </div>

                <div class="row">
                    <input class="form-control" type="password" name="contrasena" value="" placeholder="Contraseña" required>
                </div>

                <?php if (Session::getError() != null) { ?>
                <div class="row error">
                    <?php echo Session::getError() ?>
                </div>
                <?php } ?>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" name="login" class="btn btn-primary btn-sm">Iniciar sesión</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>