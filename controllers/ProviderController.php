<?php
    require_once 'models/Provider.php';
    require_once 'models/Neighborhood.php';
    require_once 'models/Commune.php';

    class ProviderController {

        public function index(){
            $provider = new Provider();

            $providers = $provider->getAll();

            require_once 'views/provider/providerIndex.php';
        }

        public function register(){
            require_once 'views/provider/registerProvider.php';
        }

        public function save(){
            if(isset($_POST)){
                $provider = new Provider();
                $provider->setDocumento($_POST['txtDocumento']);
                $provider->setNombre($_POST['txtNombre']);
                $provider->setTipo($_POST['txtTipo']);
                $provider->setFecha_registro($_POST['fecha_registro']);
                $provider->setEmail($_POST['txtEmail']);
                $provider->setTelefono($_POST['txtTelefono']);
                $provider->setUsuario($_POST['txtUsuario']);
                $provider->setBarrio($_POST['barrio']);

                //Obtener comuna
                $barrio = $_POST['barrio'];
                $neighborhood = new NeighborHood();
                $id_comuna = $neighborhood->getIdCommune($barrio);
                $commune = new Commune();
                $nom_comuna = $commune->getOne($id_comuna);
                $provider->setComuna($nom_comuna);
                
                //Subir imagen
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

                    move_uploaded_file($file['tmp_name'], 'assets/imgs/providers/'.$filename);
                    $provider->setImagen($filename);

                } 
        
               $save = $provider->saveProvider();

               if($save){
                $_SESSION['completado'] = true;
                header('Location: '.base_url.'provider/index');
                index();
               } else {
                   $_SESSION['errores'] = true;
               }
            }
        }

        public function editForm(){
            if(isset($_GET['documento'])){
                $documento = $_GET['documento'];

                $provider = new Provider();
                $provider->setDocumento($documento);

                $prov = $provider->getOne();

                require_once 'views/provider/editProvider.php';
            }
        }

        public function edit(){
            if(isset($_GET['documento'])){
                $documento = $_GET['documento'];
                $provider = new Provider();
                $provider->setDocumento($documento);
                $provider->setNombre($_POST['txtNombre']);
                $provider->setTipo($_POST['txtTipo']);
                $provider->setFecha_registro($_POST['fecha_registro']);
                $provider->setFecha_inactividad($_POST['fecha_inactivo']);
                $provider->setEmail($_POST['txtEmail']);
                $provider->setTelefono($_POST['txtTelefono']);
                $provider->setUsuario($_POST['txtUsuario']);
                $provider->setEstado($_POST['txtEstado']);
                $provider->setBarrio($_POST['barrio']);

                //Obtener comuna
                $barrio = $_POST['barrio'];
                $neighborhood = new NeighborHood();
                $id_comuna = $neighborhood->getIdCommune($barrio);
                $commune = new Commune();
                $nom_comuna = $commune->getOne($id_comuna);
                $provider->setComuna($nom_comuna);
                
                //Subir imagen
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

                    move_uploaded_file($file['tmp_name'], 'assets/imgs/providers/'.$filename);
                    $provider->setImagen($filename);

                } 
            


               $edit = $provider->editProvider();

               if($edit){
                    $_SESSION['completado'] = true;
                    header('Location: '.base_url.'provider/index');
               } else {
                    $_SESSION['errores'] = true;
               }
            }
        }

        public function delete(){
            if(isset($_GET['documento'])){
                $documento = $_GET['documento'];

                $provider = new Provider();

                $delete = $provider->deleteProvider($documento);

                if($delete){
                    $_SESSION['completado'] = true;
                    header('Location: '.base_url.'provider/index');
                } else {
                    $_SESSION['errores'] = true;
                }

            }
        }

        public function showIdProviders(){
            $provider = new Provider();

            $providers = $provider->getAll();
            return $providers;
        }

        public function showReportProvider(){
            $provider = new Provider();

            $providers = $provider->getProdProvi();

            return $providers;
        }


    }
?>
