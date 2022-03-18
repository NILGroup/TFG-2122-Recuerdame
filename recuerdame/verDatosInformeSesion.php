<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuerdame</title>
</head>

<body>
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "layout/footer.php" ?>
    <?php include "controllers/InformeSesionController.php" ?>

    <div class="container-fluid">
        <?php
            if (!empty($_GET['idInforme'])) {
                $informeSesionController = new InformeSesionController();
                $informeSesion = $informeSesionController->verInformeSesion($_GET['idInforme']);
            }
        ?>

        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos informe de sesión</h5>
            <hr class="lineaTitulo">
        </div>

        <div class="row">
            <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha sesión:</label>
            <div class="col-sm-9 col-md-6 col-lg-2">
                <input disabled type="date" class="form-control form-control-sm" id="fecha" value="<?php echo ($informeSesion['fecha']) ?>">
            </div>
        </div>

        <div class="row">
            <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha de informe:</label>
            <div class="col-sm-9 col-md-6 col-lg-2">
                <input disabled type="date" class="form-control form-control-sm" id="fecha" value="<?php echo ($informeSesion['fecha_finalizada']) ?>">
            </div>
        </div>

        <div class="mb-3">
            <label for="respuesta" class="form-label col-form-label-sm">Respuesta del paciente:</label>
            <textarea disabled class="form-control form-control-sm" id="respuesta" rows="1"><?php echo ($informeSesion['respuesta']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label col-form-label-sm">Observaciones:</label>
            <textarea disabled class="form-control form-control-sm" id="observaciones" rows="1"><?php echo ($informeSesion['observaciones']) ?></textarea>
        </div>


    </div>
</body>