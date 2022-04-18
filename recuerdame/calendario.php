<?php
    session_start();
?>

<html>
    
<head>
<link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
<link href="public/fontawesome6/css/all.css" rel="stylesheet">
  <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
  <link rel="stylesheet" href="public/fullcalendar/main.css"> 
  <link rel="stylesheet" href="public/css/styles.css">
  <meta charset="utf-8" />
  <title>Recuerdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    
 <?php include "controllers/CalendarioController.php" ?>
   
   
    <div class="container-fluid">
            <div class="pt-4 pb-2">
                <h5 class="text-muted">Calendario</h5>
                <hr class="lineaTitulo">
            </div>

           
     
     <div id="calendar"></div>
      <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header bg-info">
             <h5 class="modal-title" id="titulo"></h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
             </button>
           </div>
           <form id="formulario" action="gestorActividades.php" method="POST">
            <div class="modal-body">
                <div class= "form-floating mb-3">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <input type="text" class="form-control" id="title" name="title" required>
                    <label for="title" class="form-label">Título</label>
                </div>
                <div class= "form-floating mb-3">
                    <input type="date" class="form-control" id="start" name="fecha" required>
                    <label for="start" class="form-label">Fecha</label>
                </div>
                <div class= "form-floating mb-3">
                    <input type="color" class="form-control" id="color" name="color" required>
                    <label for="color" class="form-label">Color</label>
                </div>
                <div class= "form-floating mb-3">
                    <textarea maxlength="255" class="form-control form-control-sm" id="obs" name="obs" rows="3"></textarea>
                    <label for="obs" class="form-label">Observaciones</label>
                </div>
                    <div class="modal-footer">
                        <input type="submit" id="btnEliminar" name="btnEliminar" value="Eliminar actividad">
                        <input type="submit"  id="btnAccion" name="btnAccion">
                    </div>
           </form>
            
         </div>
       </div>
       
     </div>
</div>
</div>
    <script src="public/fullcalendar/main.js"></script>
    <!-- antes del script de nuestro calendario añadimos el archivo traductor: -->
    <script src="public/fullcalendar/locales/es.js"></script>
    <!-- Script para trabajar nuestro calendario -->
    <script src="public/js/calendar.js"></script>
    <?php include "layout/footer.php" ?>
      
</body>

</html>