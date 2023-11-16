<?php
    class Usuario {

        private int $idUsuario ;
        private string $nombre;
        private string $correo;
        private string $contrasena;

        public function __construct(
            int $idUsuario = 0,
            string $nombre,
            string $correo,
            string $contrasena
        )
        {
            $this->idUsuario = $idUsuario;
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->contrasena = $contrasena;
        }

        public function getIdUsuario(): int {
            return $this->idUsuario;
        }

        public function getNombre(): string {
            return $this->nombre;
        }

        public function setNombre( string $nombre ) {
            $this->nombre = $nombre;
        }

        public function getCorreo(): string {
            return $this->correo;
        }

        public function setCorreo( string $correo ) {
            $this->correo = $correo;
        }

        public function getContrasena(): string {
            return $this->contrasena;
        }

        public function setContrasena( string $contrasena ) {
            $this->contrasena = $contrasena;
        }
    }