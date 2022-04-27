<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/InformeSesionController.php" ?>

    <div class="container-fluid">
        <?php
            if (!empty($_GET['idInforme'])) {
                $informeSesionController = new InformeSesionController();
                $informeSesion = $informeSesionController->verInformeSesion($_GET['idInforme']);
            }  else {
                $informeSesion = new InformeSesion();
                $informeSesion->setFecha(date('Y-m-d'));
            }
        ?>

        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos informe de sesión</h5>
            <hr class="lineaTitulo">
        </div>

        <form action="gestor.php?idInforme=<?php echo ($informeSesion->getIdSesion()) ?>" method="POST">
            <div>
                <div class="row">
                    <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha sesión</label>
                    <div class="col-sm-9 col-md-6 col-lg-2">
                        <input type="date" class="form-control form-control-sm" id="fecha" name="fecha" value="<?php echo ($informeSesion->getFecha()) ?>">
                    </div>
                </div>

                <div class="row">
                    <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha de informe</label>
                    <div class="col-sm-9 col-md-6 col-lg-2">
                        <input type="date" class="form-control form-control-sm" id="fecha_finalizada" name="fecha_finalizada" value="<?php echo ($informeSesion->getFechaFinalizacion()) ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="respuesta" class="form-label col-form-label-sm">Respuesta del paciente</label>
                    <textarea class="form-control form-control-sm" id="respuesta" name="respuesta" rows="1"><?php echo ($informeSesion->getRespuesta()) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="observaciones" class="form-label col-form-label-sm">Observaciones</label>
                    <textarea class="form-control form-control-sm" id="observaciones" name="observaciones" rows="1"><?php echo ($informeSesion->getObservaciones()) ?></textarea>
                </div>

                <div>
                    <button type="submit" name="guardarInformeSesion" value="Guardar" class="btn btn-outline-primary btn-sm">Guardar</button>
                    <button type="button" onclick="history.go(-1)" class="btn btn-primary btn-sm">Atrás</button></a>
                </div>

            </div>
         </form>

    </div>
    <?php include "layout/footer.php" ?>
</body>