<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
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
    <?php include "controllers/RecuerdosController.php" ?>

    <div class="container-fluid">
        <?php
        if (!empty($_GET['idRecuerdo'])) {
            $recuerdosController = new RecuerdosController();
            $recuerdo = $recuerdosController->verRecuerdo($_GET['idRecuerdo']);
        }
        ?>
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos del recuerdo</h5>
            <hr class="lineaTitulo">
        </div>

        <div>
            <div class="row form-group justify-content-between">
                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="nombre" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Nombre</label>
                    <div class="col-sm-9 col-md-10 col-lg-5">
                        <input type="text" class="form-control form-control-sm" id="nombre" value="<?php echo ($recuerdo['nombre']) ?>">
                    </div>
                </div>

                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="estado" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Estado</label>
                    <div class="col-sm-9 col-md-6 col-lg-4">
                        <select class="form-select form-select-sm" name="estado">
                            <option selected value="0">Conservado</option>
                            <option value="1">En riesgo de perder</option>
                            <option value="2">Perdido</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha</label>
                    <div class="col-sm-9 col-md-6 col-lg-4">
                        <input type="date" class="form-control form-control-sm" id="fecha" value="<?php echo ($recuerdo['fecha']) ?>">
                    </div>
                </div>
                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="etiqueta" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Etiqueta</label>
                    <div class="col-sm-9 col-md-6 col-lg-4">
                        <select class="form-select form-select-sm" name="etiqueta">
                            <option selected value="0">Positivo</option>
                            <option value="1">Neutro</option>
                            <option value="2">Negativo</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="row col-sm-12 col-md-12 col-lg-12">
                    <label for="puntuacion" class="form-label col-form-label-sm col-sm-2 col-md-2 col-lg-1">Puntuación</label>
                    <div class="col-sm-5 col-md-5 col-lg-2">
                        <input type="range" class="form-range" id="puntuacion" min="0" max="5" step="0.5">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label col-form-label-sm">Descripción</label>
                <textarea class="form-control form-control-sm" id="descripcion" rows="3"><?php echo ($recuerdo['descripcion']) ?></textarea>
            </div>

            <div class="row justify-content-between">
                <div class="row">
                    <label for="etapa" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Etapa de la vida</label>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        <select class="form-select form-select-sm" name="etapa">
                            <option selected value="0">Infancia</option>
                            <option value="1">Adolescencia</option>
                            <option value="2">Adultez</option>
                            <option value="3">Vejez</option>
                        </select>
                    </div>

                    <label for="emocion" class="form-label col-form-label-sm col-sm-2 col-md-12col-lg-1">Emoción</label>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        <select class="form-select form-select-sm" name="emocion">
                            <option selected value="0">Alegría</option>
                            <option value="1">Nostalgia</option>
                            <option value="2">Ira</option>
                        </select>
                    </div>

                    <label for="categoria" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-1">Categoría</label>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        <select class="form-select form-select-sm" name="categoria">
                            <option selected value="0">Familia</option>
                            <option value="1">Trabajo</option>
                            <option value="2">Hobbies</option>
                            <option value="3">Amistad</option>
                            <option value="4">Mascotas</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="localizacion" class="form-label col-form-label-sm">Localización</label>
                <textarea class="form-control form-control-sm" id="localizacion" rows="3"><?php echo ($recuerdo['localizacion']) ?></textarea>
            </div>

        </div>

        <div>
            <button type="button" class="btn btn-outline-primary btn-sm">Guardar</button>
            <button type="button" class="btn btn-primary btn-sm">Atrás</button>
        </div>
    </div>

</body>

</html>