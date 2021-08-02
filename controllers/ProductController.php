<?php
    require_once 'models/Product.php';

    class ProductController {

        public function index(){
            $product = new Product();

            $products = $product->getAll();

            require_once 'views/product/productIndex.php';
        }

        public function register(){
            require_once 'views/product/registerProduct.php';
        }

        public function save(){
            if(isset($_POST)){
                $product = new Product();
                $product->setNombre($_POST['txtNombre']);
                $product->setIdProveedor($_POST['id_proveedor']);

                //Subir imagen
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

                    move_uploaded_file($file['tmp_name'], 'assets/imgs/products/'.$filename);
                    $product->setImagen($filename);

                } 
            

               $save = $product->saveProduct();

               if($save){
                   $_SESSION['completado'] = true;
                   header('Location: '.base_url.'product/index');
                   
               } else {
                    $_SESSION['errores'] = true;
                   
                   
               }
            }
        }


        public function editForm(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $product = new Product();
                $product->setId($id);

                $pro = $product->getOne();

                require_once 'views/product/editProduct.php';
            }
        }

        public function edit(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $product = new Product();
                $product->setId($id);
                $product->setNombre($_POST['txtNombre']);
                $product->setEstado($_POST['txtEstado']);

                //Subir imagen
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

                    move_uploaded_file($file['tmp_name'], 'assets/imgs/products/'.$filename);
                    $product->setImagen($filename);

                } 
                

               $save = $product->editProduct();

               if($save){
                    $_SESSION['completado'] = true;
                   header('Location: '.base_url.'product/index');
                   
               } else {
                $_SESSION['errores'] = true;
                   var_dump($client);
                   
               }
            } else {
                echo "no existe nombre";
            }
        }

        public function delete(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $product = new Product();

                $delete = $product->deleteProduct($id);

                if($delete){
                    $_SESSION['completado'] = true;
                    header('Location: '.base_url.'product/index');
                } else {
                    $_SESSION['errores'] = true;
                }

            }
        }
    }
?>