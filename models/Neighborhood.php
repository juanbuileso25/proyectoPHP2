<?php

class Neighborhood {
    var $id_barrio;
    var $nom_barrio;
    var $id_comuna;
    var $db;

    function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id_barrio;
    }

    function setId($id_barrio){
        $this->id_barrio = $id_barrio;
    }

    function getNomBarrio(){
        return $this->nom_barrio;
    }

    function setNomBarrio($nom_barrio){
        $this->nom_barrio = $nom_barrio;
    }

    function getIdComuna(){
        return $this->id_comuna;
    }

    function setIdComuna($id_comuna){
        $this->id_comuna = $id_comuna;
    }

    public function getAll(){
        $sql = "SELECT * FROM barrios ORDER BY nom_barrio";

        $neigh = $this->db->query($sql);

        return $neigh;
    }

    public function getIdCommune($barrio){
        $sql = "SELECT id_comuna FROM barrios WHERE nom_barrio = '".$barrio."'";

        $consulta = $this->db->query($sql);

        $id = $consulta->fetch_assoc()['id_comuna'];

        return $id;
    }
}