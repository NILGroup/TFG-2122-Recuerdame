<form>

<input type="radio" name="fancy" autofocus value="clubs" id="clubs" />
<input type="radio" name="fancy" value="hearts" id="hearts" />
<input type="radio" name="fancy" value="spades" id="spades" />
<input type="radio" name="fancy" value="diamonds" id="diamonds" />			
<label for="clubs">&#9827; Clubs</label><label for="hearts">&#9829; Hearts</label><label for="spades">&#9824; Spades</label><label for="diamonds">&#9830; Diamonds</label>

<div class="keys">Use left and right keys to navigate</div>
</form>





<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/carrousel.css">
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script src="public/js/carrousel.js"></script>
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

    <div class="container-fluid">
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

            <div class="carousel-inner p-5">
                <?php
                $j = 1;
                foreach ($listaRecuerdos as $recuerdo) {
                    echo "<script>console.log('Debug Objects: " . $recuerdo['nombre'] . "' );</script>";
                ?>
                    <?php $item_class = ($j == 1) ? 'carousel-item active' : 'carousel-item'; ?>
                    <div class="<?php echo $item_class; ?>">
                        <div class="card">
                            <div class="row p-2">
                                <div class="text-center">
                                    <h5 class="text-muted"><?php echo $recuerdo['nombre'] ?></h5>
                                </div>
                                <div>
                                    <p><?php echo $recuerdo['descripcion'] ?></p>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Carousel wrapper -->
                                <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-bs-interval="false" data-bs-ride="carousel">
                                    <!-- Controls -->
                                    <div class="d-flex justify-content-center pt-2">
                                        <button class="carousel-control-prev position-relative" type="button" data-bs-target="#carouselMultiItemExample" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next position-relative" type="button" data-bs-target="#carouselMultiItemExample" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <!-- Inner -->
                                    <div class="carousel-inner p-2">
                                        <!-- Single item -->
                                        <?php
                                        $listaMultimedia = $recuerdosController->getListaMultimediaRecuerdo($recuerdo['id_recuerdo']);
                                        $i = 1;
                                        $contador = 1;
                                        foreach ($listaMultimedia as $multimedia) {
                                        ?>
                                            <?php
                                            if ($i == 1) {
                                            ?>
                                                <?php $item_class = ($contador == 1) ? 'carousel-item active' : 'carousel-item'; ?>
                                                <div class="<?php echo $item_class; ?>">
                                                    <div class="container">
                                                        <div class="row">
                                                        <?php
                                                    }
                                                        ?>
                                                        <div class="col-lg-4">
                                                            <div class="card">
                                                                <img src="archivos/<?php echo $multimedia['fichero'] ?>" class="img-responsive card-img-top img-thumbnail" alt="<?php $multimedia['nombre'] ?>" />
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?php echo $multimedia['nombre'] ?></h5>
                                                                    <p class="card-text">
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($i == 3) {
                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                            $i = 0;
                                                            $contador++;
                                                        }
                                            ?>

                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- Inner -->
                            </div>
                            <!-- Carousel wrapper -->

                        </div>
                    </div>
                <?php
                    $j++;
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>



.images-container {
    /*height:150px;*/
    /*width:400px;*/
    height: 100%;
    text-align:center;
    white-space: nowrap;
    overflow-y:hidden;
}
.div_to_hold_images {
    width:auto;
    margin:2px;
    height:250px;
    display: inline-block;
    overflow:hidden;
    margin-left:8px;
}
