<?php 
class UserController {
    //Lista de usuarios. Solo para Admins.
    public function index() {
        header("../views/userList.php");
    }
}
?>