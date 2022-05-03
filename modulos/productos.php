<?php
$buscar = $_POST["buscar"];
?>
<div class="contenedor">
    <div class="iniciar">
        <h2 class="animate__animated animate__fadeInUp">Productos:</h2>
    </div>
    <div class="columnas">
        <div class="col1 animate__animated animate__zoomIn">
            <form action="admin.php?action=productos" method="post">
                <input class="inp " type="search" name="buscar" placeholder="Nombre, Correo, apellido." required>
                <input class="btnn btn-primary botonhh" type="submit" value="Buscar">
                <a href="admin.php?action=registro" class="btnn btn-primary botonhh">Nuevo</a>
            </form>
        </div>
    </div>
</div>
<main class="container animate__animated animate__zoomIn">
    <div class="contenedor">
        <div class="">
            <div class="tabla">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="1">ID:</th>
                            <th colspan="1">Nombre:</th>
                            <th colspan="2">Cateogoria:</th>
                            <th colspan="2">Descripción:</th>
                            <th colspan="1">Stock:</th>
                            <th colspan="1">Precio:</th>
                            <th colspan="1">Precio Venta:</th>
                            <th colspan="1">Modificar:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT *  FROM articulod a INNER JOIN categoria b ON  a.id_categoria= b.id_categoria;";
                        $consulta = mysqli_query($connect, $query);
                        if ($buscar == NULL or $buscar == "") {
                            while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                                <tr>
                                    <td colspan="1"><?php echo $row['Ar_id'] ?></td>
                                    <td colspan="1"><?php echo $row['Ar_nombre'] ?></td>
                                    <td colspan="2"><?php echo $row['nombre_cat'] ?></td>
                                    <td colspan="2"><?php echo $row['Ar_descripcion'] ?></td>
                                    <td colspan="1"><?php echo $row['Ar_stock'] ?></td>
                                    <td colspan="1"><?php echo $row['Ar_precioCosto'] ?></td>
                                    <td colspan="1"><?php echo $row['Ar_precioVenta'] ?></td>
                                    <td colspan="1">
                                        <a href="#" class="btn" onlick="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#495371" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                        </a>
                                    </td>
                                <?php
                            }
                            mysqli_free_result($consulta);
                        } else {
                            $query2 = "SELECT *  FROM articulod a INNER JOIN categoria b ON  a.id_categoria= b.id_categoria WHERE a.Ar_nombre= '$buscar' OR b.nombre_cat='$buscar'";
                            $consulta2 = mysqli_query($connect, $query2);
                            while ($row = mysqli_fetch_array($consulta2)) {
                                ?>
                                         <tr>
                                    <td colspan="1"><?php echo $row['Ar_id'] ?></td>
                                    <td colspan="1"><?php echo $row['Ar_nombre'] ?></td>
                                    <td colspan="2"><?php echo $row['nombre_cat'] ?></td>
                                    <td colspan="2"><?php echo $row['Ar_descripcion'] ?></td>
                                    <td colspan="1"><?php echo $row['Ar_stock'] ?></td>
                                    <td colspan="1"><?php echo $row['Ar_precioCosto'] ?></td>
                                    <td colspan="1"><?php echo $row['Ar_precioVenta'] ?></td>
                                    <td colspan="1">
                                        <a href="#" class="btn" onlick="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#495371" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                        </a>
                                    </td>
                                </tr>
                    <?php
                                        }
                                    }mysqli_free_result($consulta);mysqli_free_result($consulta2);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>