<h2>SETTINGS:</h2>
<h2>Agregar</h2>
<main>
    <div class="animate__animated animate__zoomIn">

        <form action="../../php/settings.php" method="POST">
            <div class="columnas">
                <div class="col1_11">
                    <label for="Categorias">Categorias:<br>
                        <input class="ress" type="text" name="categorias" id="categorias" placeholder="Vendaje"><br>
                    </label>
                </div>
                <div class="col1_11">
                    <label for="Roles">Roles:<br>
                        <input class="ress" type="text" name="roles" id="roles" placeholder="Administrador"><br>
                    </label>
                </div>
                <div class="col5">
                    <input type="submit" class="btn btn-primary botonh" value="Actualizar">
                </div>
            </div>
        </form>
    </div>
</main>
<div class="contenedor animate__animated animate__zoomIn">
    <div class="columnas">
        <div class="col1_11">
            <table class="table">
                <thead>
                    <tr>
                        <th class="th-10">ID:</th>
                        <th colspan="1">Roles:</th>
                        <th class="th-10">Eliminar:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM rol;";
                    $consulta = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($consulta)) {
                    ?>
                        <tr>
                            <td colspan="1"><?php echo $row['id_rol'] ?></td>
                            <td colspan="1"><?php echo $row['rol'] ?></td>
                            <td colspan="1">
                            <?php
                                $link = "../shop/admin.php?action=modalcat&eliminar=rol&id=" . $row['id_rol'];
                            ?>
                                <a href="<?php echo $link ?>" class="btn" onlick="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    mysqli_free_result($consulta);
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col1_11">
            <table class="table">
                <thead>
                    <tr>
                        <th class="th-10">ID:</th>
                        <th colspan="1">Categoria:</th>
                        <th class="th-10">Eliminar:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM categoria;";
                    $consulta = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($consulta)) {
                    ?>
                        <tr>
                            <td colspan="1"><?php echo $row['id_categoria'] ?></td>
                            <td colspan="1"><?php echo $row['nombre_cat'] ?></td>
                            <td colspan="1">
                            <?php
                                    $link2 = "../shop/admin.php?action=modalcat&eliminar=cat&id=" . $row['id_categoria'];
                                ?>
                                <a href="<?php echo $link2 ?>" class="btn" onlick="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    mysqli_free_result($consulta);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>