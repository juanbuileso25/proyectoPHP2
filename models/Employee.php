<?php

    class Employee {
        var $nombre;
        var $documento;
        var $fecha_ingreso;
        var $fecha_retiro;
        var $salario_basico;
        var $deduccion;
        var $foto;
        var $hoja_vida;
        var $email;
        var $telefono;
        var $celular;
        var $usuario;
        var $barrio;
        var $comuna;
        var $db;

        function __construct(){
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

        function getFechaIngreso(){
            return $this->fecha_ingreso;
        }

        function setFechaIngreso($fecha_ingreso){
            $this->fecha_ingreso = $fecha_ingreso;
        }

        function getFechaRetiro(){
            return $this->fecha_retiro;
        }

        function setFechaRetiro($fecha_retiro){
            $this->fecha_retiro = $fecha_retiro;
        }

        function getSalarioBasico(){
            return $this->salario_basico;
        }

        function setSalarioBasico($salario_basico){
            $this->salario_basico = $salario_basico;
        }

        function getDeduccion(){
            return $this->deduccion;
        }

        function setDeduccion($deduccion){
            $this->deduccion = $deduccion;
        }

        function getFoto(){
            return $this->foto;
        }

        function setFoto($foto){
            $this->foto = $foto;
        }

        function getHojaVida(){
            return $this->hoja_vida;
        }

        function setHojaVida($hoja_vida){
            $this->hoja_vida = $hoja_vida;
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

        function getCelular(){
            return $this->celular;
        }

        function setCelular($celular){
            $this->celular = $celular;
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


        public function getAll(){
            $sql = "SELECT * FROM empleado WHERE estado = 'activo'";
            $employees = $this->db->query($sql);

            $this->db->close();

            return $employees;
        }


        public function saveEmployee(){
            $nombre = $this->getNombre();
            $documento = $this->getDocumento();
            $fecha_ingreso = $this->getFechaIngreso();
            $fecha_retiro= $this->getFechaRetiro();
            $salario_basico = $this->getSalarioBasico();
            $deduccion = $this->getDeduccion();
            $foto = $this->getFoto();
            $hoja_vida = $this->getHojaVida();
            $email = $this->getEmail();
            $telefono = $this->getTelefono();
            $celular = $this->getCelular();
            $usuario = $this->getUsuario();
            $barrio = $this->getBarrio();
            $comuna = $this->getComuna();
      
      
            $sql="INSERT INTO EMPLEADO(nombre,documento,fecha_ingreso,salario_basico,deducion,foto,hoja_vida,email,telefono,celular, usuario, estado, barrio, comuna) 
                          VALUES('".$nombre."','".$documento."','".$fecha_ingreso."','".$salario_basico."','".$deduccion."','".$foto."','".$hoja_vida."','".$email."','".$telefono."','".$celular."','".$usuario."', 'activo', '".$barrio."', '".$comuna."')";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }
            var_dump( $this->getBarrio());
            return $result;
        }

        public function getOne(){
            $documento = $this->getDocumento();
            $sql = "SELECT * FROM EMPLEADO WHERE documento = '".$documento."'";
            
            $empleado = $this->db->query($sql);

            return $empleado->fetch_object();
        }

        public function editEmployee(){
            $nombre = $this->getNombre();
            $documento = $this->getDocumento();
            $fecha_ingreso = $this->getFechaIngreso();
            $fecha_retiro= $this->getFechaRetiro();
            $salario_basico = $this->getSalarioBasico();
            $deduccion = $this->getDeduccion();
            $foto = $this->getFoto();
            $hoja_vida = $this->getHojaVida();
            $email = $this->getEmail();
            $telefono = $this->getTelefono();
            $celular = $this->getCelular();
            $usuario = $this->getUsuario();
            $estado = $this->getEstado();
            $barrio = $this->getBarrio();
            $comuna = $this->getComuna();

            $sql = "UPDATE EMPLEADO SET nombre = '".$nombre."', fecha_ingreso = '".$fecha_ingreso."', fecha_retiro = '".$fecha_retiro."', salario_basico = '".$salario_basico."', deducion = '".$deduccion."', email = '".$email."', telefono = '".$telefono."', celular = '".$celular."', usuario = '".$usuario."', estado = '".$estado."', barrio = '".$barrio."', comuna = '".$comuna."'";
            
            //Pregunto si va actualizar la imagen o no
            if($this->getFoto() != null){
                $sql .= ", foto = '".$foto."'";
            }

            //Pregunto si va actualizar hoja de vida
            if($this->getHojaVida() != null){
                $sql .= ", hoja_vida = '".$hoja_vida."'";
            }

            $sql .= "WHERE documento = '".$documento."'";

            $edit = $this->db->query($sql);

            $result = false;
            if($edit){
                $result = true;
            }
            return $result;
        }

        public function deleteEmployee($documento){
            $sql = "UPDATE empleado SET estado = 'inactivo' WHERE documento = $documento";
    
            $delete = $this->db->query($sql);
    
            if($delete){
                return true;
            } else {
                return false;
            }
        }



    }

?>