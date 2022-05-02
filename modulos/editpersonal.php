<?php
    $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $combLen = strlen($comb) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $combLen);
        $pass[] = $comb[$n];
    }
    $Apass = implode($pass);
    $password = $Apass;
    $passwordver = $Apass;
    ?>
<main class="contenedor centrar">
    <h2 class="animate__animated animate__fadeInUp">PERFIL:</h2>
    <h3 class="animate__animated animate__fadeInUp">Informacion Personal</h3>
    <div class="centrar animate__animated animate__zoomIn">
        <div class="columnas">
            <div class="col1t">
                <h4 class="">Nombre:<?php echo " " . $nombre ?></h4>
                <h4 class="">Apellidos:<?php echo " " . $Apellido ?></h4>
            </div>
            <div class="col2t">
                <h4 class="">Correo:<?php echo " " . $Email ?></h4>
                <h4 class="">Telefono:<?php echo " " . $telefono ?></h4>
            </div>
        </div>
        <h2 class="animate__animated animate__fadeInUp">Cambiar Contraseña:</h2><br>
        <form action="../../php/cambiarCon.php" method="POST">
            <div class="columnas">
                <div class="col1">
                    <label for="id">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                    </label>
                    <label for="password">Contraseña:<br>
                        <input class="inp" type="password" name="password" placeholder="**********" required><br>
                    </label>
                </div>
                <div class="col2">
                    <label for="passwordver">Verifica Contraseña:<br>
                        <input class="inp" type="password" name="password" placeholder="**********" required><br>
                    </label>
                </div>
            </div>
            <div class="espacio position-relative m-12">
                <input type="submit" class="espacio position-absolute top-10 start-50 translate-middle espacio center-block btn btn-primary botonh" value="Cambiar Contraseña">
            </div>
        </form>
        <div class="columnas">
            <form action="../../php/registropersonal.php" method="POST">
                <h2 class="espacio">Registrar Personal</h2>
                <div class="col1_11">
                    <label for="name">Nombre:<br>
                        <input type="hidden" name="password" value="<?php echo $password ?>">
                        <input type="hidden" name="passwordver" value="<?php echo $passwordver ?>">
                        <input class="ress" type="name" name="name" placeholder="Jhon " required><br>
                    </label>
                    <label for="email">Correo electrónico:<br>
                        <input class="ress" type="email" name="email" placeholder="example@example.com" required><br>
                    </label>
                    <label for="name">Rol:*<br>
                        <select class="ress" name="rol" required>
                            <option value="" selected>Seleccione un rol</option>
                            <?php
                            $query = "SELECT * FROM rol;";
                            $consulta = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_array($consulta)) {
                            ?>
                                <option value="<?php echo $row['id_rol'] ?>"><?php echo $row['rol'] ?></option>
                            <?php }
                            mysqli_free_result($consulta); ?>
                        </select>
                    </label><br>
                </div>
                <div class="col1_11">
                    <label for="name">Apellidos:<br>
                        <input class="ress" type="name" name="lastname" placeholder="Doe" required><br>
                    </label>
                    <label for="numero">Numero de telefono:<br>
                        <input class="ress" type="tel" name="numero" placeholder="55-4433-2211" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" required><br>
                    </label>
                </div><br>
                <label>Contraseña:
                    <h2><?php echo $password ?></h2>
                </label>

                <div class="col4">

                    <div class="espacio position-relative m-12">
                        <input type="submit" class=" position-absolute top-20 start-50 translate-middle  center-block btn btn-primary botonh" value="Registrar">
                    </div>
                </div>
            </form>
        </div>

    </div>
</main>