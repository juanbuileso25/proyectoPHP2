<?php
    require_once 'models/Employee.php';
    require_once 'models/Neighborhood.php';
    require_once 'models/Commune.php';

    class EmployeeController {

        public function index(){
            $employee = new Employee();

            $employees = $employee->getAll();

            require_once 'views/employee/employeeIndex.php';
        }

        public function register(){
            require_once 'views/employee/register.php';
        }

        public function save(){
            if(isset($_POST)){
                $employee = new Employee();
                $employee->setNombre($_POST['txtNombre']);
                $employee->setDocumento($_POST['txtDocumento']);
                $employee->setFechaIngreso($_POST['fecha_ingreso']);
                $employee->setSalarioBasico($_POST['txtSalario']);
                $employee->setDeduccion($_POST['txtDeduccion']);
                $employee->setEmail($_POST['txtEmail']);
                $employee->setTelefono($_POST['txtTelefono']);
                $employee->setCelular($_POST['txtCelular']);
                $employee->setUsuario($_POST['txtUsuario']);
                $employee->setBarrio($_POST['barrio']);

                //Obtener la comuna dependiendo del barrio
                $barrio = $_POST['barrio'];
                $neighborhood = new NeighborHood();
                $id_comuna = $neighborhood->getIdCommune($barrio);
                $commune = new Commune();
                $nom_comuna = $commune->getOne($id_comuna);
                $employee->setComuna($nom_comuna);

                
               //Subir imagen
               $file = $_FILES['imagen'];
               $filename = $file['name'];
               $mimetype = $file['type'];

               if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

                   move_uploaded_file($file['tmp_name'], 'assets/imgs/employees/'.$filename);
                   $employee->setFoto($filename);

               } 

               $file = $_FILES['hoja_vida'];
                $filename = $file['name'];
                    

                move_uploaded_file($file['tmp_name'], 'assets/files/employees/'.$filename);
                $employee->setHojaVida($filename);
               

               $save = $employee->saveEmployee();

               if($save){
                   
                   header('Location: '.base_url.'employee/index');
                   $_SESSION['completado'] = true;
               } else {
                    $_SESSION['errores'] = true;
                    
               }
            }
        }

        public function editForm(){
            if(isset($_GET['documento'])){
                $documento = $_GET['documento'];

                $employee = new Employee();
                $employee->setDocumento($documento);

                $emp = $employee->getOne();

                require_once 'views/employee/editEmployee.php';
            }
        }

        public function edit(){
            if(isset($_GET['documento'])){
                $documento = $_GET['documento'];
                $employee = new Employee();
                $employee->setNombre($_POST['txtNombre']);
                $employee->setDocumento($documento);
                $employee->setFechaIngreso($_POST['fecha_ingreso']);
                $employee->setFechaRetiro($_POST['fecha_retiro']);
                $employee->setSalarioBasico($_POST['txtSalario']);
                $employee->setDeduccion($_POST['txtDeduccion']);
                $employee->setEmail($_POST['txtEmail']);
                $employee->setTelefono($_POST['txtTelefono']);
                $employee->setCelular($_POST['txtCelular']);
                $employee->setUsuario($_POST['txtUsuario']);
                $employee->setEstado($_POST['txtEstado']);
                $employee->setBarrio($_POST['barrio']);

                $barrio = $_POST['barrio'];
                $neighborhood = new NeighborHood();
                $id_comuna = $neighborhood->getIdCommune($barrio);
                $commune = new Commune();
                $nom_comuna = $commune->getOne($id_comuna);
                $employee->setComuna($nom_comuna);

                //Subir imagen
                $img = $_FILES['imagen'];
                $imgname = $img['name'];
                $mimetype = $img['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

                    move_uploaded_file($img['tmp_name'], 'assets/imgs/employees/'.$imgname);
                    $employee->setFoto($imgname);

                } 

                //Subir hoja de vida
            
                    $file = $_FILES['hoja_vida'];
                    $filename = $file['name'];
                    

                    move_uploaded_file($file['tmp_name'], 'assets/files/employees/'.$filename);
                    $employee->setHojaVida($filename);
                

               $edit = $employee->editEmployee();

               if($edit){
                  
                   header('Location: '.base_url.'employee/index');
                   $_SESSION['completado'] = true;
               } else {
                $_SESSION['errores'] = true;
               }
            } else {
                
            }
        }


        public function delete(){
            if(isset($_GET['documento'])){
                $documento = $_GET['documento'];

                $employee = new Employee();

                $delete = $employee->deleteEmployee($documento);

                if($delete){
                    $_SESSION['completado'] = true;
                    header('Location: '.base_url.'employee/index');
                } else {
                    $_SESSION['errores'] = true;
                }

            }
        }

        public function downloadFile(){
            if(isset($_GET['file'])){
                $filename = basename($_GET['file']);
                $filepath = 'assets/files/employees/'.$filename;
                
                if(!empty($filename) && file_exists($filepath)){
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename='.$filename);
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($filepath));
                    ob_clean();
                    flush();
                    readfile($filepath);
                    exit;
                } else {
                    echo "Este archivo no existe";
                }
            }
        }

        public function listEmployeeNC(){
            $employee = new Employee();

            $employees = $employee->getAll();

            return $employees;
        }

    }
?>