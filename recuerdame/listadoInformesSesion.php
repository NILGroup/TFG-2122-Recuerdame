<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script src="public/jquery/jquery-3.6.0.min.js"></script>
    <script src="public/datatable/datatables.min.js"></script>
    <link rel="stylesheet" href="public/datatable/datatables.min.css">
    <script src="public/js/table.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <title>Recuérdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/InformeSesionController.php" ?>

    <div class="contenedor">
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Listado de informes de sesión</h5>
            <hr class="lineaTitulo">
        </div>

        <div>
            <table class="table table-bordered recuerdameTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Informe</th>
                        <th scope="col">Fecha del informe</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $informeController = new InformeSesionController();
                    $informes = array();
                    if (Session::getIdPaciente() != null) {
                        $informes = $informeController->getListaInformeSesion(Session::getIdPaciente());
                    }
                    $i = 1;
                    foreach ($informes as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><a href="verDatosInformeSesion.php?idInforme=<?php echo ($row['idInforme']) ?>"><?php echo "Informe de la sesión Nº {$row["idInforme"]}" ?></td>
                            <td><?php echo (date("d/m/Y", strtotime($row["fecha_finalizada"]))) ?></td>
                            <td class="tableActions">
                                <a href="verDatosInformeSesion.php?idInforme=<?php echo ($row['idInforme']) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                <a href="modificarDatosInformeSesion.php?idInforme=<?php echo ($row['idInforme']) ?>"><i class="fa-solid fa-pencil text-primary tableIcon"></i></a>
                                <a href="gestor.php?accion=eliminarInformeSesion&idInforme=<?php echo ($row['idInforme']) ?>"><i class="fa-solid fa-trash-can text-danger tableIcon"></i></a>
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