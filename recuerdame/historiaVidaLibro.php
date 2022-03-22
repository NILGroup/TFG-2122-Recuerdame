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

<body>
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "layout/footer.php" ?>
    <?php include "controllers/historiaVidacontroller.php" ?>
    <?php include "controllers/recuerdosController.php" ?>

    <div class="container-fluid container">
        <?php
        $recuerdosController = new RecuerdosController();
        $historiaVidaController = new HistoriaVidaController();
        $listaRecuerdos = $historiaVidaController->generarLibro();
        ?>

        <div id="carouselPrincipal" class="carousel slide carousel-dark" data-bs-interval="false" data-bs-ride="carousel">
            <div class="d-flex justify-content-between pt-2">
                <button class="carousel-control-prev position-relative" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next position-relative" type="button" data-bs-target="#carouselPrincipal" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="carousel-inner">
                <?php
                $i = 1;
                foreach ($listaRecuerdos as $recuerdo) {
                ?>
                    <?php $item_class = ($i == 1) ? 'carousel-item active' : 'carousel-item'; ?>
                    <div class="<?php echo $item_class; ?>">
                        <!--<div class="card">-->
                        <div class="row p-2">
                            <div class="text-center">
                                <h5 class="text-muted"><?php echo $recuerdo['nombre'] ?></h5>
                            </div>
                            <div>
                                <p><?php echo $recuerdo['descripcion'] ?></p>
                            </div>
                        </div>

                        <div class="testimonial-group">
                            <div class="row text-center flex-nowrap">
                                <?php
                                $listaMultimedia = $recuerdosController->getListaMultimediaRecuerdo($recuerdo['id_recuerdo']);
                                foreach ($listaMultimedia as $multimedia) {
                                ?>
                                    <div class="col-sm-4">
                                        <img src="archivos/<?php echo $multimedia['fichero'] ?>" class="img-responsive card-img-top img-thumbnail" alt="<?php $multimedia['nombre'] ?>" />
                                        <div>
                                            <h5><?php echo $multimedia['nombre'] ?></h5>
                                            <p class="card-text">
                                            </p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!--</div>-->
                    </div>
                <?php
                    $i++;
                }
                ?>
            </div>
        </div>

</body>

</html>