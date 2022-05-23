<?php
require 'conexion.php';
$iduser = $_POST['id'];
$nombre = $_POST['nombre'];
$numero = $_POST['tarjeta'];
$mes = $_POST['mes'];
$anio = $_POST['anio'];
$cvv = $_POST['cvv'];
$fecha = date('Y-m-d');
$numero_aleatorio = rand(1, 10);

//Datos personales de
$datos = "SELECT * FROM usuarios WHERE iduser=$iduser";
$datosCon = mysqli_query($connect, $datos);
$Datosfinales = mysqli_fetch_array($datosCon);
$nombres = $Datosfinales['nombre'];
$apellidos = $Datosfinales['apellidos'];
$correo = $Datosfinales['correo'];

if ($numero_aleatorio > 5) {
    //total
    $total = "SELECT SUM(total_articulo) FROM tmp_pedido a INNER JOIN articulod b ON a.Ar_id=b.Ar_id WHERE id_user=$iduser";
    $totalConsulta = mysqli_query($connect, $total);
    $row1 = mysqli_fetch_array($totalConsulta);
    $total = $row1[0];
    //Creando pedidos
    $pedido = "INSERT INTO pedido(iduser,fecha,total,estado) VALUES($iduser,'$fecha',$total,'En Espera');";
    $pedidoCon = mysqli_query($connect, $pedido);

    //obtencion del idventario
    $busqueda = "SELECT MAX(idventa) AS idventa FROM pedido WHERE iduser=$iduser";
    $busquedaCon = mysqli_query($connect, $busqueda);
    $row = mysqli_fetch_array($busquedaCon);
    $idventa = $row[0];

    //obteenr el pedido de la tabla temporal
    $obtener = "SELECT * FROM tmp_pedido a INNER JOIN articulod b ON a.Ar_id=b.Ar_id WHERE id_user=$iduser";
    $consulta1 = mysqli_query($connect, $obtener);
    while ($row = mysqli_fetch_array($consulta1)) {
        $Ar_id = $row['Ar_id'];
        $cantidad = $row['cantidad'];
        $total = $row['total_articulo'];
        //obtenemos el stock
        $stocks = "SELECT Ar_stock FROM articulod WHERE Ar_id=$Ar_id";
        $stocksCon = mysqli_query($connect, $stocks);
        $stockA=mysqli_fetch_array($stocksCon);
        $stock=$stockA[0];
        $Updatestock=$stock-$cantidad;
        $inv = "UPDATE articulod SET Ar_stock = $Updatestock;";
        $invCon = mysqli_query($connect, $inv);

        $inert = "INSERT INTO pedido_articulo(Ar_id,cantidad,idventa,total_articulo) VALUES($Ar_id,$cantidad,$idventa,$total)";
        $insertCon = mysqli_query($connect, $inert);
    }
    $borrar = "DELETE FROM tmp_pedido WHERE id_user=$iduser";
    $borrarCon = mysqli_query($connect, $borrar);
    //inventario
    //Envio de pedido por correo
    $asunto = "Informe de pedido $idventa ";
    $cuerpo = "Hola: $name . $lastname \n";
    $cuerpo = "Agradecemos tu compre en nuestro sitio web:\n";
    $cuerpo .= "Para revisar tu pedido ve a tu perfil";
    $cuerpo .= "Total: $total \n";
    $cuerpo .= "Gracias por tu compra.";
    mail($correo, $asunto, $cuerpo);
    echo '<script> alert("Pago Aceptado"); window.location.href="../views/shop/shop.php?action=shop"; </script>';
} else {

    echo '<script> alert("Pago rechazado verifica con el banco"); window.location.href="../views/shop/shop.php?action=pagar"; </script>';
}
