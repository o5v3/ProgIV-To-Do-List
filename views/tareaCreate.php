<?php include_once("../components/header.php");
require_once("../utils/utils.php");
session_start();
if (!(isLoggedIn())) {
    header("location: ../views/iniciarSesion.php");
}
?>
        <div id="tarea">
            <form action="../controllers/TareaController.php" method="POST">
                <label class="label-texto" style="padding-top:10%;">Nombre:</label>
                <input class="cajas-registro" type="text" name="name" style="margin-top:10%;">
                <label class="label-texto" style="padding-top:15%;">Descripción:</label>
                <input class="cajas-registro" type="text" name="description" style="margin-top:15%;">
                <label class="label-texto" style="padding-top:20%;">Categoría:</label>
                <input class="cajas-registro" type="text" name="tag" style="margin-top:20%;">
                <label class="label-texto" style="padding-top:25%;">Estatus (Por Hacer/En Proceso/Finalizado):</label>
                <input class="cajas-registro" type="radio" name="status" value="Por Hacer" style='margin-top:25%; margin-left:55%; width:5%;'>
                <input class="cajas-registro" type="radio" name="status" value="En Proceso" style='margin-top:25%; margin-left:60%; width:5%;'>
                <input class="cajas-registro" type="radio" name="status" value="Finalizado" style='margin-top:25%; margin-left:65%; width:5%;'>
                <input class="boton-registrar" type="submit" name="action" value="Crear Tarea">
            </form>
        </div>
<?php include_once("../components/footer.php");?>