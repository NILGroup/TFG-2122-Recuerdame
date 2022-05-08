<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="public/css/styles.css">
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/historiaVidacontroller.php" ?>
    <?php include "controllers/recuerdosController.php" ?>
    <?php include "controllers/comunesController.php" ?>
    <?php include "modalImagen.php" ?>

    <div class="container-fluid vh-100">
        <?php
        $recuerdosController = new RecuerdosController();
        $comunesController = new ComunesController();

        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $idEtapa = $_POST['idEtapa'];
        $idCategoria = $_POST['idCategoria'];
        $idEtiqueta = $_POST['idEtiqueta'];

        $historiaVidaController = new HistoriaVidaController();
        if (Session::getIdPaciente() != null) {
            $listaRecuerdos = $historiaVidaController->generarLibro(Session::getIdPaciente(), $fechaInicio, $fechaFin, $idEtapa, $idCategoria, $idEtiqueta);
        }
        $etapa = $comunesController->getEtapa($idEtapa);
        $categoria = $comunesController->getCategoria($idCategoria);
        $etiqueta = $comunesController->getEtiqueta($idEtiqueta);
        ?>

        <?php
        if ($listaRecuerdos == null || empty($listaRecuerdos)) {
        ?>
            <div class="carousel-inner container pt-4 pb-4">
                <div class="hv-box p-4">
                    <span class="align-middle text-muted">No se han encontrado recuerdos para esos filtros.</span>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div id="carouselPrincipal" class="carousel carousel-dark slide" data-bs-interval="false" data-bs-ride="carousel">

                <div class="carousel-inner container pt-4 pb-4">
                    <div class="hv-box p-4">

                        <?php
                        $i = 1;
                        $totalRecuerdos = count($listaRecuerdos);
                        foreach ($listaRecuerdos as $recuerdo) {
                        ?>
                            <?php $item_class = ($i == 1) ? 'carousel-item active' : 'carousel-item'; ?>
                            <div class="<?php echo $item_class; ?>">
                                <div class="d-block w-100">
                                    <div>
                                        <h4 class="text-center hv-title"><?php echo $recuerdo['nombre'] ?></h5>
                                            <div class="row hv-des">
                                                <p><?php echo nl2br($recuerdo['descripcion']) ?></p>
                                            </div>

                                            <div class="row">
                                                <h4 class="text-center hv-title">Imágenes</h5>
                                                    <div class="testimonial-group justify-content-center">
                                                        <div class="row text-center flex-nowrap">
                                                            <?php
                                                            $listaMultimedia = $recuerdosController->getListaMultimediaRecuerdo($recuerdo['id_recuerdo']);
                                                            ?>

                                                            <?php
                                                            if ($listaMultimedia == null || empty($listaMultimedia)) {
                                                            ?>
                                                                <span class="align-middle text-muted">Este recuerdo no tiene imágenes.</span>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            foreach ($listaMultimedia as $multimedia) {
                                                            ?>
                                                                <div class="col-sm-5 col-md-4 col-lg-3">
                                                                    <a href="#" class="visualizarImagen"><img src="archivos/<?php echo $multimedia['fichero'] ?>" class="img-responsive card-img-top img-thumbnail" alt="<?php $multimedia['nombre'] ?>" /></a>
                                                                    <div>
                                                                        <h6 class="text-muted"><?php echo $multimedia['nombre'] ?></h6>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
                <button class="carousel-control-prev hv-control" data-bs-target="#carouselPrincipal" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next hv-control" data-bs-target="#carouselPrincipal" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        <?php
        }
        ?>

        <div class="text-center pb-2">
            <span class="text-muted">Fecha: <?php echo (date("d/m/Y", strtotime($fechaInicio))) ?> - <?php echo (date("d/m/Y", strtotime($fechaFin))) ?>
                <?php if (isset($etapa)) { ?>
                    , Etapa: <?php echo ($etapa['nombre']) ?>
                <?php } ?>
                <?php if (isset($categoria)) { ?>
                    , Categoría: <?php echo ($categoria['nombre']) ?>
                <?php } ?>
                <?php if (isset($etiqueta)) { ?>
                    , Etiqueta: <?php echo ($etiqueta['nombre']) ?>
                <?php } ?>
            </span>
        </div>
        <div class="text-center">
            <a href="historiaVida.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
        </div>
    </div>
    <?php include "layout/footer.php" ?>
</body>
<script src="public/js/imagen.js"></script>

</html>