<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Recuerdame</title>
</head>

<body>
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "layout/footer.php" ?>
    <?php include "controllers/InformeSeguimientoController.php" ?>

    <div class="contenedor">
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Listado de informes de seguimiento</h5>
            <hr class="lineaTitulo">
        </div>

        <div >
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Diagn�stico</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $informeController = new InformeSeguimientoController();
                    $informes = $informeController->getListaInformeSeguimiento();
                    if($informes != null){ //Si los resultados devueltos son mayor a 0
                        foreach ($informes as $row) {
                        ?>
                            <th scope="row"><?php echo ($row["idInforme"]) ?></th>
                            <td><?php echo (date("d/m/Y", strtotime($row["fecha"]))) ?></td>
                            <td><?php echo ($row["diagnostico"]) ?></td>
                            <td class="tableActions">
                                <a href=""><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                <a href=""><i class="fa-solid fa-pencil text-primary tableIcon"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can text-danger tableIcon"></i></a>
                            </td>
                        <?php      
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>