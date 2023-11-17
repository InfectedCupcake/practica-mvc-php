<?php
if (!isset($path_comp[1]))
    $path_comp[1] = '';

switch ($path_comp[1]) {
    case '':
    case 'registrarse':
        if (!checkSession())
            require_once("./app/tareas/usuario/controller/registrarse.controller.php");
        else
            header("Location:  /tareas/mi-lista");
        break;
    case 'login':
        if (!checkSession())
            require_once("./app/tareas/usuario/controller/login.controller.php");
        else
            header("Location:  /tareas/mi-lista");
        break;
    case 'registro':
        if (checkSession())
            require_once("./app/tareas/registro/controller/registro.controller.php");
        else
            header("Location:  /tareas/login");
        break;
    case 'mi-lista':
        if (checkSession())
            require_once("./app/tareas/mi-lista/controller/mi-lista.controller.php");
        else
            header("Location:  /tareas/login");
        break;

    case 'logout':
        session_destroy();
        header("Location:  /tareas/login");
        break;

    default:
        //header("Location:  /tareas");
        break;
}
