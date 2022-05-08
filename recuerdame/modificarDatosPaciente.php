<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/PacientesController.php" ?>
    <?php include "controllers/UsuarioController.php" ?>
    <div class="container-fluid">
        <?php
        if ($_GET['idPaciente'] != null) {
            $pacientesController = new PacientesController();
            $paciente = $pacientesController->verPaciente($_GET['idPaciente']);
        } else {
            $pacientesController = new PacientesController();
            $paciente->setFechaNacimiento(date('Y-m-d'));
        }
        ?>

        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos paciente</h5>
            <hr class="lineaTitulo">
        </div>

        <form action="gestor.php?accion=guardarPaciente&idPaciente=<?php echo ($paciente->getIdPaciente()) ?>&idUsuario=<?php echo ($usuario->getIdUsuario()) ?>" method="POST">
            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="nombre" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Nombre<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <input type="text" name="nombre" class="form-control form-control-sm" id="nombre" value="<?php echo ($paciente->getNombre()) ?>">
                    </div>
                </div>

                <div class="row col-sm-12 col-md-6 col-lg-7">
                    <label for="apellidos" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-4">Apellidos<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <input type="apellidos" name="apellidos" class="form-control form-control-sm" id="apellidos" value="<?php echo ($paciente->getApellidos()) ?>">
                    </div>
                </div>
            </div>

            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="genero" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Género<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <select id="genero" name="genero" class="form-select form-select-sm" value="<?php echo ($paciente->getGenero()) ?>">
                            <option>Hombre</option>
                            <option>Mujer</option>
                            <option>Prefiero no decirlo</option>
                        </select>
                    </div>
                </div>

                <div class="row col-sm-12 col-md-6 col-lg-7">
                    <label for="lugarNacimiento" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-4">Lugar de nacimiento<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <input type="text" name="lugarNac" class="form-control form-control-sm" id="lugarNacimiento" placeholder="Ciudad..." value="<?php echo ($paciente->getLugarNacimiento()) ?>">
                    </div>
                </div>
            </div>

            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="fecha" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Fecha de nacimiento<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <input type="date" name="fecha" class="form-control form-control-sm" id="fecha" value="<?php echo ($paciente->getFechaNacimiento()) ?>">
                    </div>
                </div>

                <div class="row col-sm-12 col-md-6 col-lg-7">
                    <label for="pais" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-4">País<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <input type="text" name="nacionalidad" class="form-control form-control-sm" id="pais" placeholder="País..." value="<?php echo ($paciente->getNacionalidad()) ?>">
                    </div>
                </div>
            </div>

            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="residencia" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Tipo de residencia<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <input type="text" name="casa" class="form-control form-control-sm" id="residencia" value="<?php echo ($paciente->getTipoResidencia()) ?>">
                    </div>
                </div>

                <div class="row col-sm-12 col-md-6 col-lg-7">
                    <label for="casa" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-4">Residencia actual<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <input type="text" name="residencia" class="form-control form-control-sm" id="casa" value="<?php echo ($paciente->getResidenciaActual()) ?>">
                    </div>
                </div>
            </div>

            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="terapeuta" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Teapeuta<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <select class="form-select form-select-sm" id="terapeuta" name="terapeuta">
                            <option value="" selected="selected"></option>
                            <?php

                            $usuarioController = new UsuarioController();
                            $terapeutas = $usuarioController->getListaTerapeutas();
                            if ($terapeutas != null) {
                                foreach ($terapeutas as $fila) {

                                    $id = $fila['id_usuario'];
                                    $nombre = $fila['nombre'];
                                    $apellido = $fila['apellidos'];

                            ?>
                                    <option value=" <?php echo $id; ?>"> <?php echo $nombre . " " . $apellido; ?></option>
                            <?php
                                }
                            }
                            ?>

                        </select>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" value="Guardar" class="btn btn-outline-primary btn-sm">Guardar</button>
                <a href="listadoPacientes.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
            </div>
        </form>

    </div>
    <?php include "layout/footer.php" ?>
</body>