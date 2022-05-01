<?php
include("../../Template/headerinit.php");
?>
<main>
    <div class="animate__animated animate__zoomIn">
        <div class="columnas">
            <form action="../../php/login.php" method="POST">
                <div class="col1">
                    <h2>Iniciar Sesion</h2>
                    <div class="columnas">
                        <div class="col1">
                            <label for="email">Correo Electronico:<br>
                                <input class="inp" type="email" name="email" placeholder="example@example.com"><br>
                            </label>
                        </div>
                        <div class="col1">
                            <label for="password">Contraseña<br>
                                <input class="inp" type="password" name="password" placeholder="*********"><br>
                            </label><br>
                        </div>
                        <div class="col4">
                            <a class="info" href="recuperar.php">¿Haz olvidado tu contraseña?</a> <br>
                            <div class="espacio position-relative m-12">
                                <input type="submit" class="espacio position-absolute top-30 start-50 translate-middle  center-block btn btn-primary botonh" value="Iniciar Sesión">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col3">
                <div class="linea"></div>
            </div>
            <form action="../../php/registro.php" method="POST">
                <div class="col2">
                    <h2>Registrarse</h2>
                    <div class="columnas">
                        <div class="col1_1">
                            <label for="name">Nombre:<br>
                                <input class="res" type="name" name="name" placeholder="Jhon " required><br>
                            </label>
                            <label for="email">Correo electrónico:<br>
                                <input class="res" type="email" name="email" placeholder="example@example.com" required><br>
                            </label>

                            <label for="password">Contraseña<br>
                                <input class="res" type="password" name="password" id="password" placeholder="**********" onchange="getValueInput()" required><br>
                                <script>
                                    const getValueInput = () => {
                                        var bandera = 0;
                                        let extraer = document.getElementById("password").value;
                                        if (extraer < 8) {
                                            alert("Elige una contraseña mayor a 8 digitos");
                                            bandera = 0;
                                            window.location.href = "#";

                                        } else {
                                            return bandera = 1;
                                        }
                                    }

                                    function enviar(bandera) {
                                        if (bandera == 1) {
                                            submit();

                                        }
                                    }
                                </script>
                            </label>
                        </div>
                        <div class="col1_1">
                            <label for="name">Apellidos:<br>
                                <input class="res" type="name" name="lastname" placeholder="Doe" required><br>
                            </label>
                            <label for="numero">Numero de telefono:<br>
                                <input class="res" type="tel" name="numero" placeholder="55-4433-2211" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" required passwordrules="required: upper; required: lower; required: digit; 
                 minlength: 25; allowed: [-().&@?'#,/&quot;+]; max-consecutive: 2"><br>
                            </label>
                            <label for="passwordver">Verificar Contraseña<br>
                                <input class="res" type="password" name="passwordver" placeholder="**********" required><br>
                            </label>
                        </div><br>
                        <div class="col4">
                            <label for="terminos">
                                <input type="checkbox" name="terminos" required>
                                <p class="termino"> Acepto los terminos y condiciones.</p>
                            </label>
                            <div class="espacio position-relative m-12">
                                <input type="submit" class="espacio position-absolute top-10 start-50 translate-middle espacio center-block btn btn-primary botonh" onclick="enviar(getValueInput())" value="Registrarse">
                            </div>
                        </div>
                    </div>

            </form>
        </div>
    </div>
</main>
<!--Footer -->
<?php
include("../../Template/footer.php");
?>