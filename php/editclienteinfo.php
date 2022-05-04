<?php
require 'conexion.php';
$id = $_POST['iduser'];
$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['ntelefono'];
if (isset($_GET['retorno'])) {
    $retorno = $_GET['retorno'];
} else {
    $retorno = NULL;
}
if (isset($_POST['regreso'])) {
    $regreso = $_POST['regreso'];
} else {
    $regreso = NULL;
}
if ((strlen($correo) > 0) and (strlen($telefono) > 0)) {
    $query = "SELECT * FROM usuarios WHERE correo='$correo' OR telefono='$telefono';";
    $consulta = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($consulta);
    $verificar = mysqli_num_rows($consulta);
    if ($verificar == 0) {
        $query1 = "UPDATE usuarios SET correo='$correo',telefono='$telefono'  WHERE iduser = $id;";
        $consulta1 = mysqli_query($connect, $query1);
        if ($consulta1) {
            if ($retorno == "retorno") {
                echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=editcliente"; </script>';
            } elseif ($regreso == "clientes") {
                echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
            }else{
                echo '<script> alert("Registro Exitoso"); window.location.href="../views/shop/admin.php?action=clientes"; </script>';}
        } else {
            echo '<script> alert("Fallo en el Registro."); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
        }
    } else {
        echo '<script> alert("El correo o el numero ya estan registrados."); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
    }
} elseif ((strlen($correo) > 0) and (strlen($telefono) == 0)) {
    $query = "SELECT * FROM usuarios WHERE correo='$correo'";
    $consulta = mysqli_query($connect, $query);
    $verificar = mysqli_num_rows($consulta);
    $row = mysqli_fetch_array($consulta);
    if ($verificar == 0) {
        $query1 = "UPDATE usuarios SET correo='$correo' WHERE iduser = $id;";
        $consulta1 = mysqli_query($connect, $query1);
        if ($consulta1) {
            if ($retorno == "retorno") {
                echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=editcliente"; </script>';
            } elseif ($regreso == "clientes") {
                echo '<script> alert("Correo actualizado correctamente."); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
            }else{
            echo '<script> alert("Registro Exitoso"); window.location.href="../views/shop/admin.php?action=clientes"; </script>';}
        } else {
            echo '<script> alert("Fallo en el Registro..."); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
        }
    } else {
        echo '<script> alert("El correo  ya esta registrado."); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
    }
} elseif ((strlen($correo) == 0) and (strlen($telefono) > 0)) {
    $query = "SELECT * FROM usuarios WHERE telefono='$telefono';";
    $consulta = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($consulta);
    $verificar = mysqli_num_rows($consulta);
    if ($verificar == 0) {
        $query1 = "UPDATE usuarios SET telefono='$telefono' WHERE iduser = $id;";
        $consulta1 = mysqli_query($connect, $query1);
        if ($consulta1) {
            if ($retorno == "retorno") {
                echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=editcliente"; </script>';
            } elseif ($regreso == "clientes") {
                echo '<script> alert("Telefono actualizado correctamente."); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
            }else{
                echo '<script> alert("Registro Exitoso"); window.location.href="../views/shop/admin.php?action=clientes"; </script>';}
        } else {
            echo '<script> alert("Fallo en el Registro..."); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
        }
    } else {
        echo '<script> alert("Fallo en el Registro..."); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
    }
} else {
    echo '<script> alert("Fallo en el registro"); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
}mysqli_free_result($consulta);
mysqli_free_result($consulta1);
mysqli_free_result($consulta2);
mysqli_free_result($consulta3);
