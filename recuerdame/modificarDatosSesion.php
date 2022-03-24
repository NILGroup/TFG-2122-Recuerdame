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

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/SesionesController.php" ?>
    <?php include "controllers/ComunesController.php" ?>
    <?php include "controllers/RecuerdosController.php" ?>

    <div class="container-fluid">
        <?php
            if (!empty($_GET['idSesion'])) {
                $sesionesController = new SesionesController();
                $sesion = $sesionesController->verSesion($_GET['idSesion']);
            } else {
                $sesion = new Sesion();
                $sesion->setFecha(date('Y-m-d'));
            }
            $comunesController = new ComunesController();
            $listaEtapas = $comunesController->getListaEtapas();
            $listaTerapeutas = $comunesController->getListaTerapeutas();

        ?>
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos de la sesión</h5>
            <hr class="lineaTitulo">
        </div>

        <form action="gestor.php?idSesion=<?php echo ($sesion->getIdSesion()) ?>" method="POST">
        <div class="row">
                <div class="row">
                    <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha:</label>
                    <div class="col-sm-9 col-md-6 col-lg-2">
                        <input type="date" class="form-control form-control-sm" id="fecha" name="fecha" value="<?php echo ($sesion->getFecha()) ?>">
                    </div>
                    
                    <label for="etapa" class="form-label col-form-label-sm col-sm-2 col-md-12col-lg-1">Etapa:</label>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                            <select class="form-select form-select-sm" id="idEtapa" name="idEtapa">
                                <?php
                                foreach ($listaEtapas as $row) {
                                ?>
                                    <option value="<?php echo ($row["id_etapa"]) ?>" <?php if ($sesion->getIdEtapa() == $row['id_etapa']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                                <?php
                                }
                                ?>
                            </select>  
                    </div>

                    <label for="terapeuta" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-1">Terapeuta:</label>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        <select disabled class="form-select form-select-sm" name="terapeuta">
                            <?php
                                foreach ($listaTerapeutas as $row) {
                            ?>
                                <option value="<?php echo ($row["id_usuario"]) ?>" <?php if ($sesion->getIdPaciente() == $row['id_usuario']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="objetivo" class="form-label col-form-label-sm">Objetivo:</label>
                <textarea maxlength="255" class="form-control form-control-sm" id="objetivo" name="objetivo" rows="3"><?php echo ($sesion->getObjetivo()) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label col-form-label-sm">Descripción:</label>
                <textarea maxlength="255" class="form-control form-control-sm" id="descripcion" name="descripcion" rows="3"><?php echo ($sesion->getDescripcion()) ?></textarea>
            </div>

            <div>
                <div class="mb-3">
                    <label for="barreras" class="form-label col-form-label-sm">Barreras:</label>
                    <textarea maxlength="255" class="form-control form-control-sm" id="barreras" name="barreras" rows="3"><?php echo ($sesion->getBarreras()) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="facilitadores" class="form-label col-form-label-sm">Facilitadores:</label>
                    <textarea maxlength="255" class="form-control form-control-sm" id="facilitadores" name="facilitadores" rows="3"><?php echo ($sesion->getFacilitadores()) ?></textarea>
                </div>
            </div>
        </div>

            <div class="pt-4 pb-2">
                <h5 class="text-muted">Recuerdos</h5>
                <hr class="lineaTitulo">
            </div>

            <div class="row">
                <div class="col-12 justify-content-end d-flex"> 
                        <a href="modificarDatosRecuerdo.php"><button type="button" class="btn btn-outline-dark">+</button>
                        <a href="modificarDatosRecuerdo.php"><button type="button" class="btn btn-outline-dark">Añadir existente</button>
                    </a>   
                </div>
            </div>

            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Etapa</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Etiqueta</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $recuerdosController = new RecuerdosController();
                        $listaRecuerdosSesion = $recuerdosController->getListaRecuerdosSesion($sesion->getIdSesion());
                        $i = 1;
                        foreach ($listaRecuerdosSesion as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i ?></th>
                                <td><?php echo ($row['nombre']) ?></a></td>
                                <td><?php echo (date("d/m/Y", strtotime($row["fecha"]))) ?></td>
                                <td><?php echo ($row["nombreEtapa"]) ?></td>
                                <td><?php echo ($row["nombreCategoria"]) ?></td>
                                <td><?php echo ($row["nombreEstado"]) ?></td>
                                <td><?php echo ($row["nombreEtiqueta"]) ?></td>
                                <td class="tableActions">
                                    <a href="verDatosRecuerdo.php?idRecuerdo=<?php echo ($row['idRecuerdo']) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="pt-4 pb-2">
                <h5 class="text-muted">Material</h5>
                <hr class="lineaTitulo">
            </div>

            <div class="row">
                <div class="col-12 justify-content-end d-flex">
                        <a href=""><i class="fa-solid fa-cloud-arrow-up"></i>
                        <a href=""><button type="button" class="btn btn-outline-dark">Añadir existente</button>
                    </a>   
                </div>
            </div>

            <section class="droparea">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <p><small>Arrastrar y soltar</small></p>
            </section>
           
        <div>
            <button type="button" class="btn btn-primary btn-sm">Atrás</button>
        </div>
    </div>
    <?php include "layout/footer.php" ?>
</body>

</html>