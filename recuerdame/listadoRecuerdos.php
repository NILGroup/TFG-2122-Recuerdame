<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Recuerdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/RecuerdosController.php" ?>

    <div class="container-fluid">
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Listado de recuerdos</h5>
            <hr class="lineaTitulo">
        </div>

        <div class="row p-2">
            <div class="col-12 justify-content-end d-flex">
                <div>
                    <input type="text" class="form-control form-control-sm" placeholder="Buscar..." aria-label="Buscar" aria-describedby="basic-addon1">
                </div>
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
                <a href="modificarDatosRecuerdo.php"><button type="button" class="btn btn-success btn-sm">+</button></a>
            </div>
        </div>

        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Etapa</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Etiqueta</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $recuerdosController = new RecuerdosController();
                    $lista = $recuerdosController->getListaRecuerdos();
                    $i = 1;
                    foreach ($lista as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><a href="verDatosRecuerdo.php?idRecuerdo=<?php echo ($row['idRecuerdo']) ?>"><?php echo ($row['nombre']) ?></a></td>
                            <td><?php echo (date("d/m/Y", strtotime($row["fecha"]))) ?></td>
                            <td><?php echo ($row["nombreEtapa"]) ?></td>
                            <td><?php echo ($row["nombreCategoria"]) ?></td>
                            <td><?php echo ($row["nombreEstado"]) ?></td>
                            <td><?php echo ($row["nombreEtiqueta"]) ?></td>
                            <td class="tableActions">
                                <a href="verDatosRecuerdo.php?idRecuerdo=<?php echo ($row['idRecuerdo']) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                <a href="modificarDatosRecuerdo.php?idRecuerdo=<?php echo ($row['idRecuerdo']) ?>"><i class="fa-solid fa-pencil text-primary tableIcon"></i></a>
                                <a href="gestor.php?accion=eliminarRecuerdo&idRecuerdo=<?php echo ($row['idRecuerdo']) ?>"><i class="fa-solid fa-trash-can text-danger tableIcon"></i></a>
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