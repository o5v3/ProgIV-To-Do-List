<?php 
require_once($_SERVER["DOCUMENT_ROOT"] . "/adolist/config/dbconexion.php");

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
            ":password"=> password_hash($password, PASSWORD_BCRYPT),
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
        $result->execute([":ID"=>$id]);
        return $result->fetch();
    }

    public function readAll() {
        $query = "SELECT * FROM users";
        $result = $this->db->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }

    public function readName($username) {
        $query = "SELECT * FROM users WHERE username = :username";
        $result = $this->db->prepare($query);
        $result->execute([":username"=>$username]);
        return $result->fetch();
    }

    public function update($id, $username, $password, $name, $lastname, $email, $profession, $level) {
        if ($password == "") {
            $query = "UPDATE users SET username = :username, 
            name = :name, lastname = :lastname, email = :email, profession = :profession, level = :level
            WHERE ID = :ID";
            $attributes = [":ID"=>$id,
                ":username"=>$username,
                ":name"=>$name,
                ":lastname"=>$lastname,
                ":email"=>$email,
                ":profession"=>$profession,
                ":level"=>$level];
        } else {
            $query = "UPDATE users SET username = :username, password = :password,
            name = :name, lastname = :lastname, email = :email, profession = :profession, level = :level
            WHERE ID = :ID";
            $attributes = [":ID"=>$id,
                ":username"=>$username,
                ":password"=>password_hash($password, PASSWORD_BCRYPT),
                ":name"=>$name,
                ":lastname"=>$lastname,
                ":email"=>$email,
                ":profession"=>$profession,
                ":level"=>$level];
        }
        

        $resultado = $this->db->prepare($query);
        $resultado->execute($attributes);
    }

    public function delete($id) {
        $query = "DELETE FROM users WHERE ID = :ID";
        $resultado = $this->db->prepare($query);
        $resultado->execute([":ID"=>$id]);
    }
}
?>