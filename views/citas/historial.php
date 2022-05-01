<?php 
    include("../../Template/unavista.php");
?>
    <div class="container">
        <div class="col-md-5 offset-md-4">
            <div class="iniciar">
                <h2 class="animate__animated animate__fadeInUp">Historial de citas</h2>
            </div>
        </div>
    </div>
    <main class="container animate__animated animate__zoomIn">
        <div class="contenedor">
            <div class="">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Fecha:</th>
                                <th scope="col">Hora:</th>
                                <th scope="col">Nombre:</th>
                                <th scope="col" >Apellido:</th>
                                <th scope="col"colspan="2">Servicio:</th>
                                <th scope="col"colspan="2">Comentario:</th>
                                <th scope="col"colspan="1">Cancelar:</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                                $query="SELECT a.id_citas,a.iduser,b.nombre,b.apellidos, a.fecha, a.idhora, c.hora , d.id_servicio ,d.servicio, a.comentario FROM citas a INNER JOIN usuarios b ON  a.iduser= b.iduser INNER JOIN hora c ON a.idhora= c.idhora INNER JOIN servicios d ON a.id_servicio = d.id_servicio WHERE (a.iduser= $id) ;";
                                $query2="SELECT COUNT(*) FROM citas WHERE iduser= $id";
                                $consulta = mysqli_query($connect,$query);
                                $consulta2 =mysqli_query($connect,$query2);
                                if(isset($consulta2)){
                                    while($row=mysqli_fetch_array($consulta)){
                                    ?>
                                    <tr>
                                        <td colspan="1"><?php echo $row['fecha']?></td>
                                        <td colspan="1"><?php echo $row['hora']?></td>
                                        <td colspan="1"><?php echo $row['nombre']?></td>
                                        <td colspan="1"><?php echo $row['apellidos']?></td>
                                        <td colspan="2"><?php echo $row['servicio']?></td>
                                        <td colspan="2"><?php echo $row['comentario']?></td>
                                        <td colspan="2">
                                            <?php
                                                $fechaActual = date('Y-m-d');
                                                $link='../../php/eliminar.php?eliminar='. $row['id_citas'];
                                                $fecha1=explode("-",$fechaActual);
                                                $fecha2=explode("-",$row['fecha']);
                                                if($fecha2[0] >=$fecha1[0] AND $fecha2[1] >=$fecha1[1]AND $fecha2[0] >= $fecha1[0] ){
                                                ?>
                                                    <a href="<?php echo $link?>" class="btn" onlick="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <line x1="18" y1="6" x2="6" y2="18" />
                                                        <line x1="6" y1="6" x2="18" y2="18" />
                                                        </svg>
                                                    </a>
                                                <?php
                                                } else{
                                                ?>
                                                    <a href="#" class="btn" onlick="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-caret-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M18 15l-6 -6l-6 6h12" transform="rotate(270 12 12)" />
                                                        </svg>
                                                    </a>
                                                </td>
                                                <?php
                                                }
                                        }
                                    }else{
                                     ?>
                                    <td colspan="8">No Cuentas con fechas para esta fecha</td>
                                <?php
                                    }   mysqli_free_result($consulta);
                                ?>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!--Footer -->
    <footer id="foots">
        <div class="container">
            <div class="row">
                <div class="col footd">
                    <a href="https://trascendersoft1.000webhostapp.com/">
                        <p class="text-center"> Copyright ©Aviso Terminos y Condiciones</p>
                    </a>
                </div>
                <div class="col foot">
                    <a href="https://trascendersoft1.000webhostapp.com/">
                        <p>Desarrollador TrascenderSoft</p>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!--Bootstrap link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>