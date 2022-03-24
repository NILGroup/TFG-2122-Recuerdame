<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Recuerdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>

    <div class="container-fluid">
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Listado de personas relacionadas</h5>
            <hr class="lineaTitulo">
        </div>

        <div class="row p-2">
            <div class="col-12 justify-content-end d-flex">
                <div>
                    <input type="text" class="form-control form-control-sm" placeholder="Buscar..." aria-label="Buscar" aria-describedby="basic-addon1">
                </div>
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
                <a href="modificarDatosPersonaRelacionada.php"><button type="button" class="btn btn-success btn-sm">+</button></a>
            </div>
        </div>

        <div>
            <?php include "listadoPersonasRelacionadas.php" ?>
        </div>
    </div>
    <?php include "layout/footer.php" ?>
</body>

</html>