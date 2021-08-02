
<?php
    require_once 'models/Client.php';
    require_once 'models/Neighborhood.php';
    require_once 'models/Commune.php';

    class ClientController {

        public function index(){
            $client = new Client();

            $clients = $client->getAll();

            require_once 'views/client/clientIndex.php';
        }

        public function register(){
            require_once 'views/client/register.php';
        }

        public function save(){
            if(isset($_POST)){
                $client = new Client();
                $client->setNombre($_POST['txtNombre']);
                $client->setCodigo($_POST['txtCodigo']);
                $client->setDocumento($_POST['txtDocumento']);
                $client->setTipo($_POST['txtTipo']);
                $client->setFecha_registro($_POST['fecha_registro']);
                $client->setEmail($_POST['txtEmail']);
                $client->setTelefono($_POST['txtTelefono']);
                $client->setCupo($_POST['txtCupo']);
                $client->setUsuario($_POST['txtUsuario']);
                $client->setBarrio($_POST['barrio']);

                //Obtener la comuna dependiendo del barrio
                $barrio = $_POST['barrio'];
                $neighborhood = new NeighborHood();
                $id_comuna = $neighborhood->getIdCommune($barrio);
                $commune = new Commune();
                $nom_comuna = $commune->getOne($id_comuna);
                $client->setComuna($nom_comuna);


                //Subir imagen
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

                    move_uploaded_file($file['tmp_name'], 'assets/imgs/clients/'.$filename);
                    $client->setImagen($filename);

                } 
                

               $save = $client->saveClient();

               if($save){
                header('Location: '.base_url.'client/index');
                   $_SESSION['completado'] = true;

               } else {
                header('Location: '.base_url.'client/index');
                    $_SESSION['error'] = true;
                    
               }
            }
        }

        public function editForm(){
            if(isset($_GET['codigo'])){
                $codigo = $_GET['codigo'];

                $client = new Client();
                $client->setCodigo($codigo);

                $cli = $client->getOne();

                require_once 'views/client/editClient.php';
            }
        }

        public function edit(){
            if(isset($_GET['codigo'])){
                $codigo = $_GET['codigo'];
                $client = new Client();
                $client->setNombre($_POST['txtNombre']);
                $client->setCodigo($codigo);
                $client->setDocumento($_POST['txtDocumento']);
                $client->setTipo($_POST['txtTipo']);
                $client->setFecha_registro($_POST['fecha_registro']);
                $client->setFecha_inactividad($_POST['fecha_inactivo']);
                $client->setEmail($_POST['txtEmail']);
                $client->setTelefono($_POST['txtTelefono']);
                $client->setCupo($_POST['txtCupo']);
                $client->setUsuario($_POST['txtUsuario']);
                $client->setEstado($_POST['txtEstado']);
                $client->setBarrio($_POST['barrio']);

                //Obtener la comuna dependiendo del barrio
                $barrio = $_POST['barrio'];
                $neighborhood = new NeighborHood();
                $id_comuna = $neighborhood->getIdCommune($barrio);
                $commune = new Commune();
                $nom_comuna = $commune->getOne($id_comuna);
                $client->setComuna($nom_comuna);

                //Subir imagen
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

                    move_uploaded_file($file['tmp_name'], 'assets/imgs/clients/'.$filename);
                    $client->setImagen($filename);

                } 
                

               $save = $client->editClient();

               if($save){
                header('Location: '.base_url.'client/index');
                    $_SESSION['completado'] = true; 
                   
                   
               } else {
                    $_SESSION['errores'] = true; 
               }
            } else {
                
            }
        }


        public function delete(){
            if(isset($_GET['codigo'])){
                $codigo = $_GET['codigo'];

                $client = new Client();

                $delete = $client->deleteClient($codigo);

                if($delete){
                    header('Location: '.base_url.'client/index');
                    $_SESSION['completado'] = true;
                    
                } else {
                    $_SESSION['errores'] = true;
                }

            }
        }

        public function listClientNC(){
            $client = new Client();
            $clients = $client->getAll();
            
            return $clients;
        }


    }
?>