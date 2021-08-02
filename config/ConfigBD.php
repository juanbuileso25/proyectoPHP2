<?php 

    class Database {

        static function connect(){
            $db = new mysqli('localhost', 'root', '', 'bdproyectoaula1');
            $db->query("SET NAMES 'utf8'");
            return $db;
        }
    
    }
