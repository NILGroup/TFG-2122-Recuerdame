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
    <?php include "controllers/ComunesController.php" ?>

    <div class="container-fluid">
        <?php
            if (isset($_GET['idRecuerdo'])) {
                $recuerdosController = new RecuerdosController();
                $recuerdo = $recuerdosController->verRecuerdo($_GET['idRecuerdo']);
            }
            $comunesController = new ComunesController();
            $listaEstados = $comunesController->getListaEstados();
            $listaEtiquetas = $comunesController->getListaEtiquetas();
            $listaEtapas = $comunesController->getListaEtapas();
            $listaEmociones = $comunesController->getListaEmociones();
            $listaCategorias = $comunesController->getListaCategorias();
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
                            <?php
                                foreach ($listaEstados as $row) {
                            ?>
                                <option value="<?php echo ($row["id_estado"]) ?>" <?php if ($recuerdo['id_estado'] == $row['id_estado']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                            <?php
                                }
                            ?>
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
                            <?php
                                foreach ($listaEtiquetas as $row) {
                            ?>
                                <option value="<?php echo ($row["id_etiqueta"]) ?>" <?php if ($recuerdo['id_etiqueta'] == $row['id_etiqueta']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                            <?php
                                }
                            ?>
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
                            <?php
                                foreach ($listaEtapas as $row) {
                            ?>
                                <option value="<?php echo ($row["id_etapa"]) ?>" <?php if ($recuerdo['id_etapa'] == $row['id_etapa']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <label for="emocion" class="form-label col-form-label-sm col-sm-2 col-md-12col-lg-1">Emoción</label>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        <select class="form-select form-select-sm" name="emocion">
                            <?php
                                foreach ($listaEmociones as $row) {
                            ?>
                                <option value="<?php echo ($row["id_emocion"]) ?>" <?php if ($recuerdo['id_emocion'] == $row['id_emocion']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <label for="categoria" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-1">Categoría</label>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        <select class="form-select form-select-sm" name="categoria">
                            <?php
                                foreach ($listaCategorias as $row) {
                            ?>
                                <option value="<?php echo ($row["id_categoria"]) ?>" <?php if ($recuerdo['id_categoria'] == $row['id_categoria']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                            <?php
                                }
                            ?>
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
            <a href="listadoRecuerdos.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
        </div>
    </div>

</body>

</html>