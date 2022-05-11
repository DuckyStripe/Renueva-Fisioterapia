<?php
//Total
$totalmuestra=Array();
// //fecha
// if(isset($_POST['fecha']) AND $_POST['fecha']!= ""){
//     $fechaselect=strval($_POST['fecha']);
//     $fecha = "SELECT * FROM pedido WHERE fecha='$fechaselec';";
//     $fechaconsulta = mysqli_query($connect, $fecha);        

//     $total = "SELECT SUM(total) FROM pedido WHERE fecha='$fechaselect';";
//     $totales = mysqli_query($connect, $total);
//     $totalmuestra=Array();
//     while($totaCon = mysqli_fetch_array($totales) ){
//         array_push($totalmuestra,$totaCon['total'].",");
//     }
//     echo "Fecha:" . $fechaselect;
// }elseif(isset($_POST['mes']) AND $_POST['mes']!= ""){
//     $fecha = "SELECT DISTINCTROW MONTH(fecha) FROM pedido;";
//     $fechaconsulta = mysqli_query($connect, $fecha);        

//     $total = "SELECT total FROM pedido;";
//     $totales = mysqli_query($connect, $total);
//     $totalmuestra=Array();
//     while($totaCon = mysqli_fetch_array($totales) ){
//         array_push($totalmuestra,$totaCon['total'].",");
//     }
//     echo "Mes:";
// }elseif(isset($_POST['año']) AND $_POST['año']!= ""){
//     $fecha = "SELECT YEAR(fecha) FROM pedido;";
//     $fechaconsulta = mysqli_query($connect, $fecha);        

//     $total = "SELECT total FROM pedido;";
//     $totales = mysqli_query($connect, $total);
//     $totalmuestra=Array();
//     while($totaCon = mysqli_fetch_array($totales) ){
//         array_push($totalmuestra,$totaCon['total'].",");
//     }
//     echo "Año:";
// }elseif(isset($_POST['producto']) AND $_POST['producto']!= ""){
//     $fecha = "SELECT fecha FROM pedido;";
//     $fechaconsulta = mysqli_query($connect, $fecha);        

//     $total = "SELECT total FROM pedido;";
//     $totales = mysqli_query($connect, $total);
//     $totalmuestra=Array();
//     while($totaCon = mysqli_fetch_array($totales) ){
//         array_push($totalmuestra,$totaCon['total'].",");
//     }
//     echo "Producto:";
// }else{
    $fecha = "SELECT DISTINCTROW fecha FROM pedido ORDER BY fecha ASC;";
    $fechaconsulta = mysqli_query($connect, $fecha);        

    $total = "SELECT total FROM pedido ORDER BY fecha ASC;";
    $totales = mysqli_query($connect, $total);

    while($totaCon = mysqli_fetch_array($totales) ){
        array_push($totalmuestra,$totaCon['total'].",");
    }
// }




// // // Semanal

// // // Mensual

// // // por producto



?>

<div class="contenedor">
    <div class="iniciar">
        <h2 class="animate__animated animate__fadeInUp">REPORTES:</h2>
    </div>
    <div class="columnas">
        <form action="../shop/admin.php?action=reportes" method="post">
            <div class="col2">
                <input type="date" name="fecha" class="ress">
            <select name="mes" id="mes" class="ress">
                <option value="0">Selecciona un mes</option>
            </select>
            </div>
            <div class="col2">
            <select name="año" id="año" class="ress" >
                <option value="0">Selecciona un año</option>
            </select>
            <select name="producto" id="producto" class="ress" >
                <option value="0">Selecciona un producto</option>
            </select>
            </div>
            <div class="col2">
            <input class="btnn btn-primary botonhh" type="submit" value="Buscar">
            </div>
        </form>
    </div>
</div>
<!-- GRaficos -->
<canvas id="myChart" width="400" height="100"></canvas>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
               <?php        
                while($fechas = mysqli_fetch_array($fechaconsulta) ){
                ?>
                '<?php echo $fechas['fecha']?>',
                <?php 
                }
                ?>
        ],
        datasets: [{
            label: 'Ventas',
            data: [
                
            <?php 
                echo implode($totalmuestra)
                ?>,
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
