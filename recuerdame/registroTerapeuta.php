<html>

<head>
  <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
  <link rel="stylesheet" href="public/css/registro.css">
  <link rel="stylesheet" href="public/css/styles.css">
  <link href="public/fontawesome6/css/all.css" rel="stylesheet">
  <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
  <script src="public/jquery/jquery-3.6.0.min.js"></script>
  <script src="public/datatable/datatables.min.js"></script>
  <link rel="stylesheet" href="public/datatable/datatables.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <form action="gestorRegistroUsuario.php?rol=TERAPEUTA" method="POST" class="mx-1 mx-md-4">
    <div class="card form-registro">
      <div class="d-flex justify-content-center">
        <img src="public/img/Marca_recuerdame.png" class="card-img-top logo">
      </div>
      <h5 class="text-center text-muted">Registro terapeuta</h5>
      <?php if (isset($_GET['mensajeError'])) { ?>
        <p style="color:red;" ;>El usuario o correo ya existe, pruebe otro</p>
      <?php
      }
      ?>
      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
        <input type="text" id="apellidos" class="form-control form-control-sm" name="name" placeholder="Nombre" required>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
        <input type="text" id="apellidos" class="form-control form-control-sm" name="apellidos" placeholder="Apellidos" required>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
        <input type="text" id="nick" class="form-control form-control-sm" name="nick" placeholder="Nombre de usuario" required>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
        <input type="email" id="email" class="form-control form-control-sm" name="mail" placeholder="Correo electrónico" required>
      </div>

      <div class="d-flex flex-row align-items-center mb-4">
        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
        <input type="password" id="password" class="form-control form-control-sm" name="password" placeholder="Contraseña" required />
      </div>

      <div class="d-flex justify-content-center">
        <button type="submit" id="registrarNuevo" class="btn btn-primary btn-sm">Registrar</button>
      </div>
    </div>
  </form>
</body>
<html>