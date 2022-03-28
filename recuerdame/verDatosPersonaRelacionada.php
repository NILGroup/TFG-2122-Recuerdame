<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <meta charset="utf-8" />
    <title>Recuerdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/PersonasRelacionadasController.php" ?>
    <?php include "controllers/ComunesController.php" ?>

    <div class="container-fluid">
        <?php
        if (isset($_GET['idPersonaRelacionada']) && !empty($_GET['idPersonaRelacionada'])) {
            $personasRelacionadasController = new PersonasRelacionadasController();
            $personaRelacionada = $personasRelacionadasController->verPersonaRelacionada($_GET['idPersonaRelacionada']);
        }
        // Ventana a la que volver con el botón Atrás
        // Si se indica en la variable from es porque viene de modificar o ver recuerdo
        // Si no viene la variable es porque se utiliza en el listado de personas relacionadas
        /*if (isset($_GET['ventanaAtras']) && !empty($_GET['ventanaAtras'])) {
            $ventanaAtras = $_GET['ventanaAtras'];
        } else {
            $ventanaAtras = 'listadoPersonasRelacionadas.php';    
        }*/
        $comunesController = new ComunesController();
        $listaTiposRelacion = $comunesController->getListaTiposRelacion();
        ?>
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos de la persona relacionada</h5>
            <hr class="lineaTitulo">
        </div>

        <div>
            <div class="row form-group justify-content-between">
                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="nombre" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Nombre</label>
                    <div class="col-sm-9 col-md-10 col-lg-5">
                        <input type="text" disabled class="form-control form-control-sm" id="nombre" name="nombre" value="<?php echo ($personaRelacionada->getNombre()) ?>">
                    </div>
                </div>

                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="estado" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Apellidos</label>
                    <div class="col-sm-9 col-md-6 col-lg-4">
                        <input type="text" disabled class="form-control form-control-sm" id="apellidos" name="apellidos" value="<?php echo ($personaRelacionada->getApellidos()) ?>">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="row form-group justify-content-between">
                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="nombre" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Teléfono</label>
                    <div class="col-sm-9 col-md-10 col-lg-5">
                        <input type="text" disabled class="form-control form-control-sm" id="telefono" name="telefono" value="<?php echo ($personaRelacionada->getTelefono()) ?>">
                    </div>
                </div>

                <div class="row col-sm-6 col-md-6 col-lg-6">
                    <label for="estado" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Ocupación</label>
                    <div class="col-sm-9 col-md-6 col-lg-4">
                        <input type="text" disabled class="form-control form-control-sm" id="ocupacion" name="ocupacion" value="<?php echo ($personaRelacionada->getOcupacion()) ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-sm-6 col-md-6 col-lg-6">
            <label for="nombre" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Email</label>
            <div class="col-sm-9 col-md-10 col-lg-5">
                <input type="text" disabled class="form-control form-control-sm" id="email" name="email" value="<?php echo ($personaRelacionada->getEmail()) ?>">
            </div>
        </div>

        <div class="row col-sm-12 col-md-12 col-lg-12">
            <label for="nombre" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Tipo de relación/parentesco</label>
            <div class="col-sm-3 col-md-3 col-lg-2">
                <select disabled class="form-select form-select-sm" id="idTipoRelacion" name="idTipoRelacion">
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
            <!--<a href="<?php echo($ventanaAtras) ?>"><button type="button" onclick="history.back();" class="btn btn-primary btn-sm">Atrás</button></a>-->
            <a href="<?php echo($ventanaAtras) ?>"><button type="button" onclick="history.back();" class="btn btn-primary btn-sm">Atrás</button></a>
        </div>
    </div>
    <?php include "layout/footer.php" ?>
</body>

</html>