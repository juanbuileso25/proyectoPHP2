<?php

class Notification {
    var $id_not;
    var $descripcion;
    var $fecha;
    var $usuarioN;
    var $estado;
    var $db; 

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id_not;
    }

    public function setId($id_not){
        $this->id_not = $id_not;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getUsuario(){
        return $this->usuarioN;
    }

    public function setUsuario($usuarioN){
        $this->usuarioN = $usuarioN;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function save(){
        $descripcion = $this->getDescripcion();
        $usuarioN = $this->getUsuario();

        $sql = "INSERT INTO notificaciones(descripcion, fecha, usuarioN, estado) VALUES('".$descripcion."', SYSDATE(), '".$usuarioN."', 'activo')";
        $notificacion = $this->db->query($sql);

        if($notificacion){
            return true;
        } else {
            return false;
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM notificaciones WHERE estado = 'activo'";

        $notifications = $this->db->query($sql);

        return $notifications;
    }

    public function updateState(){

        $id = $this->getId();

        $sql = "UPDATE notificaciones SET estado = 'inactivo' WHERE id_not ='".$id."'";

        $upd = $this->db->query($sql);
    }

    public function getNotifications(){
        $sql = "SELECT * FROM notificaciones WHERE estado = 'activo'";

        $notifications = $this->db->query($sql);

        $quantity = mysqli_num_rows($notifications);

        return $quantity;
    }

    public function notificationRequest($nombre){
        $sql = "SELECT * FROM notificaciones WHERE usuarioN = '".$nombre."'";
        $request = $this->db->query($sql);

        if($request){

            return $request;
        } else {
            return false;
        }
    }

}