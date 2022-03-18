<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Recuerdame</title>
</head>

<body>
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "layout/footer.php" ?>
    <?php include "controllers/PersonasRelacionadasController.php" ?>

    <div class="container-fluid">
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Listado de personas relacionadas</h5>
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
                <a href="modificarDatosPersonaRelacionada.php"><button type="button" class="btn btn-success btn-sm">+</button></a>
            </div>
        </div>

        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Tipo de relación/parentesco</th>
                        <th scope="col">Enviar correo electrónico</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $personasRelacionadasController = new PersonasRelacionadasController();
                    $lista = $personasRelacionadasController->getListaPersonasRelacionadas();
                    $i = 1;
                    foreach ($lista as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><a href="verDatosPersonaRelacionada.php?idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada']) ?>"><?php echo ($row['nombre']) ?></a></td>
                            <td><?php echo ($row["apellidos"]) ?></td>
                            <td><?php echo ($row["nombreTipoRelacion"]) ?></td>
                            <td><i class="fa-solid fa-envelope text-black tableIcon"></i></td>
                            <td class="tableActions">
                                <a href="verDatosPersonaRelacionada.php?idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada']) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                <a href="modificarDatosPersonaRelacionada.php?idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada']) ?>"><i class="fa-solid fa-pencil text-primary tableIcon"></i></a>
                                <a href="gestor.php?accion=eliminarPersonaRelacionada&idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada']) ?>"><i class="fa-solid fa-trash-can text-danger tableIcon"></i></a>
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

</body>

</html>