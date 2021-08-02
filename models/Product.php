<?php

class Product {
    var $id;
    var $nombreP;
    var $imagen;
    var $estado;
    var $id_proveedor;
    var $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getNombre(){
        return $this->nombreP;
    }

    function setNombre($nombreP){
        $this->nombreP = $nombreP;
    }

    function getImagen(){
        return $this->imagen;
    }

    function setImagen($imagen){
        $this->imagen = $imagen;
    }

    function getEstado(){
        return $this->estado;
    }

    function setEstado($estado){
        $this->estado = $estado;
    }
    
    function getIdProveedor(){
        return $this->id_proveedor;
    }

    function setIdProveedor($id_proveedor){
        $this->id_proveedor = $id_proveedor;
    }

    public function getAll(){
        $sql = "select producto.id, producto.nombreP, producto.imagen, proveedor.nombre from producto INNER JOIN proveedor on producto.id_proveedor = proveedor.documento WHERE producto.estado = 'activo'";

        $product = $this->db->query($sql);

        return $product;
    }

    public function saveProduct(){
        $nombreP = $this->getNombre();
        $imagen = $this->getImagen();
        $id_proveedor = $this->getIdProveedor();

        $sql = "INSERT INTO producto(nombreP, imagen, estado, id_proveedor) VALUES('".$nombreP."', '".$imagen."', 'activo', '".$id_proveedor."')";

        $save = $this->db->query($sql);

        if($save){
            return true;
        } else {
            return false;
        }
    }

    public function getOne(){
        $id = $this->getId();
        $sql = "SELECT * FROM PRODUCTO WHERE id = '".$id."'";
        
        $product = $this->db->query($sql);

        return $product->fetch_object();
    }

    public function editProduct(){
        $id = $this->getId();
        $nombreP = $this->getNombre();
        $imagen = $this->getImagen();
        $estado = $this->getEstado();

        $sql = "UPDATE PRODUCTO SET nombreP = '".$nombreP."', estado = '".$estado."'";
        
        //Pregunto si va actualizar la imagen o no
        if($this->getImagen() != null){
            $sql .= ", imagen = '".$imagen."'";
        }
        $sql .= "WHERE id = '".$id."'";

        $edit = $this->db->query($sql);

        $result = false;
        if($edit){
            $result = true;
        }
        return $result;
    }


    public function deleteProduct($id){
        $sql = "UPDATE producto SET estado = 'inactivo' WHERE id = $id";

        $delete = $this->db->query($sql);

        if($delete){
            return true;
        } else {
            return false;
        }
    }
}