<?php 
class LoginController {
    //Muestra pagina de login.
    public function index() {
        header("location: ../views/login.php");
    }

    //Realiza el proceso de iniciar sesión.
    public function loginUser() {

    }

    //Muestra la página de registro.
    public function register() {
        header("location: ../views/register.php");
    }
}
?>