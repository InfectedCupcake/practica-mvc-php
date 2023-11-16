<?php 

switch ($request_method) {
    case 'GET':
        require_once("./app/registro/view/registro.html");
        break;
    case 'POST':
        require_once("./app/registro/view/registro.html");
        break;
    default:
        header('HTTP/1.1 400 Bad Request');
    break;
}
?>