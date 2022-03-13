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
    <?php include "models/InformeSesion.php" ?>

    <div class="contenedor">
        <div>
            <h4>Listado de informes de las sesiones realizadas</h4>
        </div>

        <div >
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Nº Sesión</th>
                        <th scope="col">Reacción</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $informe_class = new InformeSesion();
                    $informes = $informe_class->imprimeListaInformes();
                    if($informes != null){ //Si los resultados devueltos son mayor a 0
                        foreach ($informes as $informe) {
                            $html = '
                                    <html>
                                        <head>
                                            <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
                                            <link rel="stylesheet" href="public/css/styles.css">
                                            <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
                                            <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
                                            <title>Recuerdame</title>
                                        </head>
                                        <body>                                       
                                            <tr>
                                                <th scope="row">'.$informe[0].'</th>
                                                <td>'.$informe[1].'</td>
                                                <td>'.$informe[2].'</td>
                                                <td>'.$informe[3].'</td>
                                                <td class="tableActions">
                                                    <i class="fa-solid fa-eye tableIcon"></i>
                                                    <i class="fa-solid fa-pencil text-primary tableIcon"></i>
                                                    <i class="fa-solid fa-trash-can text-danger tableIcon"></i>
                                                </td>
                                            </tr>                                             
                                        </body>
                                    </html>
                                    ';
                            echo $html;
                                
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>