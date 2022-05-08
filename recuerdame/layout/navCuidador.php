<div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-left" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link letra-primary-color menu" aria-current="page" href="verDatosPaciente.php?idPaciente=<?php echo Session::getIdPaciente() ?>">Paciente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link letra-primary-color menu" href="calendario.php">Calendario</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle letra-primary-color menu" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Historia de Vida</a>
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
            <?php if (Session::getCabeceraEdadPaciente() != null) { ?>
                Edad: <?php echo (Session::getCabeceraEdadPaciente()->format('%y')) ?>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    <?php if (Session::getIdPaciente() == null) { ?>
        $(".menu").addClass("disabled");
    <?php } else { ?>
        $(".menu").removeClass("disabled");
    <?php } ?>
</script>