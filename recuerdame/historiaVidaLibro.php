<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/carrousel.css">
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
        <div class="container2">
            <?php
            $recuerdosController = new RecuerdosController();
            $historiaVidaController = new HistoriaVidaController();
            $listaRecuerdos = $historiaVidaController->generarLibro();
            ?>
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-interval="false" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $i = 1;
                    foreach ($listaRecuerdos as $recuerdo) {
                    ?>
                        <?php $item_class = ($i == 1) ? 'carousel-item active' : 'carousel-item'; ?>
                        <div class="<?php echo $item_class; ?>" style="height: 70%;">
                            <div class="row p-5" style="height: 100%;">
                                <div class="row col-lg-8 p-4">
                                    <div class="container">
                                        <div class="cards">
                                            <?php
                                            $listaMultimedia = $recuerdosController->getListaMultimediaRecuerdo($recuerdo['id_recuerdo']);
                                            if (!empty(array_filter($listaMultimedia))) {
                                                $i = 1;
                                                foreach ($listaMultimedia as $multimedia) {
                                                    if (!empty($multimedia['fichero'])) {
                                            ?>
                                                        <label class="card" id="song-<?php echo $i ?>">
                                                            <img class="image-card" width="50%" height="50%" src="archivos/<?php echo $multimedia['fichero'] ?>">
                                                        </label>
                                            <?php
                                                        $i++;
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-lg-4">
                                    <h5 class="text-muted"><?php echo $recuerdo['nombre'] ?></h5>
                                    <p><?php echo $recuerdo['descripcion'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                        $i++;
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" style="width: 5%;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" style="width: 5%;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div>
                <a href="historiaVida.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
            </div>
        </div>
    </div>

</body>

</html>