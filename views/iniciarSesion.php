<?php include_once("../components/header.php");?>
          <div class="planilla-inicio">
            <form action="../controllers/LoginController.php" method="post">
                <img src="../assets/imagenes/imagen-usu-iniciosesion.png" style='margin-left:18%;'>
                <p class="texto-ini-sesion">
                <label style="padding-bottom: 30px; display:inline-block;">Usuario:</label> <input type="text" name="username" class="caja-iniciosesion"> <br>
                <label id="label-contrasena">Contraseña:</label><input id="input-contraseña" type="password" name="password" class="caja-iniciosesion">
                <Button class="bot-inicio" type="submit" name="action" value="Iniciar Sesion">Iniciar Sesion</Button>
                </p>
            </form>
          </div>
<?php include_once("../components/footer.php");?>