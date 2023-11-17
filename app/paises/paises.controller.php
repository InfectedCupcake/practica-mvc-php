<?php

if (!isset($path_comp[1]))
    $path_comp[1] = 'por-continente';

switch ($path_comp[1]) {
    case 'por-continente':
        require_once("./app/paises/por-continente/view/por-continente.view.php");
        break;

    case 'por-pais':
        require_once("./app/paises/por-pais/view/por-pais.view.php");
        break;

    case 'ver-pais':
        require_once("./app/paises/ver-pais/view/ver-pais.view.php");
        break;

    default:
        header("Location:  /app-paises/por-continente");
        break;
}
