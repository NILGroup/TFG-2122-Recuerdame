<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuerdame</title>
</head>

<body>
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "layout/footer.php" ?>

    <div class="contenedor">
        <div>
            <h4>Listado de recuerdos</h4>
        </div>

        <div >
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Boda</td>
                        <td>21/02/2022</td>
                        <td>Adulto</td>
                        <td>Familia</td>
                        <td>Conservado</td>
                        <td>Positivo</td>
                        <td class="tableActions">
                            <i class="fa-solid fa-eye tableIcon"></i>
                            <i class="fa-solid fa-pencil text-primary tableIcon"></i>
                            <i class="fa-solid fa-trash-can text-danger tableIcon"></i>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Cumpleaños</td>
                        <td>21/03/2022</td>
                        <td>Infancia</td>
                        <td>Familia</td>
                        <td>Perdido</td>
                        <td>Negativo</td>
                        <td class="tableActions">
                            <i class="fa-solid fa-eye tableIcon"></i>
                            <i class="fa-solid fa-pencil text-primary tableIcon"></i>
                            <i class="fa-solid fa-trash-can text-danger tableIcon"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>