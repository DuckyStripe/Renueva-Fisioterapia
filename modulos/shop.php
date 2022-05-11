<?php
if (isset($_GET['buscar']) and $_GET['buscar'] != "") {
    $buscar = $_GET['buscar'];
    $queryAr = "CALL buscarProducto('$buscar');";
    $consulta2 = mysqli_query($connect, $queryAr);
} elseif (isset($_POST['categoria'])) {
    if ($_POST['categoria'] == "todos" or $_POST['categoria'] == "Todos") {
        $queryAr = "SELECT * FROM articulod";
        $consulta2 = mysqli_query($connect, $queryAr);
    } else {
        $queryAr = "SELECT * FROM articulod WHERE id_categoria=$categoria";
        $consulta2 = mysqli_query($connect, $queryAr);
    }
} elseif (isset($_POST['buscar']) and $_POST['buscar'] != "") {
    $queryAr = "SELECT * FROM articulod";
    $consulta2 = mysqli_query($connect, $queryAr);
} else {
    $queryAr = "SELECT * FROM articulod";
    $consulta2 = mysqli_query($connect, $queryAr);
}
if(isset($_GET["producto"])){
    $idproducto=$_GET["producto"];

    $verificar = "SELECT * FROM tmp_pedido WHERE id_user=$id AND Ar_id=$idproducto;";
    $verifiarC = mysqli_query($connect, $verificar);
    if(mysqli_num_rows($verifiarC)==0){
        $tmp = "INSERT INTO tmp_pedido(id_user,Ar_id) VALUES ($id,$idproducto)";
        $tmp_pedido = mysqli_query($connect, $tmp);
        echo '<script> alert("Producto agregado); window.location.href="../shop/shop.php"; </script>';
    }else{
        echo '<script> alert("producto ya agregado"); window.location.href="../shop/shop.php"; </script>';
    }
}
?>
<main>
    <div class="container-xxl">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($consulta2)) {
                $img = $row['img'];
            ?>
                <div class="card cartas" style="width: 20rem;">
                    <?php echo '<img height="300" width="300" src="data:image/jpeg;base64,' . base64_encode($img) . '"/>'; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['Ar_nombre'] ?></h5>
                        <h6 class="card-text"><?php echo $row['Ar_descripcion'] ?></h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Precio: $<?php echo $row['Ar_precioVenta'] ?> </li>
                    </ul>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Stock: <?php echo $row['Ar_stock'] ?> </li>
                    </ul>
                    <div class="card-body text-center">
                        <?php
                        $link="shop.php?producto=".$row['Ar_id'];
                        ?>
                        <a href="<?php echo $link ?> " class="btn btn-primary">Agregar</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>