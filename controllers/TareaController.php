<?php
require_once("./models/Tarea.php");
require_once("./utils/utils.php");

class TareaController {
    public function index() {
        if (isLoggedIn()) {
            $user_id = $_SESSION["user_id"] ?? null;
            if (isAdmin()) {
                $search = "admin";
            } else {
                $search = $user_id;
            }
            if ($user_id != null) {
                $tarea = new Tarea();
                if (($_REQUEST["action"] ?? false) == "readTag") {
                    $tareas = $tarea->readByTag(limpiar([$_REQUEST["valor"]])[0], $search);
                } else if (($_REQUEST["action"] ?? false) == "readStatus") {
                    $tareas = $tarea->readByStatus(limpiar([$_REQUEST["valor"]])[0], $search);
                } else {
                    $tareas = $tarea->readByUser($user_id);
                }
                $tareas = trimDeleted($tareas);
                $_SESSION['tareas'] = $tareas;
            }
        }
        return $tareas;
        header("location: ./views/tareas.php");
    }

    public function showByUser($request)
    {
        $tarea = new Tarea();
        $tareas = $tarea->readByUser($request["user_id"]);
        $tareas = trimDeleted($tareas);
        return json_encode($tareas);
    }

    public function showByTag($request)
    {
        $user_id = $_SESSION["user_id"] ?? null;
            if (isAdmin()) {
                $search = "admin";
            } else {
                $search = $user_id;
            }
        $tarea = new Tarea();
        $tareas = $tarea->readByTag($request["user_id"], $search);
        $tareas = trimDeleted($tareas);
        return json_encode($tareas);
    }

    public function showByStatus($request)
    {
        $user_id = $_SESSION["user_id"] ?? null;
            if (isAdmin()) {
                $search = "admin";
            } else {
                $search = $user_id;
            }
        $tarea = new Tarea();
        $tareas = $tarea->readByStatus($request["user_id"], $search);
        $tareas = trimDeleted($tareas);
        return json_encode($tareas);
    }

    public function create($request) {
        return include "./views/tareaCreate.php";
    }

    public function createTarea($request)
    {
        $tarea = new Tarea();
        $entrada = limpiar([
            $_SESSION["user_id"],
            $request["name"],
            $request["description"],
            $request["tag"],
            $request["status"],
            ]);
            foreach ($entrada as $e) {
                if ($e == null || $e == "") {
                    return False;
                }
            }
        $tarea->create($entrada[0], $entrada[1], $entrada[2], $entrada[3], $entrada[4]);
        return True;
    }

    //Pagina donde se edita una tarea.
    public function edit($request) {
        $tarea = new Tarea();
        return json_encode($tarea->read($request['tarea_id']));
    }

    public function editTarea($request) {
        $tarea = new Tarea();
        $user_id = $request['user_id'] ?? $_SESSION["user_id"];
        $entrada = limpiar([
            $_SESSION["tarea"]["ID"],
            $user_id,
            $request["name"],
            $request["description"],
            $request["tag"],
            $request["status"],
            ]);
            foreach ($entrada as $e) {
                if ($e == null || $e == "") {
                    return False;
                }
            }
        $tarea->update($entrada[0], $entrada[1], $entrada[2], $entrada[3], $entrada[4], $entrada[5]);
        return True;
    }

    public function delete($request) {
        $tarea = new Tarea();
        $entrada = limpiar([$_SESSION["tarea"]["ID"]]);
        $tarea->delete($entrada[0]);
        return True;
    }
}
?>