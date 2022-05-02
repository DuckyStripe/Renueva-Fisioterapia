<main>
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
    $retorno = "registro";
    ?>
    <div class="animate__animated animate__zoomIn">
        <div class="columnas">
            <form action="../../php/registro.php" method="POST">
                <h2 class="espacio">REGISTRAR CLIENTE:</h2>
                <div class="col1_11">
                    <label for="name">Nombre:<br>
                        <input type="hidden" name="password" value="<?php echo $password ?>">
                        <input type="hidden" name="passwordver" value="<?php echo $passwordver ?>">
                        <input type="hidden" name="retorno" value="<?php echo $retorno ?>">
                        <input class="ress" type="name" name="name" placeholder="Jhon " required><br>
                    </label>
                    <label for="email">Correo electrónico:<br>
                        <input class="ress" type="email" name="email" placeholder="example@example.com" required><br>
                    </label>
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
        </div>

        </form>
    </div>
    </div>
</main>