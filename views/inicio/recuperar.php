<?php
include('../../Template/headerinit.php');
?>
<main class="contenedor centrar ">
    <div class="animate__animated animate__zoomIn">
    <h2>Recuperar Contraseña</h2> <br>
        <form action="../../php/recuperar.php" method="POST">
            <label for="email">Correo Electronico:<br>
                <input class="inp" type="email" name="email"><br>
            </label>
            <div class="espacio position-relative m-12">
                <input type="submit" class="espacio position-absolute top-10 start-50 translate-middle  center-block  btn btn-primary botonh" value="Enviar">
            </div>
        </form>
    </div>
</main>
<!--Footer -->
<?php
include('../../Template/footer.php');
?>