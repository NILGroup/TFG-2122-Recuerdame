<html>
    
<head>
  <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
  <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
  <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
  <link rel="stylesheet" type="text/css" href="public/css/styles.css">
  <meta charset="utf-8" />
  <title>Recuerdame</title>
</head>

<body>
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "layout/footer.php" ?>
    <?php include "models/listadoDeSesiones.php" ?>

    <div class="contenedor">
        <div>
            <h4>Listado de sesiones</h4>
        </div>

        <div class="row">
            <div class="col-12 justify-content-end d-flex">
                <div>
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Username" aria-describedby="basic-addon1">
                   
                </div> 
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                <button type="button" class="btn btn-outline-dark">+</button>      
            </div>
        </div>

        
        <div >
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Objetivo</th>
                    <th scope="col">Finalizada/No finalizada</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $lista_class = new ListaSesion();
                    $listas = $lista_class->imprimeListaSesiones();
                    if($listas != null){ //Si los resultados devueltos son mayor a 0
                        foreach ($listas as $lista) {
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
                                                <th scope="row">'.$lista[0].'</th>
                                                <td>'.$lista[1].'</td>
                                                <td>'.$lista[2].'</td>
                                                <td>'.$lista[3].'</td>
                                                <td class="tableActions">
                                                    <i class="fa-solid fa-eye tableIcon"></i>
                                                    <i class="fa-solid fa-pencil text-primary tableIcon"></i>
                                                    <i class="fa-regular fa-square-check text-success tableIcon"></i>
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