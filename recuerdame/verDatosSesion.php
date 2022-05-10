<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="public/dropzone/dropzone.min.css">
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/SesionesController.php" ?>
    <?php include "controllers/ComunesController.php" ?>
    <?php include "controllers/RecuerdosController.php" ?>
    <?php include "modalImagen.php" ?>

    <div class="container-fluid">
        <?php
        if (!empty($_GET['idSesion']) && !empty($_GET['idSesion'])) {
            $idSesion = $_GET['idSesion'];
            $sesionesController = new SesionesController();
            $sesion = $sesionesController->verSesion($idSesion);
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
        <input hidden id="idSesion" value="<?php echo $idSesion ?>">
            <div class="row">
                <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha</label>
                <div class="col-sm-9 col-md-6 col-lg-2">
                    <input disabled type="date" class="form-control form-control-sm" id="fecha" value="<?php echo ($sesion->getFecha()) ?>">
                </div>

                <label for="etapa" class="form-label col-form-label-sm col-sm-2 col-md-12col-lg-1">Etapa</label>
                <div class="col-sm-3 col-md-3 col-lg-2">
                    <select disabled class="form-select form-select-sm" name="etapa">
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
                    <label for="terapeuta" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-12"><?php echo ($sesion->getNombreUsuario()) ?></label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="objetivo" class="form-label col-form-label-sm">Objetivo</label>
            <textarea disabled class="form-control form-control-sm" id="objetivo" name="objetivo" rows="3"><?php echo ($sesion->getObjetivo()) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label col-form-label-sm">Descripción</label>
            <textarea disabled class="form-control form-control-sm" id="descripcion" name="descripcion" rows="3"><?php echo ($sesion->getDescripcion()) ?></textarea>
        </div>

        <div>
            <div class="mb-3">
                <label for="barreras" class="form-label col-form-label-sm">Barreras</label>
                <textarea disabled class="form-control form-control-sm" id="barreras" name="barreras" rows="3"><?php echo ($sesion->getBarreras()) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="facilitadores" class="form-label col-form-label-sm">Facilitadores</label>
                <textarea disabled class="form-control form-control-sm" id="facilitadores" name="facilitadores" rows="3"><?php echo ($sesion->getFacilitadores()) ?></textarea>
            </div>
        </div>

        <div class="row">
            <div class="pt-4 pb-2">
                <h5 class="text-muted">Recuerdos</h5>
                <hr class="lineaTitulo">
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
                                <td><a href="verDatosRecuerdo.php?idRecuerdo=<?php echo ($row['idRecuerdo']) ?>&idSesion=<?php echo ($idSesion) ?>"><?php echo ($row['nombre']) ?></a></td>
                                <td><?php echo (date("d/m/Y", strtotime($row["fecha"]))) ?></td>
                                <td><?php echo ($row["nombreEtapa"]) ?></td>
                                <td><?php echo ($row["nombreCategoria"]) ?></td>
                                <td><?php echo ($row["nombreEstado"]) ?></td>
                                <td><?php echo ($row["nombreEtiqueta"]) ?></td>
                                <td class="tableActions">
                                    <a href="verDatosRecuerdo.php?idRecuerdo=<?php echo ($row['idRecuerdo']) ?>&idSesion=<?php echo ($idSesion) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pt-4 pb-2">
            <h5 class="text-muted">Material</h5>
            <hr class="lineaTitulo">
        </div>

        <div class="row pb-2">
            <?php
            $listaMultimedia = array();
            if ($sesion != null && $sesion->getIdSesion() != null) {
                $listaMultimedia = $sesionesController->getListaMultimediaSesion($idSesion);
            }
            foreach ($listaMultimedia as $multimedia) {
            ?>

                <div class="col-sm-4">
                    <a href="#" class="visualizarImagen"><img src="archivos/<?php echo $multimedia['fichero'] ?>" class="img-responsive-sm card-img-top img-thumbnail multimedia-icon"></a>
                </div>

            <?php
            }
            ?>
        </div>

        <div>
            <a href="listadoSesiones.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
        </div>
    </div>
    <?php include "layout/footer.php" ?>

</body>
<script src="public/dropzone/dropzone.min.js"></script>
<script src="public/js/sesion.js"></script>
</html>