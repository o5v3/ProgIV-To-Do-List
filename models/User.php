<?php 
require_once($_SERVER["DOCUMENT_ROOT"] . "config/conexion.php");

class User extends DB {
    public function __construct()
    {
        parent::__construct();
    }

    //Crea un usuario y lo añade a la base de datos.
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

    //Obtiene un usuario de la base de datos.
    public function read($id) {
        $query = "SELECT * FROM users WHERE ID = :ID";
        $result = $this->db->prepare($query);
        $result->execute(array(":ID"=>$id));
        return $result->fetch();
    }

    public function update() {

    }

    public function delete($id) {

    }
}
?>