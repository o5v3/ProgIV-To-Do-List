<?php include_once("../components/header.php");?>
    <div>
        <a href="../views/tareas.php">Volver</a>
    </div>
    <div class="usuarios">
    <?php 
    session_start();
    require_once("../utils/utils.php");
    if ((!(isLoggedIn())) && (!(isAdmin()))) {
        header("location: ../views/tareas.php");
    }
    $users = $_SESSION['users'] ?? [];
    foreach ($users as $user) {
        echo "
        <div class='usuario'>
        <form action='../controllers/UserController.php' method='POST'>
            <h3>".$user['username']."</h3>
            <p>".$user['name'].", ".$user['lastname']."</p>
            <input type='hidden' name='user_id' value='".$user['ID']."'>
            <button type='submit' name='action' value='edit'>Edit</button>
            <button type='submit' name='action' value='tareas'>Tareas</button>
            <button type='submit' name='action' value='reset'>Reset Password</button>
            <button type='submit' name='action' value='delete'>Delete</button>
        </form>
        </div>
        ";
    }
    ?>
   </div>
<?php include_once("../components/footer.php");?>