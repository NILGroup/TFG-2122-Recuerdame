<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <meta charset="utf-8" />
    <script src ="public/js/general.js" defer></script>
    <title>Recuerdame</title>
</head>

<body>
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "layout/footer.php" ?>
    <?php include "controllers/SesionesController.php" ?>
    <?php include "controllers/ComunesController.php" ?>

    <div class="container-fluid">
        <?php
            if (!empty($_GET['idSesion'])) {
                $sesionesController = new SesionesController();
                $sesion = $sesionesController->verSesion($_GET['idSesion']);
            }
            $comunesController = new ComunesController();
            $listaEtapas = $comunesController->getListaEtapas();
            $listaTerapeutas = $comunesController->getListaTerapeutas();
        ?>
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos de la sesión</h5>
            <hr class="lineaTitulo">
        </div>

        <div class="row">
                <div class="row">
                    <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha:</label>
                    <div class="col-sm-9 col-md-6 col-lg-2">
                        <input disabled type="date" class="form-control form-control-sm" id="fecha" value="<?php echo ($sesion['fecha']) ?>">
                    </div>
                    
                    <label for="etapa" class="form-label col-form-label-sm col-sm-2 col-md-12col-lg-1">Etapa</label>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        <select disabled class="form-select form-select-sm" name="etapa">
                            <?php
                                foreach ($listaEtapas as $row) {
                            ?>
                                <option value="<?php echo ($row["id_etapa"]) ?>" <?php if ($sesion['id_etapa'] == $row['id_etapa']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <label for="terapeuta" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-1">Terapeuta</label>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        <select disabled class="form-select form-select-sm" name="terapeuta">
                            <?php
                                foreach ($listaTerapeutas as $row) {
                            ?>
                                <option value="<?php echo ($row["id_usuario"]) ?>" <?php if ($sesion['id_usuario'] == $row['id_usuario']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="objetivo" class="form-label col-form-label-sm">Objetivo:</label>
                <textarea disabled class="form-control form-control-sm" id="objetivo" rows="1"><?php echo ($sesion['objetivo']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label col-form-label-sm">Descripción:</label>
                <textarea disabled class="form-control form-control-sm" id="descripcion" rows="3"><?php echo ($sesion['descripcion']) ?></textarea>
            </div>

            <div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label col-form-label-sm">Barreras: </label>
                    <textarea disabled class="form-control form-control-sm" id="descripcion" rows="3"><?php echo ($sesion['barreras']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label col-form-label-sm">Facilitadores: </label>
                    <textarea disabled class="form-control form-control-sm" id="descripcion" rows="3"><?php echo ($sesion['facilitadores']) ?></textarea>
                </div>
            </div>
        </div>

        <div class="pt-4 pb-2">
            <h5 class="text-muted">Recuerdos</h5>
            <hr class="lineaTitulo">
        </div>

        <section class="droparea">
            <i class="far fa-images"></i>
            <p>Suelta aquí tus archivos .png o .jpg!</p>
            <p><small>Up to 20 images, No max file size.</small></p>
        </section>


        <div>
            <button type="button" class="btn btn-primary btn-sm">Atrás</button>
        </div>
    </div>

</body>

</html>