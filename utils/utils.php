<?php 
function isAdmin() {
    return $_SESSION["admin"] ?? 0;
}

function isLoggedIn() {
    return $_SESSION["logged_in"] ?? 0;
}

function logout() {
    $_SESSION["logged_in"] = false;
    $_SESSION["admin"] = 0;
    $_SESSION["user_id"] = null;
    $_SESSION["actual_user"] = null;
}

function renderTarea($tarea) {
    $html = "
    <div class='tarea'>
        <h3>".$tarea["name"]."</h3>
        <p>".$tarea["description"]."</p>
        <hr>
        <p>Categoria: ".$tarea["tag"]."</p>
        <p>Status: ".$tarea["status"]."</p>
        <button class='other_button' type='Submit' name='tarea_id' value='".$tarea["ID"]."'>Editar</button>
    </div>
    ";
    return $html;
}

function trimDeleted($tareas) {
    $new_tareas = [];
    foreach ($tareas as $tarea) {
        if (!$tarea['deleted']) {
            $new_tareas[] = $tarea;
        }
    }
    return $new_tareas;
}

function limpiar($entrada) {
    $salida = [];
    foreach ($entrada as $valor) {
        $salida[] = htmlentities(addslashes($valor));
    }
    return $salida;
}
?>