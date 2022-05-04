<div class="columnas">
    <h2 class="animate__animated animate__fadeInUp">PRODUCTO:</h2><br>
    <h2 class="animate__animated animate__fadeInUp">Nuevo Producto</h2>
</div>
<main class="contenedor centrar">
    <div class="animate__animated animate__zoomIn">
        <form action="../../php/nuevoproducto.php" method="POST" enctype="multipart/form-data">
            <div class="col1_111">
                <label for="img">Subir Imagen:
                    <div class="file-select" id="img">
                        <input required type="file" name="img" id="img" aria-label="Archivo">
                    </div>
                </label>
                <script>
                    function actualizarInputFile() {
                        var filename = "'" + this.value.replace(/^.*[\\\/]/, '') + "'";
                        this.parentElement.style.setProperty('--fn', filename);
                    }

                    document.querySelectorAll(".file-select input").forEach((ele) => ele.addEventListener('change', actualizarInputFile));
                </script>
            </div>
            <div class="columnas">
                <div class="col1_111">
                    <label for="name">Nombre del producto:<br>
                        <input required class="ress" type="name" name="producto" id="producto"><br>
                    </label>
                    <label for="categoria">Categoria:<br>
                        <select class="ress" name="categoria" id="categoria">
                            <option selected value="0">Selecciona una categoria</option>
                            <?php
                            $query = "SELECT * FROM categoria ;";
                            $consulta = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_array($consulta)) {
                            ?>
                                <option value="<?php echo $row['id_categoria'] ?>"><?php echo $row['nombre_cat'] ?></option>
                            <?php }
                            mysqli_free_result($consulta); ?>
                        </select>
                    </label>
                    <label for="preciocosto">Precio Costo:<br>
                        <input required class="ress" type="number" name="precioCosto" id="precioCosto"><br>
                    </label>
                </div>
                <div class="col1_111">
                    <label for="inv">Inventario Total:<br>
                        <input required class="ress" type="number" name="invtotal" id="invtotal"><br>
                    </label>
                    <label for="fecha">Fecha Inventario:<br>
                        <input disabled class="ress" type="text" name="fecha" id="fecha" value="<?php echo date('d-m-Y') ?>"><br>
                    </label>
                    <label for="preciov">Precio Venta:<br>
                        <input required class="ress" type="number" name="precioVenta" id="precioVenta"><br>
                    </label>
                </div>

                <div class="columnas">
                    <div class="col9">
                        <label for="email">Descripcion:<br>
                            <input required class="ress" type="text" name="descripcion" id="descripcion"><br>
                        </label>
                    </div>
                    <div class="col5">
                        <input type="submit" class=" btn btn-primary botonh" value="Crear">
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>