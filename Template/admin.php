<?php
require '../../php/conexion.php';
session_start();

$comprobar = isset($_SESSION['user']);
error_reporting(0);
    $correo = strval($_SESSION['user']);
    $emailC = mysqli_query($connect, "SELECT * FROM usuarios WHERE correo = '$correo'");
    if (mysqli_num_rows($emailC) > 0) {
        while ($fila = mysqli_fetch_array($emailC)) {
            $nombres = $fila['nombre'] . " " . $fila['apellidos'];
            $nombre = $fila['nombre'];
            $Apellido = $fila['apellidos'];
            $Email = $fila['correo'];
            $telefono = $fila['telefono'];
            $id = $fila['iduser'];
            $Directorio = "../citas/perfil.php";
            $id_rol = $fila['id_rol'];
        }
    }
    if($id_rol!=1){
        if($id_rol!=3){
        echo '<script>window.location.href="../../404.php"; </script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png">
    <link rel="stylesheet" href="../../css/admin.css">
    <!--Fuentes link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Boxicons CDN Link -->
    <link rel="shortcut icon" href="../img/logo.png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Renueva Fisioterapia</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</head>

<body>
