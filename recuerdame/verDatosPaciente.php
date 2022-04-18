<?php
    
 
    session_start();
    
    $_SESSION['idPaciente'] = $_GET['idPaciente'];

?>
<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuerdame</title>
</head>
<body class="d-flex flex-column min-vh-100">
    
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <div class="container-fluid row align-items-center h-75">
        <?php
        $paciente = $pacientesController->verPaciente($_GET['idPaciente']);
        ?>

        <div class="card p-4 h-75">
            <div class="row justify-content-center p-3">
                <?php
                if ($paciente->getGenero() == 'H') {
                ?>
                    <img src="public/img/avatar_hombre.png" alt="Avatar" class="avatar img-thumbnail">
                <?php
                } else if ($paciente->getGenero() == 'M') {
                ?>
                    <img src="public/img/avatar_mujer.png" alt="Avatar" class="avatar img-thumbnail">
                <?php
                }
                ?>
            </div>
            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="nombre" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Nombre</label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <input type="text" disabled class="form-control form-control-sm" id="nombre" value="<?php echo ($paciente->getNombre()) ?>">
                    </div>
                </div>

                <div class="row col-sm-12 col-md-6 col-lg-7">
                    <label for="estado" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-4">Apellidos</label>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <input type="text" disabled class="form-control form-control-sm" id="nombre" value="<?php echo ($paciente->getApellidos()) ?>">
                    </div>
                </div>
            </div>

            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="nombre" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Género</label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <input type="text" disabled class="form-control form-control-sm" id="nombre" value="<?php echo ($paciente->getGenero() == 'H' ? 'Hombre' : 'Mujer') ?>">
                    </div>
                </div>

                <div class="row col-sm-12 col-md-6 col-lg-7">
                    <label for="estado" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-4">Lujar de nacimiento</label>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <input type="text" disabled class="form-control form-control-sm" id="nombre" value="<?php echo ($paciente->getLugarNacimiento()) ?>">
                    </div>
                </div>
            </div>

            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="nombre" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Fecha de nacimiento</label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <input type="text" disabled class="form-control form-control-sm" id="nombre" value="<?php echo (date("d/m/Y", strtotime($paciente->getFechaNacimiento()))) ?>">
                    </div>
                </div>

                <div class="row col-sm-12 col-md-6 col-lg-7">
                    <label for="estado" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-4">Nacionalidad</label>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <input type="text" disabled class="form-control form-control-sm" id="nombre" value="<?php echo ($paciente->getNacionalidad()) ?>">
                    </div>
                </div>
            </div>

            <div class="row form-group justify-content-between">
                <div class="row col-sm-12 col-md-6 col-lg-5">
                    <label for="estado" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-6">Tipo de residencia</label>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <input type="text" disabled class="form-control form-control-sm" id="nombre" value="<?php echo ($paciente->getTipoResidencia()) ?>">
                    </div>
                </div>
                <div class="row col-sm-12 col-md-6 col-lg-7">
                    <label for="nombre" class="form-label col-form-label-sm col-sm-12 col-md-12 col-lg-4">Residencia actual</label>
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <input type="text" disabled class="form-control form-control-sm" id="nombre" value="<?php echo ($paciente->getResidenciaActual()) ?>">
                    </div>
                </div>

                <a href="listadoPacientes.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
            </div>
        </div>
    </div>

</body>
<?php include "layout/footer.php" ?>