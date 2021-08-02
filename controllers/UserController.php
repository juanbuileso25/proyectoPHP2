<?php
    require_once 'models/User.php';

    class UserController {

        public function home(){
            require_once 'views/layout/home.php';
        }

        public function index(){
            $user = new User();

            $users = $user->getAll();

            require_once 'views/user/userIndex.php';
        }

        public function register(){
            require_once 'views/user/register.php';
        }

        public function save(){
            if(isset($_POST)){
                $user = new User();
                $user->setUsuario($_POST['txtUsuario']);
                $user->setContrasena($_POST['txtContrasena']);
                $user->setPerfil($_POST['txtPerfil']);


               $save = $user->saveUser();

               if($save){
                   $_SESSION['completado'] = true;
                   header('Location: '.base_url.'user/index');
               } else {
                    $_SESSION['errores'] = "No se guardo el usuario";
                    header('Location: '.base_url.'user/index');
               }
            }
        }

        public function editForm(){
            if(isset($_GET['nombre'])){
                $nombre = $_GET['nombre'];

                $user = new User();
                $user->setUsuario($nombre);

                $us = $user->getOne();

                require_once 'views/user/editUser.php';
            }
        }

        public function edit(){
            if(isset($_GET['nombre'])){
                
                $user = new User();
                $user->setUsuario($_GET['nombre']);
                $user->setContrasena($_POST['txtContrasena']);
                $user->setPerfil($_POST['txtPerfil']);
                $user->setEstado($_POST['txtEstado']);


               $edit = $user->editUser();

               if($edit){
                $_SESSION['completado'] = true;
                   header('Location: '.base_url.'user/index');
               } else {
                $_SESSION['errores'] = true;
               }
            } else {
                echo "no existe nombre";
            }
        }

        public function delete(){
            if(isset($_GET['nombre'])){
                $nombre = $_GET['nombre'];

                $user = new User();

                $delete = $user->deleteUser($nombre);

                if($delete){
                   $_SESSION['completado'] = true;
                    header('Location: '.base_url.'user/index');
                } else {
                    $_SESSION['errores'] = true;
                }

            }
        }

        public function login(){
            if(isset($_POST)){
                $user = new User();
                $user->setUsuario($_POST['txtNombre']);
                $user->setContrasena($_POST['txtContrasena']);
                
                $identity = $user->login();
               
                if($identity && is_object($identity)){
                    $_SESSION['identity'] = $identity;

                    if($identity->perfil == 'admin'){
                        $_SESSION['admin'] = true;
                        $noti = new Notification();
                        $cant = $noti->getNotifications();
                        $_SESSION['cant'] = $cant;
                    } elseif(isset($_SESSION)) {
                        $_SESSION['usuario'] = true;
                    }
                } else {
                    $_SESSION['error_login'] = true;
                }
            }

            header('Location: '.base_url);
        }

        public function logout(){
            if(isset($_SESSION['identity'])){
                unset($_SESSION['identity']);
            }

            if(isset($_SESSION['admin'])){
                unset($_SESSION['admin']);
            }

            if(isset($_SESSION['usuario'])){
                unset($_SESSION['usuario']);
            }

            header('Location: '.base_url);
        }

        
        public function showUsers(){
            $user = new User();

            $users = $user->getAll();

            return $users;
        }
    }
?>