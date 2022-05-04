<?php
$id = $_GET['id'];

$query1 = "SELECT * FROM articulod a INNER JOIN categoria b ON a.id_categoria = b.id_categoria WHERE a.Ar_id=$id;";
$consulta1 = mysqli_query($connect, $query1);
$row1 = mysqli_fetch_array($consulta1);

$idcategoria = $row1['id_categoria'];
$categoria = $row1['nombre_cat'];
$ganancia = $row1['ganancia'];
$descripcion = $row1['Ar_descripcion'];
$precioVenta = $row1['Ar_precioVenta'];
$nombre = $row1['Ar_nombre'];
$stock = $row1['Ar_stock'];
$precioCosto = $row1['Ar_precioCosto'];
$img = $row1['img'];
$fechainv = $row1['inv_date'];

?>

<h2 class="animate__animated animate__fadeInUp">PRODUCTO:</h2>
<h2 class="animate__animated animate__fadeInUp">Editar Producto</h2>
<div class="col6">
    <?php echo '<img height="300" width="300" src="data:image/jpeg;base64,' . base64_encode($img) . '"/>'; ?>
</div>
<main class="contenedor centrar">
    <div class="animate__animated animate__zoomIn">
        <form action="../../php/editproducto.php" method="POST" enctype="multipart/form-data">
            <div class="col1_111">
                <label for="img">Subir Imagen:
                    <div class="file-select" id="img">
                        <input type="file" name="img" id="img" aria-label="Archivo">
                    </div>
                </label>
                <script>
                    function actualizarInputFile() {
                        var filename = "'" + this.value.replace(/^.*[\\\/]/, '') + "'";
                        this.parentElement.style.setProperty('--fn', filename);
                    }

                    document.querySelectorAll(".file-select input").forEach((ele) => ele.addEventListener('change', actualizarInputFile));
                </script>
                <div class="columnas">
                    <label for="imagen">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                    </label>
                    <div class="col1_111">
                        <label for="name">Nombre del producto:<br>
                            <input class="ress" type="name" name="producto" id="producto" value="<?php echo $nombre ?>"><br>
                        </label>
                        <label for="ganancia">Ganancia:<br>
                            <input disabled class="ress" type="name" name="ganancia" id="ganancia" value="<?php echo $ganancia ?>"><br>
                        </label>
                        <label for="email">Categoria:<br>
                            <select class="ress" name="categoria" id="categoria">
                                <option selected value="<?php echo $idcategoria ?>"><?php echo $categoria ?></option>
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
                            <input required class="ress" type="text" name="precioCosto" id="precioCosto" value="<?php echo  $precioCosto ?>"><br>
                        </label>
                        <label for="Ainventario">Agregar o Eliminar Inventario:<br>
                            <input class="ress" type="number" name="agregar" id="agregar"><br>
                        </label>
                    </div>
                    <div class="col1_111">
                        <label for="inv">Inventario Total:<br>
                            <input disabled class="ress" type="number" name="invtotal" id="invtotal" value="<?php echo $stock ?>"><br>
                        </label>
                        <label for="inventario">Fecha ultimo Inventario:<br>
                            <input disabled class="ress" type="text" name="fecha" id="fecha" value="<?php echo $fechainv ?>"><br>
                        </label>
                        <label for="ultimo inventario">Fecha Inventario Actual:<br>
                            <input disabled class="ress" type="text" name="fecha" id="fecha" value="<?php echo date('d-m-Y') ?>"><br>
                        </label>
                        <label for="numero">Precio Venta:<br>
                            <input class="ress" type="text" name="precioVenta" id="precioVenta" value="<?php echo $precioVenta ?>" "><br>
                        </label>
                        <label for=" dscripcion">Descripcion:<br>
                            <input class="ress" type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion ?>"><br>
                        </label>
                    </div>
                    <div class="col5">
                        <input type="submit" class=" btn btn-primary botonh" value="Confirmar">
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>