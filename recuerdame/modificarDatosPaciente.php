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
    <?php include "controllers/PacientesController.php" ?>

    <div class="container-fluid">
        <?php
            if ($_GET['idPaciente'] != null) {
                $pacientesController = new PacientesController();
                $paciente = $pacientesController->verPaciente($_GET['idPaciente']);
            }  else {
                $pacientesController = new PacientesController();
                $paciente->setFechaNacimiento(date('Y-m-d'));

            }
        ?>

        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos paciente</h5>
            <hr class="lineaTitulo">
        </div>
        
        <form class="row g-3" action="gestor.php?accion=guardarPaciente&idPaciente=<?php echo ($row['id_paciente']) ?>" method="POST">
                <div class="col-md-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" value="<?php echo ($paciente->getNombre()) ?>">
                </div>
                <div class="col-md-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="apellidos" class="form-control" id="apellidos" value="<?php echo ($paciente->getApellidos()) ?>">
                </div>
                <div class="col-md-3">
                    <label for="genero" class="form-label">Género</label>
                    <select id="genero" class="form-select" value="<?php echo ($paciente->getGenero()) ?>">
                        <option>Hombre</option>
                        <option>Mujer</option>
                        <option>Prefiero no decirlo</option>
                    </select>
                    
                </div>
                <div class="col-4">
                    <label for="lugarNacimiento" class="form-label">Lugar de nacimiento</label>
                    <input type="text" class="form-control" id="lugarNacimiento" placeholder="Ciudad..."  value="<?php echo ($paciente->getLugarNacimiento()) ?>">
                </div>
                <div class="col-4">
                    <label for="pais" class="form-label">País</label>
                    <input type="text" class="form-control" id="pais" placeholder="País..."  value="<?php echo ($paciente->getNacionalidad()) ?>">
                </div>
                <div class="col-md-3">
                    <label for="fecha" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha"  value="<?php echo ($paciente->getFechaNacimiento()) ?>">
                </div>
                <div class="col-3">
                    <label for="residencia" class="form-label">Tipo de residencia</label>
                    <input type="text" class="form-control" id="residencia" value="<?php echo ($paciente->getTipoResidencia()) ?>">
                </div>
                <div class="col-3">
                    <label for="casa" class="form-label">Residencia actual</label>
                    <input type="text" class="form-control" id="casa"  value="<?php echo ($paciente->getResidenciaActual()) ?>">
                </div>
                </div>
                <div class= "col-12">
                 <button type="submit" name="guardarInformeSesion" value="Guardar" class="btn btn-outline-primary btn-sm">Guardar</button>
                 <a href="listadoPacientes.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
                </div>
            </div>

            </div>
         </form>

    </div>
    <?php include "layout/footer.php" ?>
</body>