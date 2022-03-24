<html>
    
<head>
<link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
  <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
  <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
  <link rel="stylesheet" href="calendario/fullcalendar/main.css"> 
  <meta charset="utf-8" />
  <title>Recuerdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
   
   
    <div class="container-fluid">
            <div class="pt-4 pb-2">
                <h5 class="text-muted">Calendario</h5>
                <hr class="lineaTitulo">
            </div>

           
     </div>
     <div id="calendar"></div>
     <?php include "layout/footer.php" ?>
    <script src="calendario/fullcalendar/main.js"></script>
    <!-- Script para trabajar nuestro calendario -->
    <script src="public/js/calendar.js"></script>



</body>

</html>