<html>

<head>
  <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
  <link rel="stylesheet" href="public/css/styles.css">
  <link href="public/fontawesome6/css/all.css" rel="stylesheet">
  <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
  <title>Recuerdame</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light header">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img class="logotipoMarca" src="public/img/Marca_recuerdame.png" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="listadoPacientes.php"><i class="fa-solid fa-users"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-solid fa-envelope"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><i class="fa-solid fa-right-from-bracket"></i></a>
          </li>
        </ul>
        <div class="row align-items-center">
          <div class="col-12">
            <?php
            require('models/UsuarioLogin.php');
            $usuario = unserialize($_SESSION['usuario'])
            ?>
            <div data-letters="<?php echo (isset($usuario) ? $usuario->getIniciales() : '') ?>"></div>
          </div>
        </div>
      </div>
  </nav>
</body>

</html>