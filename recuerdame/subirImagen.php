<?php
if (!empty($_FILES)) {
    
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $location = $_FILES['file']['tmp_name'];
    $folder_name = 'archivos/' . $file_name;

    if (isset($_GET['idRecuerdo'])) {
        include("controllers/RecuerdosController.php");
        $listaFicheros = array();
        array_push($listaFicheros, $file_name);
        $recuerdosController = new RecuerdosController();
        $recuerdosController->guardarMultimedia($_GET['idRecuerdo'], $listaFicheros);
        move_uploaded_file($file_tmp, $folder_name);
    } else if (isset($_GET['idSesion'])) {
        include("controllers/SesionesController.php");
        $listaFicheros = array();
        array_push($listaFicheros, $file_name);
        $sesionesController = new SesionesController();
        $sesionesController->guardarMultimedia($_GET['idSesion'], $listaFicheros);
        move_uploaded_file($file_tmp, $folder_name);
    }
}

?>