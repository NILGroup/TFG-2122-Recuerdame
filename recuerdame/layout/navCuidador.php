
<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuerdame</title>
</head>

<body>
    <?php include "controllers/PacientesController.php" ?>
    <?php
    $pacientesController = new PacientesController();
    $paciente = $pacientesController->verPaciente($_SESSION['idPaciente']);
    $cumpleanos = new DateTime($paciente->getFechaNacimiento());
    $hoy = new DateTime();
    $edad = $hoy->diff($cumpleanos);

    $genero = '';
    if ($paciente->getGenero() == 'H') $genero = 'Hombre';
    else if ($paciente->getGenero() == 'M') $genero = 'Mujer';
    ?>
    <nav class="navbar navbar-expand-lg justify-content-left nav-menu">
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
                            <li><a class="dropdown-item" href="historiaVida.php">Generar Historia de Vida</a></li>
                            <li><a class="dropdown-item" href="listadoRecuerdos.php">Recuerdos</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="row align-items-center pe-4">
                <div class="col-12">
                    <?php
                    if ($paciente->getGenero() == 'H') {
                    ?>
                    <img src="public/img/avatar_hombre.png" alt="Avatar" class="avatar-mini">
                    <?php
                    } else if ($paciente->getGenero() == 'M') {
                    ?>
                    <img src="public/img/avatar_mujer.png" alt="Avatar" class="avatar-mini">
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row align-items-center pe-4">
                <div class="col-12">
                    <?php echo ($paciente->getNombre()) . " " . ($paciente->getApellidos()) ?>
                </div>
            </div>
            <div class="row align-items-center pe-4">
                <div class="col-12">
                    <?php echo ($genero) ?>
                </div>
            </div>
            <div class="row align-items-center pe-4">
                <div class="col-12">
                    Edad: <?php echo ($edad->format('%y')) ?>
                </div>
            </div>
    </nav>
</body>

</html>