<?php include_once("../components/header.php");?>
        <img src="../assets/imagenes/fondo-registro.png" style="padding-left:19%; padding-top:10%;"/>
        <div id="planilla-registro">
            <form action="../controllers/LoginController.php" method="post">
                <img src="../assets/imagenes/img-registro.png" style="padding-top:10%;padding-left:45%; height: 110px; width: 150px;">
                <label for="Correo-registro" class="label-texto" style="padding-top:10%;">Usuario:</label>
                <input class="cajas-registro" type="text" name="username" value=""style="margin-top:10%;">
                <label for="Correo-registro" class="label-texto" style="padding-top:15%;">Nombre:</label>
                <input class="cajas-registro" type="text" name="name" value=""style="margin-top:15%;">
                <label for="Correo-registro" class="label-texto" style="padding-top:20%;">Apellido:</label>
                <input class="cajas-registro" type="text" name="lastname" value=""style="margin-top:20%;">
                <label for="Correo-registro" class="label-texto" style="padding-top:25%;">Correo:</label>
                <input class="cajas-registro" type="text" name="email" placeholder="Ejemplo231@gmail.com"style="margin-top:25%;">
                <label for="Correo-registro" class="label-texto" style="padding-top:30%;">Profesión:</label>
                <input class="cajas-registro" type="text" name="profession" value=""style="margin-top:30%;">
                <?php 
                require_once("../utils/utils.php");
                session_start();

                if (isAdmin()) {
                    echo '<label for="Correo-registro" class="label-texto" style="padding-top:35%;">Nivel (Regular/Admin):</label>';
                    echo "<input class='cajas-registro' type='radio' name='level' value='0' style='margin-top:35%; margin-left:45%;'>";
                    echo "<input class='cajas-registro' type='radio' name='level' value='1' style='margin-top:35%; margin-left:65%; width:5%;'>";
                }
                ?>
                <label for="contraseña-registro" class="label-texto" style="padding-top:40%;">Contraseña:</label>
                <input class="cajas-registro" type="password" name="password" style="margin-top:40%;">
                <!-- <label for="veri-contraseña" class="label-texto">Verifique contraseña:</label>
                <input class="cajas-registro" type="password" name="samePassword" style="margin-top:45%;"> -->
                <button class="boton-registrar" type="submit" name="action" value="Registrar">REGISTRAR</button>
            </form>
        </div>
<?php include_once("../components/footer.php");?>