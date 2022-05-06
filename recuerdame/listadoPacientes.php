<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <script src="public/datatable/datatables.min.js"></script>
   
    <link rel="stylesheet" href="public/datatable/datatables.min.css">
    <script src="public/js/table.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/PacientesController.php" ?>
    <div class="contenedor">
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Listado de pacientes</h5>
            <hr class="lineaTitulo">
        </div>

        <div class="row mb-2">
            <div class="col-12 justify-content-end d-flex">
                <button type="button" id="mybutton" class="btn btn-info btn-sm btn-icon"><i class="fa-solid fa-plus"></i></button></a>
                <a href="nuevoPaciente.php"><button type="button" class="btn btn-success btn-sm btn-icon"><i class="fa-solid fa-plus"></i></button></a>
            </div>
        </div>

        <div>
            <table class="table table-bordered recuerdameTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Género</th>
                        <th scope="col">Edad</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $load = 1;
                    if(isset($_GET['mensajeError']) && $load != 0 && !isset($cargar)) {
                        $error = $_GET['mensajeError'];
                            echo '<script> alert("NO SE AGREGO CORRECTAMENTE EL CUIDADOR");</script>';
                        $load = 0;
                        $cargar = 1;
                    }
                    $error = 0;
                    $pacientesController = new PacientesController();
                    $idUsuario = $usuario->getIdUsuario();
                    $pacientes = $pacientesController->getListaPacientes($idUsuario);
                    $i = 1;
                    if($pacientes != null){ //Si los resultados devueltos son mayor a 0
                        foreach ($pacientes as $row) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><a href="gestor.php?cambiarPaciente&idPaciente=<?php echo ($row['id_paciente']) ?>"> <?php echo ($row['nombre']) ?></a></td>
                            <td><?php echo ($row['apellidos']) ?></td>
                            <td><?php 
                                if($row["genero"] == 'H') echo 'Hombre';
                                else if($row["genero"] == 'M') echo 'Mujer'; 
                                else echo '-----------';
                            ?></td>
                            <td><?php 
                                $fecha_nacimiento = new DateTime ($row['fecha_nacimiento']);
                                $hoy = new DateTime();
                                $edad = $hoy->diff($fecha_nacimiento);
                                echo $edad->y ?></td>
                            <td class="tableActions">
                                <a href="verDatosPaciente.php?idPaciente=<?php echo ($row['id_paciente']) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                <a href="modificarDatosPaciente.php?idPaciente=<?php echo ($row['id_paciente']) ?>"><i class="fa-solid fa-pencil text-primary tableIcon"></i></a>
                                <a href="gestor.php?accion=eliminarPaciente&idPaciente=<?php echo ($row['id_paciente']) ?>"><i class="fa-solid fa-trash-can text-danger tableIcon"></i></a>
            
                            </td>
                        </tr>
                        <?php 
                            $i++;
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="titulo">Nuevo cuidador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form id="formulario" action="gestorRegistroUsuario.php?rol=CUIDADOR" method="POST">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                               <input type="text" class="form-control" id="title" name="name" required>
                                <label for="name" class="form-label">Nombre</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="title" name="apellidos" required>
                                <label for="apellidos" class="form-label">Apellidos</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="title" name="nick" required>
                                <label for="nick" class="form-label">Nombre Usuario</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select  class="form-control" id="paciente" name="paciente" required>
                                <option value="" selected="selected"><b>--Escoja el paciente--</b></option>
                                <?php
                                    
                                    $pacientesCuidador = $pacientesController->getListaPacientesSinCuidador($idUsuario);
                                     if($pacientesCuidador != null){
                                        foreach ($pacientesCuidador as $fila) {
                                           
                                            $id = $fila['id_paciente'];
                                            $nombre = $fila['nombre'];
                                            $apellido = $fila['apellidos'];

                                        ?>
                                       <option value=" <?php echo $id;?>"> <?php echo $nombre." ". $apellido; ?></option>
                                       <?php
                                       }
                                    }
                                        ?>
                                
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="title" name="mail" required>
                                <label for="mail" class="form-label">Correo</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="start" name="password" required>
                                <label for="password" class="form-label">Contraseña</label>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" id="btnAccion" name="btnAccion" value="Registrar" class="btn btn-outline-primary btn-sm">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script src="public/js/cuidador.js"></script>
    <?php include "layout/footer.php" ?>
</body>

</html>