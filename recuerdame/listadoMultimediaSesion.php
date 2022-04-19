<?php
session_start();
if (!isset($_SESSION['idPaciente'])) {
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
    <?php include "controllers/MultimediaController.php" ?>

    <div class="container-fluid">
        <?php
        $idSesion = null;
        if (isset($_GET['idSesion']) && !empty($_GET['idSesion'])) {
            $idSesion = $_GET['idSesion'];
        }
        ?>
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Listado de archivos multimedia</h5>
            <hr class="lineaTitulo">
        </div>
        <form action="gestor.php?accion=guardarMultimediaSesion&idSesion=<?php echo ($idSesion) ?>" method="POST">
            <div>
                <table class="table table-bordered recuerdameTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fichero</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $multimediaController = new MultimediaController();
                        $lista = array();
                        if (isset($idSesion) && $idSesion != null) {
                            $lista = $multimediaController->getListaMultimediaSesionAnadir($idSesion);
                        }

                        $i = 1;
                        foreach ($lista as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i ?></th>
                                <td><?php echo ($row['nombre']) ?></td>
                                <td><?php echo ($row["fichero"]) ?></td>
                                <td class="tableActions">
                                    <input class="form-check-input" type="checkbox" value="<?php echo ($row['idMultimedia']) ?>" name="checkMultimedia[]" id="checkMultimedia<?php echo ($row['idMultimedia']) ?>" <?php if (isset($row['id_sesion']) && $row['id_sesion'] != null) echo 'checked="checked" '; ?>>
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
                if ($idSesion != null) {
                ?>
                    <a href="modificarDatosSesion.php?idSesion=<?php echo ($idSesion) ?>"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
                <?php
                } else {
                ?>
                    <a href="modificarDatosSesion.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
                <?php
                }
                ?>
            </div>
        </form>
    </div>
    <?php include "layout/footer.php" ?>
</body>

</html>