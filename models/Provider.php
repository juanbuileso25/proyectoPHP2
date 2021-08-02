<?php 
    Class Provider {
        var $documento;
        var $nombre;
        var $tipo;
        var $fecha_registro;
        var $fecha_inactividad;
        var $imagen;
        var $email;
        var $telefono;
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


        public function saveProvider(){
            $nombre = $this->getNombre();
            $documento = $this->getDocumento();
            $tipo = $this->getTipo();
            $fecha_registro = $this->getFecha_registro();
            $fecha_inactividad= $this->getFecha_inactividad();
            $email = $this->getEmail();
            $telefono = $this->getTelefono();
            $usuario = $this->getUsuario();
            $imagen = $this->getImagen();
            $barrio = $this->getBarrio();
            $comuna = $this->getComuna();
      
      
            $sql="INSERT INTO PROVEEDOR(documento,nombre,tipo,fecha_registro,fecha_inactivo,imagen,email,telefono, usuario, estado, barrio, comuna) 
                          VALUES('".$documento."','".$nombre."','".$tipo."','".$fecha_registro."','".$fecha_inactividad."','".$imagen."','".$email."','".$telefono."','".$usuario."', 'activo', '".$barrio."', '".$comuna."')";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }
            return $result;
        }

        public function getAll(){
            $sql = "SELECT * FROM PROVEEDOR WHERE estado = 'activo'";
            $provider = $this->db->query($sql);

            $this->db->close();

            return $provider;
        }


        public function getOne(){
            $documento = $this->getDocumento();
            $sql = "SELECT * FROM PROVEEDOR WHERE documento = '".$documento."'";
            
            $provider = $this->db->query($sql);

            return $provider->fetch_object();
        }

        public function editProvider(){
            $nombre = $this->getNombre();
            $documento = $this->getDocumento();
            $tipo = $this->getTipo();
            $fecha_registro = $this->getFecha_registro();
            $fecha_inactividad= $this->getFecha_inactividad();
            $email = $this->getEmail();
            $telefono = $this->getTelefono();
            $usuario = $this->getUsuario();
            $imagen = $this->getImagen();
            $estado = $this->getEstado();
            $barrio = $this->getBarrio();
            $comuna = $this->getComuna();

            $sql = "UPDATE PROVEEDOR SET nombre = '".$nombre."', tipo = '".$tipo."', fecha_registro = '".$fecha_registro."', fecha_inactivo = '".$fecha_inactividad."', email = '".$email."', telefono = '".$telefono."', usuario = '".$usuario."', estado = '".$estado."', barrio = '".$barrio."', comuna = '".$comuna."'";
            
            //Pregunto si va actualizar la imagen o no
            if($this->getImagen() != null){
                $sql .= ", imagen = '".$imagen."'";
            }
            $sql .= "WHERE documento = '".$documento."'";

            $edit = $this->db->query($sql);

            $result = false;
            if($edit){
                $result = true;
            }
            return $result;
        }


        public function deleteProvider($documento){
            $sql = "UPDATE proveedor SET estado = 'inactivo' WHERE documento = $documento";
    
            $delete = $this->db->query($sql);
    
            if($delete){
                return true;
            } else {
                return false;
            }
        }

        public function getProdProvi(){
            $sql = "SELECT proveedor.nombre, proveedor.barrio, proveedor.comuna, producto.nombreP FROM proveedor INNER JOIN producto ON proveedor.documento = producto.id_proveedor WHERE proveedor.estado = 'activo'";
            $consulta = $this->db->query($sql);

            $this->db->close();

            return $consulta;
        }
    }

?>