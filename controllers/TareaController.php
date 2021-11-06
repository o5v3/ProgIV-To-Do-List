<?php 
class TareaController {
    //Pagina principal con las tareas.
    public function index() {
        header("../views/tareas.php");
    }

    //Pagina donde se edita una tarea.
    public function edit() {
        header("../views/tareasEdit.php");
    }
}
?>