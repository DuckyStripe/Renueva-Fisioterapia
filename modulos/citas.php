<?php 
    $buscar=$_POST["buscar"];
    echo $buscar;
?>
<div class="iniciar">
    <h2 class="animate__animated animate__fadeInUp">HISTORIAL DE CITAS:</h2>
</div>
<div class="columnas">
    <form action="admin.php?action=citas" method="post" >
        <div class="col2">
        <input class="inp animate__animated animate__zoomIn" type="search" name="buscar" placeholder="Nombre, Correo, apellido." required>
        <input class="start-100 top-0 position-absolute translate-middle  center-block btnn btn-primary botonhh animate__animated animate__zoomIn" type="submit" value="Buscar">
        </div>
    </form>
</div>
<main class="container animate__animated animate__zoomIn">
    <div class="contenedor">
        <div class="">
            <div class="tabla">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="th-10">Fecha:</th>
                            <th class="th-10">Hora:</th>
                            <th class="th-10">Nombre:</th>
                            <th class="th-10">Apellido:</th>
                            <th colspan="2">Servicio:</th>
                            <th colspan="2">Comentario:</th>
                            <th colspan="1">Cancelar:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT a.id_citas,a.iduser,b.nombre,b.apellidos, a.fecha, a.idhora, c.hora , d.id_servicio ,d.servicio, a.comentario FROM citas a INNER JOIN usuarios b ON  a.iduser= b.iduser INNER JOIN hora c ON a.idhora= c.idhora INNER JOIN servicios d ON a.id_servicio = d.id_servicio;";
                        $consulta = mysqli_query($connect, $query);
                        if($buscar==NULL OR $buscar==""){
                            while ($row = mysqli_fetch_array($consulta)) {
                            ?>
                                <tr>
                                    <td colspan="1"><?php echo $row['fecha'] ?></td>
                                    <td colspan="1"><?php echo $row['hora'] ?></td>
                                    <td colspan="1"><?php echo $row['nombre'] ?></td>
                                    <td colspan="1"><?php echo $row['apellidos'] ?></td>
                                    <td colspan="2"><?php echo $row['servicio'] ?></td>
                                    <td colspan="2"><?php echo $row['comentario'] ?></td>
                                    <td colspan="1">
                                        <?php
                                        $fechaActual = date('Y-m-d');
                                        $link = "../../php/eliminar.php?retorno=retorno&eliminar=" . $row['id_citas'];
                                        $fecha1 = explode("-", $fechaActual);
                                        $fecha2 = explode("-", $row['fecha']);
                                        if ($fecha2[0] >= $fecha1[0] and $fecha2[1] >= $fecha1[1] and $fecha2[0] >= $fecha1[0]) {
                                        ?>
                                            <a href="<?php echo $link ?>" class="btn" onlick="">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <line x1="18" y1="6" x2="6" y2="18" />
                                                    <line x1="6" y1="6" x2="18" y2="18" />
                                                </svg>
                                            </a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="#" class="btn" onlick="">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-caret-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M18 15l-6 -6l-6 6h12" transform="rotate(270 12 12)" />
                                                </svg>
                                            </a>
                                    </td>
                            <?php
                            }
                        }mysqli_free_result($consulta);
                    }else{
                        $query = "SELECT a.id_citas,a.iduser,b.nombre,b.apellidos,b.correo, a.fecha, a.idhora, c.hora , d.id_servicio ,d.servicio, a.comentario FROM citas a INNER JOIN usuarios b ON  a.iduser= b.iduser INNER JOIN hora c ON a.idhora= c.idhora INNER JOIN servicios d ON a.id_servicio = d.id_servicio WHERE b.apellidos= '$buscar' OR b.nombre='$buscar' OR b.correo = '$buscar'";
                        $consulta = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                                <tr>
                                    <td colspan="1"><?php echo $row['fecha'] ?></td>
                                    <td colspan="1"><?php echo $row['hora'] ?></td>
                                    <td colspan="1"><?php echo $row['nombre'] ?></td>
                                    <td colspan="1"><?php echo $row['apellidos'] ?></td>
                                    <td colspan="2"><?php echo $row['servicio'] ?></td>
                                    <td colspan="2"><?php echo $row['comentario'] ?></td>
                                    <td colspan="1">
                                        <?php
                                        $fechaActual = date('Y-m-d');
                                        $link = "../../php/eliminar.php?retorno=retorno&eliminar=" . $row['id_citas'];
                                        $fecha1 = explode("-", $fechaActual);
                                        $fecha2 = explode("-", $row['fecha']);
                                        if ($fecha2[0] >= $fecha1[0] and $fecha2[1] >= $fecha1[1] and $fecha2[0] >= $fecha1[0]) {
                                        ?>
                                            <a href="<?php echo $link ?>" class="btn" onlick="">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <line x1="18" y1="6" x2="6" y2="18" />
                                                    <line x1="6" y1="6" x2="18" y2="18" />
                                                </svg>
                                            </a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="#" class="btn" onlick="">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-caret-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M18 15l-6 -6l-6 6h12" transform="rotate(270 12 12)" />
                                                </svg>
                                            </a>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    }
                            }mysqli_free_result($consulta);
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>