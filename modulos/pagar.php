<main class="contenedor centrar">
    <h3 class="animate__animated animate__fadeInUp">Informacion Personal</h3>
    <div class="centrar animate__animated animate__zoomIn">
        <div class="columnas">
            <div class="col1t">
                <h4 class="">Nombre:<?php echo " " . $nombre ?></h4>
                <h4 class="">Apellidos:<?php echo " " . $Apellido ?></h4>
            </div>
            <div class="col2t">
                <h4 class="">Correo:<?php echo " " . $Email ?></h4>
                <h4 class="">Telefono:<?php echo " " . $telefono ?></h4>
            </div>
        </div>
        <h2 class="animate__animated animate__fadeInUp">Metodo de pago:</h2><br>
        <div class="container">
            <form action="../../php/pagar.php" method="POST">
                <div class="row">
                    <div class="col-md-5 offset-md-1">
                        <input type="hidden" name="id" id="id" value="<?php echo$id ?>">
                        <label for="nombre">Nombre del titular:<br>
                            <input required type="text" class="inp" name="nombre" placeholder="Jhon Doe">
                        </label><br>
                    </div>
                    <div class="col-md-6 ">
                        <label for="numero">Numero de la tarjeta:<br>
                            <input required type="text" class="inp" name="tarjeta" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" placeholder="4152-9866-8965-8965">
                        </label><br>
                    </div>
                </div>
                <div class="row">
                <script>
                    const getmount = () => {
                        var bandera = 0;
                        let mes = new  Date();
                        let mesinput =document.getElementById("mes").value;
                        let mesouput=String(mes.getMonth() + 1).padStart(2, '0');
                        console.log(mesouput);
                        if (mesinput < mesouput) {
                            alert("El mes " + mesinput + " no es valido");
                            bandera = 0;
                            window.location.href = "../shop/shop.php?action=pagar";

                        } else {
                            return bandera = 1;
                        }
                    }
                    function enviar(bandera) {
                        if (bandera == 1) {
                            document.getElementById('agenda').submit();

                        } else {
                            alert("la fecha '" + extraer + "' no es valida");
                            window.location.href = "../shop/shop.php?action=pagar";
                        }
                    }
                            </script>
                    <div class="col-md-3 offset-md-2">
                        <label for="mes">Mes de vencimiento <br>
                            <input required type="text" class="ress" name="mes" id="mes" onchange="getmount()" placeholder="05">
                        </label>

                    </div>
                    <div class="col-md-3">
                        <label for="año">Año de vencimiento <br>
                            <input required type="text" class="ress" name="anio" id="anio" onchange="getValueInput()"  placeholder="2022">
                        </label>
                        <script>
                    const getValueInput = () => {
                        var bandera = 0;
                        let extraer = document.getElementById("anio").value;
                        let date = new Date();
                        let output = date.getFullYear();
                        if (extraer < output) {
                            alert("la fecha " + extraer + " No es valida");
                            bandera = 0;
                            window.location.href = "#";
                        } else {
                            return bandera = 1;
                        }
                    }
                            </script>
                    </div>
                    <div class="col-md-3">
                        <label for="cvv">CVV <br>
                            <input required type="text" class="ress" name="cvv" [0-9]{3} placeholder="125">
                        </label>
                    </div>
                </div>
                <div class="row espacio">
                    <div class="col">
                <button type="submit" class="btn btn-primary btn-lg botonh">Pagar</button>
                    </div>
                    
                </div>
            </form>
        </div>
        <h2 class="animate__animated animate__fadeInUp">Direccion de Facturación:</h2><br>
        <?php
        $query = "SELECT * FROM direccion WHERE iduser=$id";
        $consulta = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($consulta);
        $id_direccion = $row['id_direccion'];
        if ($id_direccion != NULL) {
            $query = "SELECT a.calle,a.exterior,a.interior,b.estado,a.colonia,a.codigo_postal FROM direccion a INNER JOIN estados b ON a.id_estado = b.id_estado WHERE (a.id_direccion=$id_direccion)";
            $consulta = mysqli_query($connect, $query);
            $row = mysqli_fetch_array($consulta);
            $calle = $row['calle'];
            $exterior = $row['exterior'];
            $interior = $row['interior'];
            $estado = $row['estado'];
            $colonia = $row['colonia'];
            $codigo = $row['codigo_postal'];
        ?>
            <div class="columnas">
                <div class="col1t">
                    <h4>Calle:<?php echo " " . $calle ?></h4>
                    <h4>Exterior:<?php echo " " . $exterior ?></h4>
                    <h4>Interior:<?php echo " " . $interior ?></h4>
                </div>
                <div class="col2t">
                    <h4>Estado:<?php echo " " . $estado ?></h4>
                    <h4>Colonia:<?php echo " " . $colonia ?></h4>
                    <h4>Codigo Postal:<?php echo " " . $codigo ?></h4>
                </div>
            </div>
            <div class="espacio position-relative m-12">
                <a href="../citas/cambiardir.php" class="espacio position-absolute top-10 start-50 translate-middle espacio center-block btn btn-primary botonh">Cambiar</a>
            </div>
        <?php } else { ?>
            <form action="../../php/direccion.php" method="POST">
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
        <?php } ?>

    </div>
    </div>
</main>