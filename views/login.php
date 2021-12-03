<?php include_once("../components/header.php");?>
         <div id="planilla-de-ingreso">
             <form action="../controllers/LoginController.php" method="post">
                <input type="text" name="username">
                <input type="password" name="password">
                <input type="submit" name="action" value="Iniciar Sesion">
            </form>
         </div>
<?php include_once("../components/footer.php");?>