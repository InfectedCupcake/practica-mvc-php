<?php

switch ($request_method) {
    case 'GET':
        require_once("./app/tareas/usuario/view/registrarse.php");
        break;

    case 'POST':
        include_once("./app/tareas/repository/tareas.repository.php");

        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        $usuario = new Usuario(0, $nombre, $correo, $contrasena);

        if (!TareasRepository::getInstance()->registrarUsuario($usuario)) {

            $error = TareasRepository::getInstance()->getMysqli()->error;
            header("Location:  /tareas/registrarse?error=ERROR: {$error}");
            // header("Location:  /tareas/registro?error=ERROR: No fue posible crear la tarea");
            break;
        } else {
            header("Location:  /tareas/login");
        }

    default:
        //header("Location:  /tareas/mi-lista");
        break;
}
