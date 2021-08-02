<?php 
    Class Client {
        var $nombre;
        var $codigo;
        var $documento;
        var $tipo;
        var $fecha_registro;
        var $fecha_inactividad;
        var $imagen;
        var $email;
        var $telefono;
        var $cupo;
        var $usuario;
        var $estado;
        var $barrio;
        var $comuna;
        var $db;

        function  __construct(){
            $this->db = Database::connect();
        }

        function getNombre(){
            return $this->nombre;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }

        function getCodigo(){
            return $this->codigo;
        }

        function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        function getDocumento(){
            return $this->documento;
        }

        function setDocumento($documento){
            $this->documento = $documento;
        }

        function getTipo(){
            return $this->tipo;
        }

        function setTipo($tipo){
            $this->tipo = $tipo;
        }

        function getFecha_registro(){
            return $this->fecha_registro;
        }

        function setFecha_registro($fecha_registro){
            $this->fecha_registro = $fecha_registro;
        }

        function getFecha_inactividad(){
            return $this->fecha_inactividad;
        }

        function setFecha_inactividad($fecha_inactividad){
            $this->fecha_inactividad = $fecha_inactividad;
        }

        function getImagen(){
            return $this->imagen;
        }

        function setImagen($imagen){
            $this->imagen = $imagen;
        }

        function getEmail(){
            return $this->email;
        }

        function setEmail($email){
            $this->email = $email;
        }

        function getTelefono(){
            return $this->telefono;
        }

        function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        function getCupo(){
            return $this->cupo;
        }

        function setCupo($cupo){
            $this->cupo = $cupo;
        }

        function getUsuario(){
            return $this->usuario;
        }

        function setUsuario($usuario){
            $this->usuario = $usuario;
        }

        function getEstado(){
            return $this->estado;
        }

        function setEstado($estado){
            $this->estado = $estado;
        }

        function getBarrio(){
            return $this->barrio;
        }

        function setBarrio($barrio){
            $this->barrio = $barrio;
        }

        function getComuna(){
            return $this->comuna;
        }

        function setComuna($comuna){
            $this->comuna = $comuna;
        }

        public function saveClient(){
            $nombre = $this->getNombre();
            $codigo = $this->getCodigo();
            $documento = $this->getDocumento();
            $tipo = $this->getTipo();
            $fecha_registro = $this->getFecha_registro();
            $fecha_inactividad= $this->getFecha_inactividad();
            $email = $this->getEmail();
            $telefono = $this->getTelefono();
            $cupo = $this->getCupo();
            $usuario = $this->getUsuario();
            $imagen = $this->getImagen();
            $barrio = $this->getBarrio();
            $comuna = $this->getComuna();
      
      
            $sql="INSERT INTO CLIENTE(nombre,codigo,documento,tipo,fecha_registro,imagen,email,telefono,cupo, usuario, estado, barrio, comuna) 
                          VALUES('".$nombre."','".$codigo."','".$documento."','".$tipo."','".$fecha_registro."','".$imagen."','".$email."','".$telefono."','".$cupo."','".$usuario."', 'activo', '".$barrio."', '".$comuna."')";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }
            return $result;
        }

        public function getAll(){
            $sql = "SELECT * FROM CLIENTE WHERE estado = 'activo'";
            $clients = $this->db->query($sql);

            $this->db->close();

            return $clients;
        }

        public function getOne(){
            $codigo = $this->getCodigo();
            $sql = "SELECT * FROM CLIENTE WHERE codigo = '".$codigo."'";
            
            $client = $this->db->query($sql);

            return $client->fetch_object();
        }

        public function editClient(){

            $nombre = $this->getNombre();
            $codigo = $this->getCodigo();
            $documento = $this->getDocumento();
            $tipo = $this->getTipo();
            $fecha_registro = $this->getFecha_registro();
            $fecha_inactividad= $this->getFecha_inactividad();
            $email = $this->getEmail();
            $telefono = $this->getTelefono();
            $cupo = $this->getCupo();
            $usuario = $this->getUsuario();
            $imagen = $this->getImagen();
            $barrio = $this->getBarrio();
            $comuna = $this->getComuna();

            $sql = "UPDATE CLIENTE SET nombre = '".$nombre."', documento = '".$documento."', tipo = '".$tipo."', fecha_registro = '".$fecha_registro."', fecha_inactivo = '".$fecha_inactividad."', email = '".$email."', telefono = '".$telefono."', cupo = '".$cupo."', usuario = '".$usuario."', barrio = '".$barrio."', comuna = '".$comuna."'";
            
            //Pregunto si va actualizar la imagen o no
            if($this->getImagen() != null){
                $sql .= ", imagen = '".$imagen."'";
            }
            $sql .= "WHERE codigo = '".$codigo."'";

            $edit = $this->db->query($sql);

            $result = false;
            if($edit){
                $result = true;
            }
            return $result;
        }

        public function deleteClient($codigo){
            $sql = "UPDATE cliente SET estado ='inactivo' WHERE codigo = $codigo";
    
            $delete = $this->db->query($sql);
    
            if($delete){
                return true;
            } else {
                return false;
            }
        }
    }

?>