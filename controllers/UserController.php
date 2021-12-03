<?php 
require_once("../utils/utils.php");
require_once("../models/User.php");
class UserController {

    //Lista de usuarios. Solo para Admins.
    public function show($request) {
        if (!isAdmin()) {
            return "No";
        }
        $users = new User();
        $users = $users->readAll();
        return json_encode($users);
    }

    public function edit($request) {
        $user = new User();
        $user = $user->read(limpiar([$request['user_id']])[0]);
        return json_encode($user);
    }

    public function editUser($request) {
        $password = $request['password'] ?? "";
        $user = new User();
        $entrada = limpiar([
            $_SESSION["user"]["ID"],
            $request["username"],
            $password,
            $request["name"],
            $request["lastname"],
            $request["email"],
            $request["profession"],
            $request["level"],
        ]);
        $user->update($entrada[0], $entrada[1], $entrada[2], $entrada[3], $entrada[4], $entrada[5], $entrada[6], $entrada[7]);
        return True;
    }

    public function delete($request) {
        $user = new User();
        $user->delete($request['user_id']);
        return True;
    }

    public function resetPassword($request) {
        $password = "12345678";
        $user = new User();
        $user = $user->read($request["user_id"]);
        $_SESSION["user"]["ID"] = $request["user_id"];
        $request["username"] = $user['username'];
        $request['password'] = $password;
        $request["name"] = $user['name'];
        $request["lastname"] = $user['lastname'];
        $request["email"] = $user['email'];
        $request["profession"] = $user['profession'];
        $request["level"] = $user['level'];
        return True;
    }
}

session_start();
?>