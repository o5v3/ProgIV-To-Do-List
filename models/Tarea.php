<?php 
require_once($_SERVER["DOCUMENT_ROOT"] . "config/conexion.php");

class Tarea extends DB {
    public function __construct()
    {
        parent::__construct();
    }

    //Crea una tarea y la inserta en la base de datos.
    public function create($user_ID, $name, $description, $tag, $status) {
        $query = "INSERT INTO tareas (user_ID, name, description, tag, status)
        VALUES (:user_ID, :name, :description, :tag, :status)";

        $atributes = [
            ":user_ID"=>$user_ID,
            ":name"=>$name,
            ":description"=>$description,
            ":tag"=>$tag,
            ":status"=>$status
        ];

        $this->db->prepare($query)->execute($atributes);
    }

    //Lee una tarea de la base de datos.
    public function read($id) {
        $query = "SELECT * FROM tareas WHERE ID = :ID";
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