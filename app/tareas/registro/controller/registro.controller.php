<?php
switch ($request_method) {
    case 'GET':
        require_once("./app/tareas/registro/view/formulario.php");
        break;
    case 'POST':
        include_once("./app/tareas/repository/tareas.repository.php");

        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descri'];

        $idUsuario = (int)$_SESSION["idUsuario"];

        $tarea = new Tarea(0, $idUsuario, $titulo, $descripcion, "");

        if (!TareasRepository::getInstance()->saveNewTarea($tarea)) {
            $error = TareasRepository::getInstance()->getMysqli()->error;
            header("Location:  /tareas/registro?error=ERROR: {$error}");
            // header("Location:  /tareas/registro?error=ERROR: No fue posible crear la tarea");
            break;
        } else {
            header("Location:  /tareas/mi-lista");
        }
        break;

    default:
        # code...
        break;
}
