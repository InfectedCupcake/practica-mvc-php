<?php 

switch ($request_method) {
    case 'GET':
        require_once("./app/presentacion/view/index.html");
        break;
    
    default:
        header('HTTP/1.1 400 Bad Request');
    break;
}
?>