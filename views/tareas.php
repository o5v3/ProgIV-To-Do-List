<?php include_once("../components/header.php");?>
        <div class="agregar">
            <a class="nav_link" href="../controllers/LoginController.php">Cerrar sesión</a>
            <a class="nav_link" href="../views/tareaCreate.php">Agregar Tarea</a>
            <a class="nav_link" href="../views/registrar.php">Registrar Cuenta</a>
            <?php 
            require_once("../utils/utils.php");
            session_start();
            if (!(isLoggedIn())) {
                header("location: ../views/iniciarSesion.php");
            }
            if (isAdmin()) {
                echo '<a class="nav_link" href="../controllers/UserController.php">Administrar Usuarios</a>';
            }
            ?>
        </div>
        <div>
        <form action="../controllers/TareaController.php" method="POST">
                <input type="text" name="valor">
                <button class='search_button' type="submit" name="action" value="readTag">Buscar Por Categoria</button>
                <button class='search_button' type="submit" name="action" value="readStatus">Buscar Por Estatus</button>
            </form>
        </div>
        <div class="tareas">
            <form action="../controllers/TareaController.php" method="POST">
             <?php 
             $_SESSION['action'] = "tareasEdit";
             $tareas = $_SESSION["tareas"] ?? [];
             foreach ($tareas as $tarea) {
                 echo renderTarea($tarea);
             }
             ?>
             </form>
        </div>
<?php include_once("../components/footer.php");?>