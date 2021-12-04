<?php 
require_once("./models/User.php");
require_once("./utils/utils.php");
class LoginController {

    //Muestra pagina de login.
    public function index($request) {
        return include "./views/index.php";
    }

    public function login($request) {
        return include "./views/login.php";
    }

    //Realiza el proceso de iniciar sesión.
    public function loginUser($request) {
        $user = new User();
        session_start();
        $credentials = limpiar([$request['username'], $request['password']]);
        $usuario = $user->readName($credentials[0]);
        if (password_verify($credentials[1], $usuario['password'])) {
            $_SESSION["logged_in"] = true;
            $_SESSION["admin"] = $usuario['level'];
            $_SESSION["user_id"] = $usuario['ID'];
            $_SESSION["actual_user"] = $usuario['ID'];
            $_SESSION["action"] = "tareas";
            return True;
        } else {
            return False;
        }
    }

    //Muestra la página de registro.
    public function register($request) {
        return include "./views/registrar.php";
    }

    public function registerUser($request) {
        $user = new User();
        if (isAdmin()) {
            $level = $request["level"];
        } else {
            $level = 0;
        }
        $entrada = limpiar([
            $request["username"],
            $request["password"],
            $request["name"],
            $request["lastname"],
            $request["email"],
            $request["profession"],
            $level
            ]);
        foreach ($entrada as $e) {
            if ($e == null || $e == "") {
                return False;
            }
        }

        $user->create($entrada[0], $entrada[1], $entrada[2], $entrada[3], $entrada[4], $entrada[5], $entrada[6]);
        return True;
    }

    public function logout($request) {
        logout();
        return True;
    }
}
?>