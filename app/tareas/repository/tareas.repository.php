<?php

    require_once("./app/tareas/model/tarea.model.php");
    require_once("./app/tareas/model/usuarios.model.php");

    class TareasRepository {
        private static $_instance = [];
        private mysqli $mysqli;

        private function __construct(){
            $host = $_ENV["DB_HOST"];
            $user = $_ENV["DB_USER"];
            $pass = $_ENV["DB_PASSWORD"];
            $database = $_ENV["DB_DATABASE"];


            $this->mysqli = new mysqli($host, $user, $pass, $database);
        }

        public static function getInstance(): TareasRepository {
            $class = static::class;
            if (!isset($_instance[$class])) {
                $_instance[$class] = new Static();
            }

            return $_instance[$class];
        }

        public function getMysqli(): mysqli {
            return $this->mysqli;
        }

        public function getAllTareas(Usuario $usuario): array {
            $tareas = array();
            $query = "SELECT id, idUsuario, titulo, descripcion, status FROM tareas WHERE idUsuario = ? ORDER BY status DESC";

            $sentence = $this->mysqli->prepare($query);

            $idUsuario = $usuario->getIdUsuario();
            
            $sentence->bind_param("i", $idUsuario);

            $sentence->execute();

            $sentence->bind_result($id, $idUsuar, $titulo, $descripcion, $status);

            while ($sentence->fetch()) {
                $tareas[] = new Tarea($id, $idUsuar, $titulo, $descripcion, $status);
            }

            return $tareas;
        }

        public function saveNewTarea( Tarea $tarea ): bool {
            $this->mysqli->begin_transaction();
            $query = "INSERT INTO tareas(idUsuario, titulo, descripcion) VALUES(?, ? , ? )";

            $sentence = $this->mysqli->prepare($query);
            
            $titulo = $tarea->getTitulo();
            $descripcion = $tarea->getDescripcion();
            $idUsuario = $tarea->getIdUsuario();

            $sentence->bind_param("iss", $idUsuario, $titulo, $descripcion);

            if ( !$sentence->execute() ){
                $this->mysqli->rollback();
                return false;
            }

            $this->mysqli->commit();
            return true;
        }


        ///--------------------------------Usuarios
        public function registrarUsuario( Usuario $usuario ): bool {

            $this->mysqli->begin_transaction();
            $query = "INSERT INTO users (nombre, correo, contrasena) VALUES (?, ?, ?);";

            $sentence = $this->mysqli->prepare($query);
            
            $nombre = $usuario->getNombre();
            $correo = $usuario->getCorreo();
            $contrasena = $usuario->getContrasena();
            
            $sentence->bind_param("sss", $nombre, $correo, $contrasena);

            if ( !$sentence->execute() ){
                $this->mysqli->rollback();
                return false;
            }

            $this->mysqli->commit();
            return true;
        }

        public function login( Usuario $usuario): array {

            $infoUser = "fallo";
            $query = "SELECT idUsuario, nombre FROM users WHERE correo = ? AND contrasena = ?";

            $sentence = $this->mysqli->prepare($query);

            $correo = $usuario->getCorreo();
            $contrasena = $usuario->getContrasena();
            
            $sentence->bind_param("ss", $correo, $contrasena);
            $sentence->execute();

            $sentence->bind_result($idUsuario, $nombre);

            while ($sentence->fetch()) {
                $infoUser = array('idUsuario' => $idUsuario, 'nombre' => $nombre);
            }

            return $infoUser;
        }


    }

?>