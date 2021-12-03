<?php include_once("../components/header.php");?>
         <div id="planilla-de-ingreso">
             <form action="../controllers/LoginController.php" method="post">
                <input type="text" name="username">
                <input type="password" name="password">
                <input type="text" name="name">
                <input type="text" name="lastname">
                <input type="email" name="email">
                <input type="text" name="profession">
                <?php 
                require_once("../utils/utils.php");
                session_start();

                if (isAdmin()) {
                    echo "<input type='radio' name='level' value='0'>";
                    echo "<input type='radio' name='level' value='1'>";
                }
                ?>
                <input type="submit" name="action" value="Registrar">
            </form>
         </div>
<?php include_once("../components/footer.php");?>