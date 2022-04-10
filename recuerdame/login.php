<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/login.css">
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <script src="public/datatable/datatables.min.js"></script>
    <link rel="stylesheet" href="public/datatable/datatables.min.css">
    <script src="public/js/table.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Recuerdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <section class="form-login">
        <h5>Login</h5>
        <input class="controls" type="text" name="usuario" value="" placeholder="Usuario">
        <input class="controls" type="password" name="contrasena" value="" placeholder="Contraseña">
       
        <div class="center-button">
            <a href="verDatosPaciente.php"><button type="button" class="btn btn-primary btn-sm">Iniciar sesión</button></a>
        
        </div>
        
        </section>
    <?php include "layout/footer.php" ?>

</body>

</html>