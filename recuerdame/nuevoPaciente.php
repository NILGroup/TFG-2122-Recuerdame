<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    

    <div class="container-fluid">
        <?php
            if (!empty($_GET['idPaciente'])) {
                $pacientesController = new PacientesController();
                $paciente = $pacientesController->verPaciente($_GET['idPaciente']);
            }  else {
                $pacientesController = new PacientesController();
            }
        ?>

        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos paciente</h5>
            <hr class="lineaTitulo">
        </div>
        
        <form class="row g-3" action="gestor.php?accion=guardarPaciente" method="POST">
                <div class="col-md-3">
                    <label for="nombre" class="form-label">Nombre<span class="asterisco">*</span></label>
                    <input type="text" class="form-control" id="nombre" name= "nombre" required>
                </div>
                <div class="col-md-3">
                    <label for="apellidos" class="form-label">Apellidos<span class="asterisco">*</span></label>
                    <input type="apellidos" class="form-control" id="apellidos" name= "apellidos" required>
                </div>
                <div class="col-md-3">
                    <label for="genero" class="form-label">Género<span class="asterisco">*</span></label>
                    <select id="genero" class="form-select" name = "genero">
                        <option>Hombre</option>
                        <option>Mujer</option>
                        <option>Prefiero no decirlo</option>
                    </select>
                    
                </div>
                <div class="col-4">
                    <label for="lugarNacimiento" class="form-label">Lugar de nacimiento<span class="asterisco">*</span></label>
                    <input type="text" class="form-control" id="lugarNacimiento" name="lugarNac" required>
                </div>
                <div class="col-4">
                    <label for="pais" class="form-label">País<span class="asterisco">*</span></label>
                    <input type="text" class="form-control" id="pais" name = "nacionalidad" required>
                </div>
                <div class="col-md-3">
                    <label for="fecha" class="form-label">Fecha de nacimiento<span class="asterisco">*</span></label>
                    <input type="date" class="form-control" id="fecha" name = "fecha" required>
                </div>
                <div class="col-3">
                    <label for="residencia" class="form-label">Tipo de residencia<span class="asterisco">*</span></label>
                    <input type="text" class="form-control" id="residencia" name = "residencia" required>
                </div>
                <div class="col-3">
                    <label for="casa" class="form-label">Residencia actual<span class="asterisco">*</span></label>
                    <input type="text" class="form-control" id="casa" name = "casa" required>
                </div>
                </div>
                <div class= "col-12">
                 <button type="submit" value="Guardar" class="btn btn-outline-primary btn-sm">Guardar</button>
                 <a href="listadoPacientes.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
                </div>
            </div>

            </div>
         </form>

    </div>
    <?php include "layout/footer.php" ?>
</body>