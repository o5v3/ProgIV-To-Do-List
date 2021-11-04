<?php 
require_once($_SERVER["DOCUMENT_ROOT"] . "config/conexion.php");

class User extends DB {
    public function __construct()
    {
        parent::__construct();
    }

    public function create($username, $password, $name, $lastname, $email, $profession, $level) {
        $query = "INSERT INTO users (username, password, name, lastname, email, profession, level)
        VALUES (:username, :password, :name, :lastname, :email, :profession, :level)";

        $atributes = [
            ":username"=>$username,
            ":password"=>$password,
            ":name"=>$name,
            ":lastname"=>$lastname,
            ":email"=>$email,
            ":profession"=>$profession,
            ":level"=>$level
        ];

        $this->db->prepare($query)->execute($atributes);
    }
}
?>