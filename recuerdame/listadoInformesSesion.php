<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuerdame</title>
</head>

<body>
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "layout/footer.php" ?>
    <?php include "controllers/InformeSesionController.php" ?>

    <div class="contenedor">
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Listado de informes de sesión</h5>
            <hr class="lineaTitulo">
        </div>

        <div >
            <table class="table table-bordered">
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
                    $informes = $informeController->getListaInformeSesion();
                    $i = 1;
                    if($informes != null){ //Si los resultados devueltos son mayor a 0
                        foreach ($informes as $row) {
                        ?>                                              
                            <tr>
                                <th scope="row"><?php echo $i ?></th>
                                <td><a href="verDatosInformeSesion.php?idInforme=<?php echo ($row['idInforme']) ?>"><?php echo "Informe de la sesión nº {$row["idInforme"]}" ?></td>
                                <td><?php echo (date("d/m/Y", strtotime($row["fecha_finalizada"]))) ?></td>
                                <td class="tableActions">
                                <a href="verDatosInformeSesion.php?idInforme=<?php echo ($row['idInforme']) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                <a href=""><i class="fa-solid fa-pencil text-primary tableIcon"></i></a>
                                <a href=""><i class="fa-solid fa-trash-can text-danger tableIcon"></i></a>
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
</body>

</html>