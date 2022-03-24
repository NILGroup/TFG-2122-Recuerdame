<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Recuerdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/InformeSeguimientoController.php" ?>

    <div class="contenedor">
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Listado de informes de seguimiento</h5>
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
                <a href="modificarDatosInformeSeguimiento.php"><button type="button" class="btn btn-success btn-sm">+</button></a>
            </div>
        </div>

        <div >
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Informe</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Diagn�stico</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $informeController = new InformeSeguimientoController();
                    $informes = $informeController->getListaInformeSeguimiento();
                    $i = 1;
                    if($informes != null){ //Si los resultados devueltos son mayor a 0
                        foreach ($informes as $row) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><a href="verDatosInformeSeguimiento.php?idInforme=<?php echo ($row['idInforme']) ?>"><?php echo utf8_encode ("Informe n� {$row["idInforme"]}") ?></td>
                            <td><?php echo (date("d/m/Y", strtotime($row["fecha"]))) ?></td>
                            <td><?php echo ($row["diagnostico"]) ?></td>
                            <td class="tableActions">
                                <a href="verDatosInformeSeguimiento.php?idInforme=<?php echo ($row['idInforme']) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                <a href="modificarDatosInformeSeguimiento.php?idInforme=<?php echo ($row['idInforme']) ?>"><i class="fa-solid fa-pencil text-primary tableIcon"></i></a>
                                <a href="gestor.php?accion=eliminarInformeSeguimiento&idInforme=<?php echo ($row['idInforme']) ?>"><i class="fa-solid fa-trash-can text-danger tableIcon"></i></a>
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
    <?php include "layout/footer.php" ?>
</body>

</html>