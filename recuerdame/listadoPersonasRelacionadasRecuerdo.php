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
    <?php include "controllers/PersonasRelacionadasController.php" ?>

    <div class="container-fluid">
        <?php
        $idRecuerdo = null;
        if (isset($_GET['idRecuerdo']) && !empty($_GET['idRecuerdo'])) {
            $idRecuerdo = $_GET['idRecuerdo'];
        }
        ?>
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
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $personasRelacionadasController = new PersonasRelacionadasController();
                    if (isset($idRecuerdo) && $idRecuerdo != null) {
                        $lista = $personasRelacionadasController->getListaPersonasRelacionadasRecuerdo($idRecuerdo);
                    } else {
                        $lista = $personasRelacionadasController->getListaPersonasRelacionadas();
                    }

                    $i = 1;
                    foreach ($lista as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo ($row['nombre']) ?></td>
                            <td><?php echo ($row["apellidos"]) ?></td>
                            <td><?php echo ($row["nombreTipoRelacion"]) ?></td>
                            <td class="tableActions">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" <?php if (isset($row['id_recuerdo']) && $row['id_recuerdo'] != null) echo 'checked="checked" '; ?>>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div>
            <button type="submit" name="guardar" value="Guardar" class="btn btn-outline-primary btn-sm">Guardar</button>
            <?php
                if ($idRecuerdo != null) {
            ?>
                <a href="modificarDatosRecuerdo.php?idRecuerdo=<?php echo($idRecuerdo) ?>"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
            <?php
                } else {
            ?>
                <a href="modificarDatosRecuerdo.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
            <?php
                }
            ?>
        </div>
    </div>
    <?php include "layout/footer.php" ?>
</body>

</html>