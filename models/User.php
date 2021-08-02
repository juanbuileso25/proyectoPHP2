<?php

    class User {
        var $usuario;
        var $contrasena;
        var $perfil;
        var $estado;
        var $db;

        function __construct(){
            $this->db = Database::connect();
        }

        function getUsuario(){
            return $this->usuario;
        }

        function setUsuario($usuario){
            $this->usuario = $this->db->real_escape_string($usuario);
        }

        function getContrasena(){
            return password_hash($this->db->real_escape_string($this->contrasena), PASSWORD_BCRYPT, ['cost' => 4]);
        }

        function setContrasena($contrasena){
            $this->contrasena = $contrasena;
        }

        function getPerfil(){
            return $this->perfil;
        }

        function setPerfil($perfil){
            $this->perfil = $perfil;
        }

        function getEstado(){
            return $this->estado;
        }

        function setEstado($estado){
            $this->estado = $estado;
        }

        public function saveUser(){
            $usuario = $this->getUsuario();
            $contrasena = $this->getContrasena();
            $perfil  = $this->getPerfil();


            $sql = "INSERT INTO USUARIO(nombre,contrasena,perfil,estado) VALUES('".$usuario."','".$contrasena."','".$perfil."','activo')";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }
            return $result;
        }

        public function getAll(){
            $sql = "SELECT * FROM USUARIO WHERE estado = 'activo'";
            $users = $this->db->query($sql);

            $this->db->close();

            return $users;
        }

        public function getOne(){
            $nombre = $this->getUsuario();
            $sql = "SELECT * FROM USUARIO WHERE nombre = '".$nombre."'";
            
            $user = $this->db->query($sql);

            return $user->fetch_object();
        }

        public function getOnlyUsers(){
            $nombre = $this->getUsuario();
            $sql = "SELECT nombre FROM USUARIO WHERE estado = 'activo'";

            $users = $this->db->query($sql);

            return $users->fetch_object();
        }

        public function editUser(){
            $usuario = $this->getUsuario();
            $contrasena = $this->getContrasena();
            $perfil  = $this->getPerfil();
            $estado = $this->getEstado();

            $sql = "UPDATE USUARIO SET contrasena = '".$contrasena."', perfil = '".$perfil."', estado = '".$estado."' WHERE nombre = '".$usuario."'";

            $edit = $this->db->query($sql);

            $result = false;
            if($edit){
                $result = true;
            }
            return $result;
        }

        public function deleteUser($nombre){
            $sql = "UPDATE USUARIO SET estado = 'inactivo' WHERE nombre = '".$nombre."'";
    
            $delete = $this->db->query($sql);
    
            if($delete){
                return true;
            } else {
                return false;
            }
        }

        public function login(){
            $usuario = $this->usuario;
            $pass = $this->contrasena;

            $result = false;
            $sql = "SELECT * FROM usuario WHERE nombre = '$usuario'";
            $login = $this->db->query($sql);

            if($login && $login->num_rows == 1){
                $user = $login->fetch_object();

                $verify = password_verify($pass, $user->contrasena);
                
                if($verify){
                    $result = $user;
                }   
            }

            return $result;
        }

        public function getRol($user){
            $sql = "SELECT perfil FROM usuario WHERE nombre = '".$user."'";

            $consulta = $this->db->query($sql);

            $rol = $consulta->fetch_assoc()['perfil'];

            return $rol;
        }

        public function getName($table, $user){
            $sql = "SELECT nombre FROM ".$table." WHERE usuario = '".$user."'";

            $consulta = $this->db->query($sql);

            $name = $consulta->fetch_assoc()['nombre'];

            return $name;
        }

    
    }
?>