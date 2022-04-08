<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <script src="public/datatable/datatables.min.js"></script>
    <link rel="stylesheet" href="public/datatable/datatables.min.css">
    <script src="public/js/table.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <meta charset="utf-8" />
    <title>Recuerdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/SesionesController.php" ?>

    <div class="container-fluid">
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Listado de sesiones</h5>
            <hr class="lineaTitulo">
        </div>

        <div class="row mb-2">
            <div class="col-12 justify-content-end d-flex">
                <a href="modificarDatosRecuerdo.php"><button type="button" class="btn btn-success btn-sm">+</button></a>
            </div>
        </div>

        <div>
            <table class="table table-bordered recuerdameTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Objetivo</th>
                        <th scope="col">Finalizada/No finalizada</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sesionesController = new SesionesController();
                    $lista = $sesionesController->getListaSesiones();
                    $i = 1;
                    foreach ($lista as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><a href="verDatosSesion.php?idSesion=<?php echo ($row['idSesion']) ?>"><?php echo (date("d/m/Y", strtotime($row["fecha"]))) ?></a></td>
                            <td><?php echo ($row["objetivo"]) ?></td>
                            <td><?php if ($row['fecha_finalizada'] != null) echo '<i class="fa-solid fa-check text-success tableIcon"></i>'; ?></td>
                            <td class="tableActions">
                                <a href="verDatosSesion.php?idSesion=<?php echo ($row['idSesion']) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                <a href="modificarDatosSesion.php?idSesion=<?php echo ($row['idSesion']) ?>"><i class="fa-solid fa-pencil text-primary tableIcon"></i></a>
                                <a href="gestor.php?accion=eliminarSesion&idSesion=<?php echo ($row['idSesion']) ?>"><i class="fa-solid fa-trash-can text-danger tableIcon"></i></a>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include "layout/footer.php" ?>
</body>

</html>