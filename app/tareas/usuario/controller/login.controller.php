<?php

switch ($request_method) {
    case 'GET':
        require_once("./app/tareas/usuario/view/login.php");
        break;

    case 'POST':
        include_once("./app/tareas/repository/tareas.repository.php");

        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        $usuario = new Usuario(0, "", $correo, $contrasena);

        $infoUser = TareasRepository::getInstance()->login($usuario);

        //var_dump($infoUser);
        if (empty($infoUser)) {
            header("Location:  /tareas/registrarse?error=usuarioNoEncontrado");
            break;
        } else {
            $_SESSION["idUsuario"] = $infoUser["idUsuario"];

            header("Location:  /tareas/mi-lista");
        }

    default:
        //header("Location:  /tareas/mi-lista");
        break;
}
