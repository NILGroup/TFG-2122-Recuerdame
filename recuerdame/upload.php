<?php
if (!empty($_FILES)) {
    
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $location = $_FILES['file']['tmp_name'];
    $folder_name = 'archivos/' . $file_name;

    $idRecuerdo = $_GET['idRecuerdo'];

    if (isset($idRecuerdo)) {
        include("controllers/RecuerdosController.php");
        $listaFicheros = array();
        array_push($listaFicheros, $file_name);
        $recuerdosController = new RecuerdosController();
        $recuerdosController->guardarMultimedia($idRecuerdo, $listaFicheros);
        move_uploaded_file($file_tmp, $folder_name);
    }
}

?>