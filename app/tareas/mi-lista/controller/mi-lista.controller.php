<?php
    switch ($request_method) {
        case 'GET':
            require_once("./app/tareas/mi-lista/view/mi-lista.php");
            break;
        case 'POST':
            echo $_POST["id"];
            break;

        
        default:
            header("Location: .");
            break;
    }
?>