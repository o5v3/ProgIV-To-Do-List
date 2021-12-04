<?php
require_once("./controllers/LoginController.php");
require_once("./controllers/TareaController.php");
require_once("./controllers/UserController.php");

class Router {
    function route($action, $request) {
        switch ($action) {
            //Rutas de Login y Registro
            case "login":
                $controller = new LoginController();
                $view = "login";
            case "login_submit":
                $controller = new LoginController();
                $view = "loginUser";
            case "register":
                $controller = new LoginController();
                $view = "register";
            case "register_submit":
                $controller = new LoginController();
                $view = "registerUser";
            case "logout":
                $controller = new LoginController();
                $view = "logout";
            
            //Rutas de Usuarios
            case "show_users":
                $controller = new UserController();
                $view = "show";
            case "edit_user":
                $controller = new UserController();
                $view = "edit";
            case "edit_user_submit":
                $controller = new UserController();
                $view = "editUser";
            case "delete_user":
                $controller = new UserController();
                $view = "delete";
            case "reset":
                $controller = new UserController();
                $view = "resetPassword";

            //Rutas de Tareas
            case "show_tareas":
                $controller = new TareaController();
                $view = "showByUser";
            case "show_tareas_tag":
                $controller = new TareaController();
                $view = "showByTag";
            case "show_tareas_status":
                $controller = new TareaController();
                $view = "showByStatus";
            case "create_tarea":
                $controller = new TareaController();
                $view = "create";
            case "create_tarea_submit":
                $controller = new TareaController();
                $view = "createTarea";
            case "edit_tarea":
                $controller = new TareaController();
                $view = "edit";
            case "edit_tarea_submit":
                $controller = new TareaController();
                $view = "editTarea";
            case "delete_tarea":
                $controller = new TareaController();
                $view = "delete";

            default:
                $controller = new LoginController();
                $view = "index";
        }
        return $controller->$view($request);
    }
}

?>