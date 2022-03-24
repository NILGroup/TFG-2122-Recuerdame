<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuerdame</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg justify-content-left nav-menu">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-left" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link letra-primary-color active" aria-current="page" href="listadoSesiones.php">Sesiones</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle letra-primary-color" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Evaluaciones</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="listadoInformesSesion.php">Informes de las sesiones</a></li>
                            <li><a class="dropdown-item" href="listadoInformesSeguimiento.php">Informes de seguimiento</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle letra-primary-color" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Historias de Vida</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="historiaVida.php">Generar Historia de Vida</a></li>
                            <li><a class="dropdown-item" href="listadoRecuerdos.php">Recuerdos</a></li>
                            <li><a class="dropdown-item" href="personasRelacionadas.php">Personas relacionadas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link letra-primary-color" href="calendario.php">Calendario</a>
                    </li>
                </ul>
            </div>
    </nav>
</body>

</html>