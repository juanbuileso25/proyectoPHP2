<?php
require_once 'models/Location.php';
require_once 'models/User.php';

class LocationController{
    public function index(){
        require_once 'views/location/locationIndex.php';
    }

    public function register(){
        require_once 'views/location/registerLocation.php';
    }

    public function save(){
        if(isset($_POST)){
            $latitud = $_POST['latitud'];
            $longitud = $_POST['longitud'];
            $usuario = $_POST['selectUsuario'];

            $user = New User();
            $perfil = $user->getRol($usuario);
            $nombre = $user->getName($perfil, $usuario);


            $location = new Location();
            
            $location->setLatitud($latitud);
            $location->setLongitud($longitud);
            $location->setUsuario($usuario);
            $location->setPerfil($perfil);
            $location->setNombre($nombre);

            $save = $location->saveLocation();

    
            if($save){
                $_SESSION['completado'] = true;
                header('Location: '.base_url.'location/register');
            } else {
                $_SESSION['errores'] = true;
            }
        }
    }

    public function getLocations(){

        $location = new Location();  
        $result = $location->getAll();
    

        while($row = $result->fetch_array()){
            $locations[] = array(
                "id" => $row[0],
                "latitud" => $row[1],
                "longitud" => $row[2],
                "usuario" => $row[3],
                "perfil" => $row[4],
                "nombre" => $row[5]
            );
    
        }
        
        $jsonOutput = json_encode($locations);

        return $jsonOutput;
    }

    public function getClient(){
        $location = new Location();  
        $result = $location->getClient();
    

        while($row = $result->fetch_array()){
            $locations[] = array(
                "id" => $row[0],
                "latitud" => $row[1],
                "longitud" => $row[2],
                "usuario" => $row[3],
                "perfil" => $row[4],
                "nombre" => $row[5]
            );
    
        }
        
        $jsonOutput = json_encode($locations);

        return $jsonOutput;
    }

    public function getEmployee(){
        $location = new Location();  
        $result = $location->getEmployee();
    

        while($row = $result->fetch_array()){
            $locations[] = array(
                "id" => $row[0],
                "latitud" => $row[1],
                "longitud" => $row[2],
                "usuario" => $row[3],
                "perfil" => $row[4],
                "nombre" => $row[5]
            );
    
        }
        
        $jsonOutput = json_encode($locations);

        return $jsonOutput;
    }

    public function getProvideer(){
        $location = new Location();  
        $result = $location->getProvideer();
    

        while($row = $result->fetch_array()){
            $locations[] = array(
                "id" => $row[0],
                "latitud" => $row[1],
                "longitud" => $row[2],
                "usuario" => $row[3],
                "perfil" => $row[4],
                "nombre" => $row[5]
            );
    
        }
        
        $jsonOutput = json_encode($locations);

        return $jsonOutput;
    }
}?>