<?php

class Location {
    var $id_ubi;
    var $latitud;
    var $longitud;
    var $usuario;
    var $perfil;
    var $nombre;
    var $db;

    function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id_ubi;
    }

    function setId($id_ubi){
        $this->id_ubi = $id_ubi;
    }

    function getLatitud(){
        return $this->latitud;
    }

    function setLatitud($latitud){
        $this->latitud = $latitud;
    }

    function getLongitud(){
        return $this->longitud;
    }

    function setLongitud($longitud){
        $this->longitud = $longitud;
    }

    function getUsuario(){
        return $this->usuario;
    }

    function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    function getPerfil(){
        return $this->perfil;
    }

    function setPerfil($perfil){
        $this->perfil = $perfil;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function saveLocation(){
        $latitud = $this->getLatitud();
        $longitud = $this->getLongitud();
        $usuario = $this->getUsuario();
        $perfil = $this->getPerfil();
        $nombre = $this->getNombre();

        $sql = "INSERT INTO ubicacion(latitud, longitud, usuario, perfil, nom_usu) VALUES('".$latitud."', '".$longitud."', '".$usuario."', '".$perfil."', '".$nombre."')";

        $locations = $this->db->query($sql);

        if($locations){
            return true;
        } else {
            return false;
        }
    }

    public function getAll(){

        $sql = "SELECT * FROM ubicacion";
        $locations = $this->db->query($sql);

        $this->db->close();

        return $locations;
    }

    public function getClient(){
        $sql = "SELECT * FROM ubicacion WHERE perfil = 'cliente'";
        $locations = $this->db->query($sql);

        $this->db->close();

        return $locations;
    }

    public function getEmployee(){
        $sql = "SELECT * FROM ubicacion WHERE perfil = 'empleado'";
        $locations = $this->db->query($sql);

        $this->db->close();

        return $locations;
    }

    public function getProvideer(){
        $sql = "SELECT * FROM ubicacion WHERE perfil = 'proveedor'";
        $locations = $this->db->query($sql);

        $this->db->close();

        return $locations;
    }
}