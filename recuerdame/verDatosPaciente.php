<div class="container-fluid row align-items-center h-75">
    <?php
    $paciente = $pacientesController->verPaciente(1);
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
                    <input type="text" disabled class="form-control form-control-sm" id="nombre" value="<?php echo ($paciente->getApelliods()) ?>">
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
        </div>
    </div>
</div>