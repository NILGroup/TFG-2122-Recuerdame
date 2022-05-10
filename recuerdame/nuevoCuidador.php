<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/PacientesController.php" ?>
    <?php include "controllers/UsuarioController.php" ?>

    <div class="container-fluid">
        <?php
        if (Session::getIdPaciente() != null) {
            $pacientesController = new PacientesController();
            $paciente = $pacientesController->verPaciente(Session::getIdPaciente());
        } else {
            $pacientesController = new PacientesController();
        }
        ?>

        <div class="pt-4 pb-2">
            <h5 class="text-muted">Registro cuidador</h5>
            <hr class="lineaTitulo">
        </div>

        <form action="gestorRegistroUsuario.php?rol=CUIDADOR" method="POST">
            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="nombre" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Nombre<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <input type="text" class="form-control form-control-sm" id="nombre" name="name" required>
                    </div>
                </div>

                <div class="row col-sm-12 col-md-6 col-lg-7">
                    <label for="apellidos" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-4">Apellidos<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <input type="apellidos" class="form-control form-control-sm" id="apellidos" name="apellidos" required>
                    </div>
                </div>
            </div>
            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="nick" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Nombre de usuario<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <input type="text" class="form-control form-control-sm" id="nick" name="nick" required>
                    </div>
                </div>
            </div>
            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="fecha" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Correo<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <input type="mail" class="form-control form-control-sm" id="mail" name="mail" required>
                    </div>
                </div>

                <div class="row col-sm-12 col-md-6 col-lg-7">
                    <label for="pais" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-4">Contraseña<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                    </div>
                </div>
            </div>

            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="terapeuta" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Paciente<span class="asterisco">*</span></label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <select class="form-select form-select-sm" id="paciente" name="paciente" required>
                            <option value="" selected="selected"></option>
                            <?php
                                    
                                    $pacientesCuidador = $pacientesController->getListaPacientesSinCuidador($usuario->getIdUsuario());
                                     if($pacientesCuidador != null){
                                        foreach ($pacientesCuidador as $fila) {
                                           
                                            $id = $fila['id_paciente'];
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