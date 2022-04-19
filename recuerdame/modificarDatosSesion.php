<?php
session_start();
if (!isset($_SESSION['idPaciente'])) {
    $_SESSION['idPaciente'] = 1;
}
?>
<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="public/dropzone/dropzone.min.css">
    <title>Recuerdame</title>
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
        if (!empty($_GET['idSesion'])) {
            $sesionesController = new SesionesController();
            $sesion = $sesionesController->verSesion($_GET['idSesion']);
        } else {
            $sesion = new Sesion();
            $sesion->setIdUsuario(1);
            $sesion->setFecha(date('Y-m-d'));
        }

        $idSesion = null;
        $desdeModificar = null;
        if ($sesion->getIdSesion() != null) {
            $idSesion = $sesion->getIdSesion();
            $desdeModificar = "modificarDatosSesion.php?idSesion=" . $idSesion;
        }

        $comunesController = new ComunesController();
        $listaEtapas = $comunesController->getListaEtapas();
        $listaTerapeutas = $comunesController->getListaTerapeutas();

        ?>
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos de la sesión</h5>
            <hr class="lineaTitulo">
        </div>

        <form action="gestor.php?idSesion=<?php echo ($sesion->getIdSesion()) ?>&idUsuario=<?php echo ($sesion->getIdUsuario()) ?>" method="POST">
            <input hidden id="idSesion" value="<?php echo $idSesion ?>">
            <div class="row">
                <div class="row">
                    <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha<span class="asterisco">*</span></label>
                    <div class="col-sm-9 col-md-6 col-lg-2">
                        <input type="date" class="form-control form-control-sm" id="fecha" name="fecha" value="<?php echo ($sesion->getFecha()) ?>">
                    </div>

                    <label for="etapa" class="form-label col-form-label-sm col-sm-2 col-md-12col-lg-1">Etapa<span class="asterisco">*</span></label>
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
                        <label for="terapeuta" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-1"><?php echo ($sesion->getNombreUsuario()) ?></label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="objetivo" class="form-label col-form-label-sm">Objetivo<span class="asterisco">*</span></label>
                <textarea required maxlength="255" class="form-control form-control-sm" id="objetivo" name="objetivo" rows="3"><?php echo ($sesion->getObjetivo()) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label col-form-label-sm">Descripción</label>
                <textarea maxlength="255" class="form-control form-control-sm" id="descripcion" name="descripcion" rows="3"><?php echo ($sesion->getDescripcion()) ?></textarea>
            </div>

            <div>
                <div class="mb-3">
                    <label for="barreras" class="form-label col-form-label-sm">Barreras</label>
                    <textarea maxlength="255" class="form-control form-control-sm" id="barreras" name="barreras" rows="3"><?php echo ($sesion->getBarreras()) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="facilitadores" class="form-label col-form-label-sm">Facilitadores</label>
                    <textarea maxlength="255" class="form-control form-control-sm" id="facilitadores" name="facilitadores" rows="3"><?php echo ($sesion->getFacilitadores()) ?></textarea>
                </div>
            </div>

            <div class="pt-4 pb-2">
                <h5 class="text-muted">Recuerdos</h5>
                <hr class="lineaTitulo">
            </div>

            <div class="row">
                <div class="col-12 justify-content-end d-flex p-2">
                    <?php
                    if ($sesion != null && $sesion->getIdSesion() != null) {
                    ?>
                        <a aria-disabled="true" href="modificarDatosRecuerdo.php?ventanaDesde=modificarDatosSesion.php&idSesion=<?php echo ($sesion->getIdSesion()) ?>" class="pe-2"><button type="button" class="btn btn-success btn-sm btn-icon" <?php if ($sesion->getIdSesion() == null) echo 'disabled'; ?>><i class="fa-solid fa-plus"></i></button></a>
                        <a href="listadoRecuerdosRelacionadosSesion.php?idSesion=<?php echo ($sesion->getIdSesion()) ?>" class="pe-2" <?php if ($sesion->getIdSesion() == null) echo 'disabled '; ?>><button type="button" class="btn btn-success btn-sm">Añadir existente</button></a>
                    <?php } else { ?>
                        <a aria-disabled="true" href="modificarDatosRecuerdo.php?ventanaDesde=modificarDatosSesion.php?" class="pe-2"><button type="button" class="btn btn-success btn-sm btn-icon" <?php if ($sesion->getIdSesion() == null) echo 'disabled'; ?>><i class="fa-solid fa-plus"></i></button></a>
                        <a href="listadoRecuerdosRelacionadosSesion.php" class="pe-2"><button type="button" class="btn btn-success btn-sm" <?php if ($sesion->getIdSesion() == null) echo 'disabled '; ?>>Añadir existente</button></a>
                    <?php } ?>
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
                                    <a href="verDatosRecuerdo.php?idRecuerdo=<?php echo ($row['idRecuerdo']) ?>&ventanaDesde=<?php echo ($desdeModificar) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                    <a href="modificarDatosRecuerdo.php?idRecuerdo=<?php echo ($row['idRecuerdo']) ?>&ventanaDesde=<?php echo ($desdeModificar) ?>"><i class="fa-solid fa-pencil text-primary tableIcon"></i></a>
                                    <a href="gestor.php?accion=eliminarRecuerdoSesion&idRecuerdo=<?php echo ($row['idRecuerdo']) ?>&idSesion=<?php echo ($idSesion) ?>"><i class="fa-solid fa-trash-can text-danger tableIcon"></i></a>
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
                <div class="col-12 justify-content-end d-flex p-2">
                    <?php
                    if ($sesion != null && $sesion->getIdSesion() != null) {
                    ?>
                        <a href="listadoMultimediaSesion.php?idSesion=<?php echo ($sesion->getIdSesion()) ?>" class="pe-2" <?php if ($sesion->getIdSesion() == null) echo 'disabled '; ?>><button type="button" class="btn btn-success btn-sm">Añadir existente</button></a>
                    <?php } ?>
                </div>
            </div>

            <div class="dropzone dropzone-previews dropzone-custom" id="mydropzone">
                <div class="dz-message text-muted" data-dz-message>
                    <span>Click aquí o arrastrar y soltar</span>
                </div>
            </div>

            <div id="showMultimedia" class="row pb-2">
                <?php
                $listaMultimedia = array();
                if ($sesion != null && $sesion->getIdSesion() != null) {
                    $listaMultimedia = $sesionesController->getListaMultimediaSesion($idSesion);
                }
                foreach ($listaMultimedia as $multimedia) {
                ?>
                    <div class="col-sm-4 p-2">
                        <div class="img-wrap">
                            <a href="gestor.php?eliminarMultimediaSesion&idSesion=<?php echo $idSesion ?>&idMultimedia=<?php echo $multimedia['id_multimedia'] ?>" class="clear"><i class="fa-solid fa-circle-xmark text-danger fa-lg"></i></a>
                            <a href="#" class="visualizarImagen"><img src="archivos/<?php echo $multimedia['fichero'] ?>" class="img-responsive-sm card-img-top img-thumbnail multimedia-icon"></a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <div>
                <button type="submit" name="guardarSesion" value="Guardar" class="btn btn-outline-primary btn-sm">Guardar</button>
                <a href="listadoSesiones.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
            </div>
        </form>
    </div>
    <?php include "layout/footer.php" ?>
</body>
<script src="public/dropzone/dropzone.min.js"></script>
<script src="public/js/sesion.js"></script>
</html>