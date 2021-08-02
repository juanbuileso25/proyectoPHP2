<?php

class Commune {
    var $id_comuna;
    var $nombre_comuna;
    var $db;

    function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id_comuna;
    }

    function setId($id_comuna){
        $this->id_comuna = $id_comuna;
    }

    function getNomComuna(){
        return $this->nombre_comuna;
    }

    function setNomComuna(){
        $this->nombre_comuna = $nombre_comuna;
    }

    public function getOne($id){
        $sql = "SELECT nombre_comuna FROM comunas WHERE id_comuna = '".$id."'";

        $consulta = $this->db->query($sql);

        $name = $consulta->fetch_assoc()['nombre_comuna'];

        return $name;
    }

}