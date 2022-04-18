<?php
    session_start();
    if(!isset($_SESSION['idPaciente'])){
        $_SESSION['idPaciente'] = 1;
    }
?>
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
        <form action="gestor.php?accion=guardarPersonaRelacionadaRecuerdo&idRecuerdo=<?php echo ($idRecuerdo) ?>" method="POST">
            <div>
                <table class="table table-bordered recuerdameTable">
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
                            $lista = $personasRelacionadasController->getListaPersonasRelacionadasRecuerdoAnadir($idRecuerdo);
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
                                    <input class="form-check-input" type="checkbox" value="<?php echo ($row['idPersonaRelacionada']) ?>" name="checkPersonaRelacionada[]" id="checkPersonaRelacionada<?php echo ($row['idPersonaRelacionada']) ?>" <?php if (isset($row['id_recuerdo']) && $row['id_recuerdo'] == $idRecuerdo) echo 'checked="checked" '; ?>>
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
                    <a href="modificarDatosRecuerdo.php?idRecuerdo=<?php echo ($idRecuerdo) ?>"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
                <?php
                } else {
                ?>
                    <a href="modificarDatosRecuerdo.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
                <?php
                }
                ?>
            </div>
        </form>
    </div>
    <?php include "layout/footer.php" ?>
</body>

</html>