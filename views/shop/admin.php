<?php
include('../../Template/admin.php');
?>
<div class="sidebar">
    <div class="logo-details">
        <i class='bx icon'>
            <img src="../../img/logo4.png" alt="Logo Renueva">
        </i>
        <div class="logo_name">Renueva Fisioterapia</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <?php
        $query = "SELECT a.iduser,a.id_rol,b.rol FROM usuarios a INNER JOIN rol b ON a.id_rol = b.id_rol WHERE (a.iduser=$id)";
        $consulta = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($consulta);
        $rol = $row['rol'];
        $idrol = $row['id_rol'];
        if ($idrol == 1) {
        ?>
            <li>
                <a href="admin.php?action=agendarcliente">
                    <i class='bx bx-calendar-alt'></i>
                    <span class="links_name">
                        <h3>Agendar Cita</h3>
                    </span>
                </a>
                <span class="tooltip">
                    <h3>Agendar Cita</h3>
                </span>
            </li>
            <li>
                <a href="admin.php?action=citas">
                    <i class='bx bx-calendar'></i>
                    <span class="links_name">
                        <h3>Citas</h3>
                    </span>
                </a>
                <span class="tooltip">
                    <h3>Citas</h3>
                </span>
            </li>
            <li>
                <a href="admin.php?action=clientes">
                    <i class='bx bx-user'></i>
                    <span class="links_name">
                        <h3>Clientes</h3>
                    </span>
                </a>
                <span class="tooltip">
                    <h3>Clientes</h3>
                </span>
            </li>
            <li>
                <a href="admin.php?action=personal">
                    <i class='bx bxs-user-pin'></i>
                    <span class="links_name">
                        <h3>Personal</h3>
                    </span>
                </a>
                <span class="tooltip">
                    <h3>Personal</h3>
                </span>
            </li>
            <li>
                <a href="admin.php?action=productos">
                    <i class='bx bxl-product-hunt'></i>
                    <span class="links_name">
                        <h3>Productos</h3>
                    </span>
                </a>
                <span class="tooltip">
                    <h3>Productos</h3>
                </span>
            </li>
            <li>
                <a href="admin.php?action=reportes">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">
                        <h3>Reportes</h3>
                    </span>
                </a>
                <span class="tooltip">
                    <h3>Reportes</h3>
                </span>
            </li>
            <li>
                <a href="admin.php?action=pedidos">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">
                        <h3>Pedidos</h3>
                    </span>
                </a>
                <span class="tooltip">
                    <h3>Pedidos</h3>
                </span>
            </li>
            <li>
                <a href="admin.php?action=settings">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">
                        <h3>Settings</h3>
                    </span>
                </a>
                <span class="tooltip">
                    <h3>Settings</h3>
                </span>
            </li>
        <?php } else {
        ?>
            <li>
                <a href="admin.php?action=agendarcliente">
                    <i class='bx bx-calendar-alt'></i>
                    <span class="links_name">
                        <h3>Agendar Cita</h3>
                    </span>
                </a>
                <span class="tooltip">
                    <h3>Agendar Cita</h3>
                </span>
            </li>
            <li>
                <a href="admin.php?action=citas">
                    <i class='bx bx-calendar'></i>
                    <span class="links_name">
                        <h3>Citas</h3>
                    </span>
                </a>
                <span class="tooltip">
                    <h3>Citas</h3>
                </span>
            </li>
            <li>
                <a href="admin.php?action=clientes">
                    <i class='bx bx-user'></i>
                    <span class="links_name">
                        <h3>Clientes</h3>
                    </span>
                </a>
                <span class="tooltip">
                    <h3>Clientes</h3>
                </span>
            </li>
        <?php
        }
        ?>
        <li class="profile">
            <div class="profile-details">
                <?php
                $query = "SELECT a.iduser,a.id_rol,b.rol FROM usuarios a INNER JOIN rol b ON a.id_rol = b.id_rol WHERE (a.iduser=$id)";
                $consulta = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($consulta);
                $rol = $row['rol'];
                $idrol = $row['id_rol'];
                if ($idrol == 1) {
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-award" width="45px" height="45px" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FEFAE0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="9" r="6" />
                        <polyline points="9 14.2 9 21 12 19 15 21 15 14.2" transform="rotate(-30 12 9)" />
                        <polyline points="9 14.2 9 21 12 19 15 21 15 14.2" transform="rotate(30 12 9)" />
                    </svg>
                <?php } elseif ($idrol == 3) { ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coffee" width="45px" height="45px" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FEFAE0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 14c.83 .642 2.077 1.017 3.5 1c1.423 .017 2.67 -.358 3.5 -1c.83 -.642 2.077 -1.017 3.5 -1c1.423 -.017 2.67 .358 3.5 1" />
                        <path d="M8 3a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2" />
                        <path d="M12 3a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2" />
                        <path d="M3 10h14v5a6 6 0 0 1 -6 6h-2a6 6 0 0 1 -6 -6v-5z" />
                        <path d="M16.746 16.726a3 3 0 1 0 .252 -5.555" />
                    </svg>
                <?php
                }
                ?>
                <div class="name_job">
                    <div class="name">
                        <h3><?php echo $nombre ?></h3>
                    </div>
                    <div class="job">
                        <h3><?php echo $rol ?></h3>
                    </div>
                </div>
            </div>
            <a href="../../php/loguout.php">
                <i class='bx bx-log-out' id="log_out"></i>
            </a>
        </li>
    </ul>
</div>
<section class="home-section">
    <div class="text"></div>
    <?php 
        $action =$_GET['action'];
        switch($action){
            case 'registro':
                include('../../modulos/registro.php');
            break;
            case 'editcliente':
                include('../../modulos/editcliente.php');
            break;
            case 'editpersonal':
                include('../../modulos/editpersonal.php');
            break;
            case 'registropersonal':
                include('../../modulos/registropersonal.php');
            break;
            case 'agendarcliente':
                include('../../modulos/agendarcliente.php');
            break;
            case 'agendar':
                include('../../modulos/agendar.php');
            break;
            case 'agendarfecha':
                include('../../modulos/agendarfecha.php');
            break;
            case 'modal':
                include('../../modulos/modal.php');
            break;
            case 'citas':
                include('../../modulos/citas.php');
                break;
            case 'clientes':
                include('../../modulos/clientes.php');
            break;
            case 'productos':
                include('../../modulos/productos.php');
            break;
            case 'reportes':
                include('../../modulos/reportes.php');
            break;
            case 'pedidos':
                include('../../modulos/pedidos.php');
            break;
            case 'personal':
                include('../../modulos/personal.php');
            break;
            case 'editproducto':
                include('../../modulos/editproducto.php');
            break;
            case 'settings':
                include('../../modulos/settings.php');
            break;
            case 'nuevoproducto':
                include('../../modulos/nuevoproducto.php');
            break;
            default:
                include ('../../modulos/registro.php');
            break;
        }
    ?>
</section>

<script src="../../js/script.js"></script>
<script src="../../js/main.js"></script>
</body>

</html>