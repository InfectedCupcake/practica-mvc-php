<?php

switch ($path_comp[0]) {
    case '':
        require_once('./app/registro/controller/registro.controller.php');
        break;
    case 'presentacion':
        require_once('./app/presentacion/controller/presentacion.cotroller.php');
        break;
    case 'tareas':
        require_once('./app/tareas/tareas.controller.php');
        break;
    case 'app-paises':
        require_once('./app/paises/paises.controller.php');
        break;

    default:
        header('HTTP/1.1 404 Not Found');
        break;
}
