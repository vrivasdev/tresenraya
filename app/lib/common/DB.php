<?php

class DB {
    
    // Contendor de la conexión
    var $db;
    
    function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "123";
        $name = "tresenraya";

        try {
            $this->db = new PDO("mysql:host=$servername;dbname=$name", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo $e.getMessage();
        }
    }
    
    function obtenerCon() {
        
        return $this->db;
        
    }
    
    function __destruct() {
        
        $this->db = NULL;
        
    }
}

?>
