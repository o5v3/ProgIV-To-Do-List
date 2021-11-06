<?php 

/* 
    Representa la conexion que tiene el programa con la base de datos.
*/
class DB {
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=todolist", "root", "");
        } catch (Exception $e) {
            //
        }
    }

    public function getDB() {
        return $this->db;
    }
}
?>