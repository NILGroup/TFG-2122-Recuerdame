


<?php
        include("controllers/UsuarioController.php");
         
          $mail = $_GET['mail'];
          $password = $_POST['pass'];
          
         
          $usuarioController = new UsuarioController();
          $usuarioController->modificarContrasenia($password,$mail);

          echo "<script> alert('Se cambio correctamente la contraseña.'); window.location='login.php'</script>";

?>