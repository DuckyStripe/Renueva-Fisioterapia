<?php 
    $id=$_POST['id'];
    $fecha=$_POST['fecha'];
    $retorno=$_POST['retorno'];
?>

<main class="contenedor centrar">
    <div class="animate__animated animate__zoomIn">
    <h2 class="animate__animated animate__fadeInUp">AGENDAR CITA</h2>
        <form action="../../php/agendar.php" method="POST">
            <label for="fecha">
                <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
                <input hidden type="text" name="retorno" id="retorno"value="<?php echo $retorno ?>">
                <input type="hidden" name="id" value="<?php echo $id ?>">
            </label>
            <label for="name">Hora:*<br>
                <select class="inp" name="horario" required>
                    <option value="" selected>Seleccione la hora</option>
                    <?php
                    $query = "SELECT idhora, hora FROM hora WHERE idhora NOT IN (SELECT a.idhora from hora a inner JOIN citas b ON a.idhora = b.idhora WHERE b.fecha = '$fecha');";
                    $consulta = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($consulta)) {
                    ?>
                        <option value="<?php echo $row['idhora'] ?>"><?php echo $row['hora'] ?></option>
                    <?php }
                    mysqli_free_result($consulta); ?>
                </select>
            </label><br>
            <label for="name">Servicio:*<br>
                <select class="inp" name="servicio" required>
                    <option value="" selected>Seleccione el servicio:</option>
                    <?php
                    $query = "SELECT id_servicio, servicio FROM servicios";
                    $consulta = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($consulta)) {
                    ?>
                        <option value="<?php echo $row['id_servicio'] ?>"><?php echo $row['servicio'] ?></option>
                    <?php }
                    mysqli_free_result($consulta); ?>
                </select>
            </label><br>
            </label>
            <label for="text">Comentarios:*<br>
                <textarea class="comment inp" type="text" name="comentario" placeholder="Explique su molestia" value="" required></textarea><br>
            </label><br>
            <div class="espacio position-relative m-12">
                <input type="submit" class="espacio position-absolute top-10 start-50 translate-middle  btn btn-primary botonh" value="Agendar">
            </div>

        </form>

    </div>
</main>