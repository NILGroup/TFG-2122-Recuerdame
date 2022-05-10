<?php

       
      


        include("controllers/PacientesController.php");
        $total = $_POST['numT'];
        $pacienteController = new PacientesController();

        for($i = 1; $i < $total; $i++){
            
            if(isset($_POST[$i])){
                echo $_POST[$i];
               
               if($pacienteController->comprobarTerapeuta($_POST[$i],$_GET['idPaciente']) != 1){
                  
                    $pacienteController->asignarTerapeuta($_POST[$i], $_GET['idPaciente']);
                }
            }
            else if(!isset($_POST[$i])){
               $j = $i * -1;
              
               if($pacienteController->comprobarTerapeuta($_POST[$j],$_GET['idPaciente'])==1){
                        $pacienteController->eliminarTerapeuta($_POST[$j], $_GET['idPaciente']);
               }
               
            }
            
        }
      header("Location:listadoPacientes.php");
    
?>