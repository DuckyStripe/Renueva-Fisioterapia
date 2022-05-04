<?php
$buscar = $_POST["buscar"];
$query = "SELECT SUM(Ar_precioCosto)* SUM(Ar_stock) FROM articulod;";
$consulta = mysqli_query($connect, $query);
$row = mysqli_fetch_array($consulta);
mysqli_free_result($consulta);
$totalp = $row[0];

$total = number_format($totalp, 2);
?>
<div class="contenedor">
    <div class="iniciar">
        <h2 class="animate__animated animate__fadeInUp">Productos:</h2>
    </div>
    <div class="columnas">
        <div class="col1 animate__animated animate__zoomIn">
            <form action="admin.php?action=productos" method="post">
                <input disabled class="inp " type="search" name="buscar" value="<?php echo "TOTAL INVERSION:$" . $total  ?>">
                <input class="inp " type="search" name="buscar" placeholder="Nombre, Correo, apellido." required>

                <input class="btnn btn-primary botonhh" type="submit" value="Buscar">
                <a href="admin.php?action=nuevoproducto" class="btnn btn-primary botonhh">Nuevo</a>
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
                            <th colspan="1">Ganancias:</th>
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
                                    <td colspan="1"><?php echo $row['ganancia'] ?></td>
                                    <td colspan="1">
                                        <?php
                                        $link = "../shop/admin.php?action=editproducto&id=" . $row['Ar_id'];
                                        $link2 = "../shop/admin.php?action=eliminar&id=" . $row['Ar_id'];
                                        ?>
                                        <a href="<?php echo $link ?>" class="btn" onlick="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#495371" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                        </a>
                                        <a href="#" class="hero__cta" id="open" onlick="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
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
                                    <td colspan="1"><?php echo $row['ganancia'] ?></td>
                                    <td colspan="1">
                                        <a href="<?php echo $link ?>" class="btn">
                                            <svg xmlns=" http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#495371" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                            <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>
                                        </a>
                                        <a href="#" class="hero__cta" >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        mysqli_free_result($consulta);
                        mysqli_free_result($consulta2);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="modal_container" class="modal-container">
            <div class="modal">
                <h1>Ventana Modal</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque assumenda dignissimos illo explicabo natus quia repellat, praesentium voluptatibus harum ipsam dolorem cumque labore sunt dicta consectetur, nesciunt maiores delectus maxime?
                </p>
                <button id="close">Cerrar</button>
            </div>
        </div>
        <section class="modal ">
            <div class="modal__container">
                <img src="images/modal.svg" class="modal__img">
                <h2 class="modal__title">¡Bienvenido al sitio!</h2>
                <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam quas, culpa tempora. Veniam consectetur deleniti maxime.</p>
                <a href="#" class="modal__close">Cerrar Modal</a>
            </div>
        </section>
</main>