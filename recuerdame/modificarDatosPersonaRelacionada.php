<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <meta charset="utf-8" />
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/PersonasRelacionadasController.php" ?>
    <?php include "controllers/ComunesController.php" ?>


    <div class="container-fluid">
        <?php
        if (!empty($_GET['idPersonaRelacionada'])) {
            $personasRelacionadasController = new PersonasRelacionadasController();
            $personaRelacionada = $personasRelacionadasController->verPersonaRelacionada($_GET['idPersonaRelacionada']);
        } else {
            $personaRelacionada = new PersonaRelacionada();
        }

        $idPersonaRelacionada = $personaRelacionada->getIdPersonaRelacionada();

        $idRecuerdo = null;
        if (isset($_GET['idRecuerdo'])) {
            $idRecuerdo = $_GET['idRecuerdo'];
        }

        $action = "gestor.php?idPersonaRelacionada=" . $idPersonaRelacionada;
        if (isset($_GET['idRecuerdo'])) {
            $action = "gestor.php?idPersonaRelacionada=" . $idPersonaRelacionada . "&idRecuerdo=" . $_GET['idRecuerdo'];
        }

        $ventanaDesde = null;
        if (isset($_GET['ventanaDesde'])) {
            $ventanaDesde = $_GET['ventanaDesde'] . "?idRecuerdo=" . $_GET['idRecuerdo'];
            $action = $action . "&ventanaDesde=" . $ventanaDesde;
        }

        $comunesController = new ComunesController();
        $listaTiposRelacion = $comunesController->getListaTiposRelacion();
        
        ?>
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos de la persona relacionada</h5>
            <hr class="lineaTitulo">
        </div>

        <form action="<?php echo ($action) ?>" method="POST">
            <div>
                <div>
                    <div class="row form-group justify-content-between">
                        <div class="row col-sm-6 col-md-6 col-lg-6">
                            <label for="nombre" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Nombre<span class="asterisco">*</span></label>
                            <div class="col-sm-9 col-md-10 col-lg-5">
                                <input required maxlength="50" type="text" class="form-control form-control-sm" id="nombre" name="nombre" value="<?php echo ($personaRelacionada->getNombre()) ?>">
                            </div>
                        </div>

                        <div class="row col-sm-6 col-md-6 col-lg-6">
                            <label for="estado" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Apellidos<span class="asterisco">*</span></label>
                            <div class="col-sm-9 col-md-6 col-lg-4">
                                <input required maxlength="100" type="text" class="form-control form-control-sm" id="apellidos" name="apellidos" value="<?php echo ($personaRelacionada->getApellidos()) ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row form-group justify-content-between">
                        <div class="row col-sm-6 col-md-6 col-lg-6">
                            <label for="nombre" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Teléfono</label>
                            <div class="col-sm-9 col-md-10 col-lg-5">
                                <input type="text" maxlength="20" class="form-control form-control-sm" id="telefono" name="telefono" value="<?php echo ($personaRelacionada->getTelefono()) ?>">
                            </div>
                        </div>

                        <div class="row col-sm-6 col-md-6 col-lg-6">
                            <label for="estado" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Ocupación<span class="asterisco">*</span></label>
                            <div class="col-sm-9 col-md-6 col-lg-4">
                                <input required maxlength="50" type="text" class="form-control form-control-sm" id="ocupacion" name="ocupacion" value="<?php echo ($personaRelacionada->getOcupacion()) ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="nombre" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Email<span class="asterisco">*</span></label>
                    <div class="col-sm-9 col-md-10 col-lg-5">
                        <input required maxlength="50" type="text" class="form-control form-control-sm" id="email" name="email" value="<?php echo ($personaRelacionada->getEmail()) ?>">
                    </div>
                </div>

                <div class="row col-sm-12 col-md-12 col-lg-12">
                    <label required for="nombre" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Tipo de relación/parentesco<span class="asterisco">*</span></label>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        <select class="form-select form-select-sm" id="idTipoRelacion" name="idTipoRelacion">
                            <?php
                            foreach ($listaTiposRelacion as $row) {
                            ?>
                                <option value="<?php echo ($row["id_tipo_relacion"]) ?>" <?php if ($personaRelacionada->getIdTipoRelacion() == $row['id_tipo_relacion']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div>
                    <button type="submit" name="guardarPersonaRelacionada" value="Guardar" class="btn btn-outline-primary btn-sm">Guardar</button>
                    <?php
                    if ($ventanaDesde != null) {
                    ?>
                        <a href="<?php echo ($ventanaDesde) ?>"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
                    <?php
                    } else if ($idRecuerdo != null) {
                    ?>
                        <a href="modificarDatosRecuerdo.php?idRecuerdo=<?php echo ($idRecuerdo) ?>"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
                    <?php
                    } else {
                    ?>
                        <a href="listadoPersonasRelacionadas.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
    <?php include "layout/footer.php" ?>

</body>

</html>