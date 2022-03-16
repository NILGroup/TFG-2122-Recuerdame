<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <meta charset="utf-8" />
    <title>Recuerdame</title>
</head>

<body>
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "layout/footer.php" ?>
    <?php include "controllers/SesionesController.php" ?>

    <div class="container-fluid">
        <?php
        if (!empty($_GET['idSesion'])) {
            $sesionesController = new SesionesController();
            $sesion = $sesionesController->verSesion($_GET['idSesion']);
        }
        ?>
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos de la sesión</h5>
            <hr class="lineaTitulo">
        </div>

        <div>
            <div class="row justify-content-between">
                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha</label>
                    <div class="col-sm-9 col-md-6 col-lg-4">
                        <input disabled type="date" class="form-control form-control-sm" id="fecha" value="<?php echo ($sesion['fecha']) ?>">
                    </div>
                </div>

                <div class="row">
                    <label for="etapa" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Etapa de la vida</label>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        <select disabled class="form-select form-select-sm" name="etapa">
                            <option selected value="0">Infancia</option>
                            <option value="1">Adolescencia</option>
                            <option value="2">Adultez</option>
                            <option value="3">Vejez</option>
                        </select>
                    </div>
                </div>             
            </div>

            <div class="mb-3">
                <label for="objetivo" class="form-label col-form-label-sm">Objetivo</label>
                <textarea disabled class="form-control form-control-sm" id="objetivo" rows="3"><?php echo ($sesion['objetivo']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label col-form-label-sm">Descripción</label>
                <textarea disabled class="form-control form-control-sm" id="descripcion" rows="3"><?php echo ($sesion['descripcion']) ?></textarea>
            </div>

        </div>

        <div>
            <button type="button" class="btn btn-primary btn-sm">Atrás</button>
        </div>
    </div>

</body>

</html>