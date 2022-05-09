<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/ComunesController.php" ?>
    <?php include "controllers/RecuerdosController.php" ?>

    <div class="container-fluid">
        <?php
        $recuerdosController = new RecuerdosController();
        $fecha = $recuerdosController->getFechaRecuerdo(Session::getIdPaciente());

        if ($fecha == null) {
            $fecha = date('Y-m-d');
        }

        $comunesController = new ComunesController();
        $listaEtapas = $comunesController->getListaEtapas();
        $listaCategorias = $comunesController->getListaCategorias();
        $listaEtiquetas = $comunesController->getListaEtiquetas();
        ?>
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Generar Historia de Vida</h5>
            <hr class="lineaTitulo">
        </div>

        <form action="historiaVidaLibro.php" method="POST">
            <div class="row p-2">
                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha de inicio</label>
                    <div class="col-sm-9 col-md-6 col-lg-4">
                        <input type="date" class="form-control form-control-sm" id="fechaInicio" name="fechaInicio" value="<?php echo ($fecha) ?>">
                    </div>
                </div>

                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha de fin</label>
                    <div class="col-sm-9 col-md-6 col-lg-4">
                        <input type="date" class="form-control form-control-sm" id="fechaFin" name="fechaFin" value="<?php echo (date('Y-m-d')) ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <label for="etapa" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Etapa de la vida</label>
                <div class="col-sm-3 col-md-3 col-lg-2">
                    <select class="form-select form-select-sm" id="idEtapa" name="idEtapa">
                        <option></option>
                        <?php
                        foreach ($listaEtapas as $row) {
                        ?>
                            <option value="<?php echo ($row["id_etapa"]) ?>"><?php echo ($row["nombre"]) ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <label for="etapa" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Categoría</label>
                <div class="col-sm-3 col-md-3 col-lg-2">
                    <select class="form-select form-select-sm" id="idCategoria" name="idCategoria">
                        <option></option>
                        <?php
                        foreach ($listaCategorias as $row) {
                        ?>
                            <option value="<?php echo ($row["id_categoria"]) ?>"><?php echo ($row["nombre"]) ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <label for="etapa" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Etiqueta</label>
                <div class="col-sm-3 col-md-3 col-lg-2">
                    <select class="form-select form-select-sm" id="idEtiqueta" name="idEtiqueta">
                        <option></option>
                        <?php
                        foreach ($listaEtiquetas as $row) {
                        ?>
                            <option value="<?php echo ($row["id_etiqueta"]) ?>"><?php echo ($row["nombre"]) ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div>
                <button type="submit" name="generarLibro" value="Generar libro" class="btn btn-outline-primary btn-sm">Generar libro</button>
                <button type="submit" name="generarPdf" formaction="generarPDFHistoriaVida.php" value="Generar PDF" class="btn btn-outline-primary btn-sm">Generar PDF</button>
            </div>
        </form>
    </div>
    <?php include "layout/footer.php" ?>
</body>

</html>