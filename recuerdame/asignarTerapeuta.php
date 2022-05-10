<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/PacientesController.php" ?>
    <?php include "controllers/UsuarioController.php" ?>

    <div class="container-fluid">
        <?php
        if (Session::getIdPaciente() != null) {
            $pacientesController = new PacientesController();
            $paciente = $pacientesController->verPaciente(Session::getIdPaciente());
        } else {
            $pacientesController = new PacientesController();
        }
        ?>

        <div class="pt-4 pb-2">
            <h5 class="text-muted">Asignar paciente a otros terapeutas</h5>
            <hr class="lineaTitulo">
        </div>
        <form action="gestorTerapeutas.php?idPaciente=<?php echo $_GET['idPaciente']?>" method="POST">

                                 <div>
                                    <table class="table table-bordered recuerdameTable">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellidos</th>
                                                
                                        </thead>
                                        <tbody>
                                        <?php
                                            $idUsuario = $usuario->getIdUsuario();
                                            $usuarioController = new UsuarioController();
                                            $terapeutas = $usuarioController->getListaTerapeutas($idUsuario);
                                            
                                            
                                            if($terapeutas != null){ //Si los resultados devueltos son mayor a 0
                                                $i = 1;
                                                foreach ($terapeutas as $row) {
                                                    $id = $row['id_usuario'];
                                                    $nombre = $row['nombre'];
                                                    $apellido = $row['apellidos'];
                                                ?>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="form-check">
                                                                <input class="form-check-input" <?php if($pacientesController->comprobarTerapeuta($id,$_GET['idPaciente'])==1){
                                                                    ?> checked 
                                                                    <?php
                                                                }
                                                                
                                                                ?>
                                                                 type="checkbox" value="<?php echo $id;?>" name="<?php echo $i ?>" />
                                                                 <?php
                                                                    $j = ($i*-1)
                                                                ?>
                                                                    <input type="hidden" value="<?php echo $id;?>" name= "<?php echo $j ?>" />
                                                                <?php
                                                                
                                                                ?>
                                                        </div>
                                                    </th>
                                                    <td>
                                                        <?php echo $nombre ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $apellido ?>
                                                    </td>

                                                </tr>
                                                <?php 
                                                    $i++;
                                                }
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="numT" value ="<?php echo $i;?>" />
                        </div>
            <div class="col-12">
                <input type="submit" value="Guardar" class="btn btn-outline-primary btn-sm">
                <a href="listadoPacientes.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
            </div>
        </form>
    </div>
    <?php include "layout/footer.php" ?>
</body>