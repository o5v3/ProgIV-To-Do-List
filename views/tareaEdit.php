
<?php session_start();
require_once("../utils/utils.php");
if (!(isLoggedIn())) {
    header("location: ../views/iniciarSesion.php");
}
$tarea = $_SESSION['tarea'] ?? [];
include_once("../components/header.php");?>
        <div id="tarea">
            <form action="../controllers/TareaController.php" method="POST">
                <?php 
                if (isAdmin()) {
                    echo '<label class="label-texto" style="padding-top:10%;">ID de Usuario:</label>';
                    echo '<input class="cajas-registro" type="text" name="user_id" value="'.$tarea['user_ID'].'" style="margin-top:10%;">';
                }
                ?>
                <label class="label-texto" style="padding-top:15%;">Nombre:</label>
                <input class="cajas-registro" type="text" name="name" value="<?php echo $tarea['name'];?>" style="margin-top:15%;">
                <label class="label-texto" style="padding-top:20%;">Descripción:</label>
                <input class="cajas-registro" type="text" name="description" value="<?php echo $tarea['description'];?>" style="margin-top:20%;">
                <label class="label-texto" style="padding-top:25%;">Categoría:</label>
                <input class="cajas-registro" type="text" name="tag" value='<?php echo $tarea['tag'];?>' style="margin-top:25%;">
                <label class="label-texto" style="padding-top:30%;">Estatus (Por Hacer/En Proceso/Finalizado):</label>
                <input class="cajas-registro" type="radio" name="status" value="Por Hacer" style='margin-top:30%; margin-left:55%; width:5%;' <?php echo ($tarea['status'] == "Por Hacer") ? "checked" : "";?>>
                <input class="cajas-registro" type="radio" name="status" value="En Proceso" style='margin-top:30%; margin-left:60%; width:5%;' <?php echo ($tarea['status'] == "En Proceso") ? "checked" : "";?>>
                <input class="cajas-registro" type="radio" name="status" value="Finalizado" style='margin-top:30%; margin-left:65%; width:5%;' <?php echo ($tarea['status'] == "Finalizado") ? "checked" : "";?>>
                <input class="boton-registrar" type="submit" name="action" value="Editar Tarea">
                <input class="boton-registrar" type="submit" name="action" value="BorrarTarea">
            </form>
        </div>
<?php include_once("../components/footer.php");?>