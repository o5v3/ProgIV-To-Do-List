<?php 
require_once($_SERVER["DOCUMENT_ROOT"] . "/adolist/config/dbconexion.php");

class Tarea extends DB {
    public function __construct()
    {
        parent::__construct();
    }

    //Crea una tarea y la inserta en la base de datos.
    public function create($user_ID, $name, $description, $tag, $status) {
        $query = "INSERT INTO tareas (user_ID, name, description, tag, status, creation_date, update_date, delete_date)
        VALUES (:user_ID, :name, :description, :tag, :status, :creation_date, :update_date, :delete_date)";

        $atributes = [
            ":user_ID"=>$user_ID,
            ":name"=>$name,
            ":description"=>$description,
            ":tag"=>$tag,
            ":status"=>$status,
            ":creation_date"=>date("Y-m-d H:i:s"),
            ":update_date"=>date("Y-m-d H:i:s"),
            ":delete_date"=>NULL,
        ];

        $this->db->prepare($query)->execute($atributes);
    }

    //Lee una tarea de la base de datos.
    public function read($id) {
        $query = "SELECT * FROM tareas WHERE ID = :ID";
        $result = $this->db->prepare($query);
        $result->execute([":ID"=>$id]);
        return $result->fetch();
    }

    public function readByUser($user_id) {
        $query = "SELECT * FROM tareas WHERE user_id = :user_id";
        $result = $this->db->prepare($query);
        $result->execute([":user_id"=>$user_id]);
        return $result->fetchAll();
    }

    public function readByTag($tag, $user) {
        if ($user == 'admin') {
            $query = "SELECT * FROM tareas WHERE tag = :tag";
            $result = $this->db->prepare($query);
            $result->execute([":tag"=>$tag]);
        } else {
            $query = "SELECT * FROM tareas WHERE tag = :tag AND user_id = :user_id";
            $result = $this->db->prepare($query);
            $result->execute([":tag"=>$tag, ":user_id"=>$user]);
        }
        return $result->fetchAll();
    }

    public function readByStatus($status, $user) {
        if ($user == 'admin') {
            $query = "SELECT * FROM tareas WHERE status = :status";
            $result = $this->db->prepare($query);
            $result->execute([":status"=>$status]);
        } else {
            $query = "SELECT * FROM tareas WHERE status = :status AND user_id = :user_id";
            $result = $this->db->prepare($query);
            $result->execute([":status"=>$status, ":user_id"=>$user]);
        }
        return $result->fetchAll();
    }

    public function update($id, $user_id, $name, $description, $tag, $status) {
        $query = "UPDATE tareas SET user_ID = :user_ID, name = :name, description = :description, tag = :tag, status = :status, update_date = :update_date
        WHERE ID = :ID";

        $resultado = $this->db->prepare($query);
        $resultado->execute([":ID"=>$id,
        ":user_ID"=>$user_id,
        ":name"=>$name,
        ":description"=>$description,
        ":tag"=>$tag,
        ":status"=>$status,
        ":update_date"=>date("Y-m-d H:i:s")]);
    }

    public function delete($id) {
        $query = "UPDATE tareas SET update_date = :update_date, delete_date = :delete_date, deleted = :deleted WHERE ID = :ID";
        $resultado = $this->db->prepare($query);
        $resultado->execute([":update_date"=>date("Y-m-d H:i:s"), ":delete_date"=>date("Y-m-d H:i:s"), ":deleted"=>true, ":ID"=>$id]);
    }
}
?>