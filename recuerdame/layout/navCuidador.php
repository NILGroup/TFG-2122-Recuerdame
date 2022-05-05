<?php if (Session::getIdPaciente() != null) { ?>
<div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-left" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link letra-primary-color active" aria-current="page" href="verDatosPaciente.php">Paciente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link letra-primary-color" href="calendario.php">Calendario</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle letra-primary-color" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Historia de Vida</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="historiaVida.php">Ver Historia de Vida</a></li>
                    <li><a class="dropdown-item" href="listadoRecuerdos.php">Ver recuerdos</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="row align-items-center pe-4">
        <div class="col-12">
            <?php
            if (Session::getCabeceraGeneroCodePaciente() == 'H') {
            ?>
                <img src="public/img/avatar_hombre.png" alt="Avatar" class="avatar-mini">
            <?php
            } else if (Session::getCabeceraGeneroCodePaciente() == 'M') {
            ?>
                <img src="public/img/avatar_mujer.png" alt="Avatar" class="avatar-mini">
            <?php
            }
            ?>
        </div>
    </div>
    <div class="row align-items-center pe-4">
        <div class="col-12">
            <?php echo (Session::getCabeceraNombrePaciente()) ?>
        </div>
    </div>
    <div class="row align-items-center pe-4">
        <div class="col-12">
            <?php echo (Session::getCabeceraGeneroPaciente()) ?>
        </div>
    </div>
    <div class="row align-items-center pe-4">
        <div class="col-12">
            Edad: <?php echo (Session::getCabeceraEdadPaciente() != null ? Session::getCabeceraEdadPaciente()->format('%y') : '') ?>
        </div>
    </div>
</div>
<?php } ?>