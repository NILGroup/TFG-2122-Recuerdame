<html>
    
<head>
  <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
  <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
  <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
  <link rel="stylesheet" type="text/css" href="public/css/styles.css">
  <meta charset="utf-8" />
  <?php include "public/js/general.js" ?>
  <title>Recuerdame</title>
</head>

<body>
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "layout/footer.php" ?>
    <?php include "models/listadoDeSesiones.php" ?>

    <div class="contenedor">
        <div>
            <h4>Datos de la sesión</h4>
        </div>
       
        <div>
            <div class = "fecha">
                <label for="fecha" class="align">Fecha: </label>
                <input type="date" id="fecha" name="fecha" required/>
            </div>

            <div class = "etapa">
                <label> Etapa de vida: </label>
                    <select name="etapas">
						<option selected value="0">Infancia </option>
						<option value="1">Adolescencia</option> 
						<option value="2">Adultez</option> 
						<option value="3">Vejez</option>
                    </select>
            </div>

            <div class = "terapeuta" >
                <label> Terapeuta: </label>
                    <select name="terapuetas">
						<option selected value="0"> Juan </option>
						<option value="1">María</option> 
						<option value="2">Luis</option> 
						<option value="3">Rosa</option>
                    </select>
            </div>

            <div class = "objetivo" >
                <label> Objetivo: </label>
            </div>
            <textarea cols="40" rows="3"> </textarea>

            <div class = "descripcion" >
                <label> Descripción: </label>
            </div>
            <textarea cols="40" rows="10"> </textarea>

            <div class = "barreras" >
                <label> Barreras: </label>
            </div>
            <textarea cols="40" rows="3"> </textarea>

            <div class = "facilitadores" >
                <label> Facilitadores: </label>
            </div>
            <textarea cols="40" rows="3"> </textarea>

        </div>

        <div>
            <h4>Recuerdos</h4>
        </div>
        <button type="button" class="btn btn-outline-dark">+</button>

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
                    </tr>
                </thead>
            </table>
        </div>

        <div>
            <h4>Material</h4>
        </div>

        <td class="tableActions">
            <i class="fa-solid fa-cloud-arrow-up"></i>
            <button type="button" class="btn btn-outline-dark">Añadir existente</button>
        </td>

        <div class="wrapper">
            <header>File Uploader JavaScript</header>
            <form action="#">
            <input class="file-input" type="file" name="file" hidden>
            <i class="fas fa-cloud-upload-alt"></i>
            <p>Browse File to Upload</p>
            </form>
            <section class="progress-area"></section>
            <section class="uploaded-area"></section>
        </div>        

        <button type="button" class="btn btn-outline-dark">Atrás</button>
        <button type="button" class="btn btn-outline-dark">Guardar</button>
    </div>
    
</body>

</html>