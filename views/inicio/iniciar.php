<?php 
    include("../../Template/headerinit.php");
?>
<main class="contenedor animate__animated animate__bounce">
    <div class="contenido">
        <div class="iniciar">
            <h2>Iniciar Sesion</h2>
            <form action="../../php/login.php" method="POST">
                <div class="formulario">
                    <label  for="email">Correo Electronico:<br>
                        <input class="inp" type="email" name="email"><br>
                    </label>
                    <label for="password">Contraseña<br>
                        <input class="inp" type="password" name="password"><br>
                    </label><br>
                    <a href="recuperar.php">¿Haz olvidado tu contraseña?</a>
                </div>
                <input type="submit" class="btn btn-primary botonh"value="Iniciar Sesion"><br>
            </form>
        </div>
        <div class="linea"></div>
        <div  class="iniciar">
                <h2>Registrarse</h2>
            
            <div class="registro">
                <form action="../../php/registro.php" method="POST">
                        <label for="name">Nombre:<br>
                            <input class="inp" type="name" name="name" placeholder="Jhon "required><br>
                        </label>
                        <label for="name">Apellidos:<br>
                            <input class="inp" type="name" name="lastname" placeholder="Doe"required><br>
                        </label>
                        <label for="numero">Numero de telefono:<br>
                            <input class="inp" type="tel" name="numero" placeholder="55-4433-2211"  pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}"required><br>
                        </label>
                        <label for="email">Correo electrónico:<br>
                            <input class="inp" type="email" name="email" placeholder="example@example.com" required><br>
                        </label>
                        <label for="password">Contraseña<br>
                                <input class="inp" type="password" name="password" placeholder="**********"required><br>
                        </label>
                            <label for="passwordver">Verificar Contraseña<br>
                                <input class="inp" type="password" name="passwordver" placeholder="**********"required><br>
                            </label>
                        <div class="form-group">
                            <input type="checkbox" name="terminos"required><p class="termino"> Acepto los terminos y condiciones</p>
                        </div>
                        <input type="submit" class="btn btn-primary botonh" name="Registrarse" value="Registrarse" >
                        <?php
                        if (isset($_POST['Registrarse'])) {
                            if (isset($_POST['terminos']) && $_POST['terminos'] == '1')
                                echo '<div class="alert alert-success">Has aceptado correctamente las condiciones de uso.</div>';
                            else
                                echo '<div class="alert alert-danger">Debes aceptar las condiciones de uso.</div>';
                        }
                        ?>
                </form>
            </div>
        </div>
    </div>
</main>
    <!--Footer -->
    <?php 
    include("../../Template/footer.php");
?>