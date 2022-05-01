<?php
include("../../Template/unavista.php");
?>
<h2 class="animate__animated animate__fadeInUp">Modificar:</h2>
<h2 class="animate__animated animate__fadeInUp">Dirección de Facturación:</h2>
<main class="contenedor centrar animate__animated animate__fadeInUp">

    <div class="columnas">
        <div class="col4">
            <?php
            $query = "SELECT * FROM direccion WHERE iduser=$id";
            $consulta = mysqli_query($connect, $query);
            $row = mysqli_fetch_array($consulta);
            $id_direccion = $row['id_direccion'];
            ?>
            <form action="../../php/cambiardir.php" method="POST">
                <div class="columnas">
                    <div class="col1">
                        <label for="id">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                        </label>
                        <label for="calle">Calle:<br>
                            <input class="inp " type="text" name="calle" placeholder="Calle mirasoles" required>
                        </label> <br>
                        <label for="exterior">Exterior:<br>
                            <input class="inp" type="text" name="exterior" placeholder="65" required>
                        </label><br>
                        <label for="exterior">Interior:<br>
                            <input class="inp" type="text" name="interior" placeholder="12">
                        </label><br>
                    </div>
                    <div class="col2">
                        <label for="estado">Estado:<br>
                            <select class="inp" name="estado">
                                <option selected>Seleccione el estado</option>
                                <?php
                                $query = "SELECT id_estado, estado FROM estados";
                                $consulta = mysqli_query($connect, $query);
                                while ($row = mysqli_fetch_array($consulta)) {
                                ?>
                                    <option value="<?php echo $row['id_estado'] ?>"><?php echo $row['estado'] ?></option>
                                <?php }
                                mysqli_free_result($consulta); ?>
                            </select>
                        </label><br>
                        <label for="colonia">Colonia:<br>
                            <input class="inp" type="text" name="colonia" placeholder="Cerro Gordo" required>
                        </label><br>
                        <label for="codigo_postal">Codigo Postal:<br>
                            <input class="inp" type="text" name="codigo_postal" placeholder="06254" required>
                        </label><br>
                    </div>
                </div>
                <div class="espacio position-relative m-12">
                    <input type="submit" class="espacio position-absolute top-10 start-50 translate-middle espacio center-block btn btn-primary botonh" value="Guardar Dirección">
                </div>
            </form>
        </div>
    </div>
</main>
<!--Footer -->
<?php
include("../../Template/footer.php");
?>