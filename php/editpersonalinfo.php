<?php
require 'conexion.php';
$id = $_POST['iduser'];
$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['ntelefono'];
$rol = $_POST['rol'];
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
        if (strlen($rol) > 0) {
            $query2 = "UPDATE usuarios SET id_rol='$rol' WHERE iduser = $id;";
            $consulta2 = mysqli_query($connect, $query2);
        }else{$consulta2=false;}
        if ($consulta1 or $consulta2) {
            if ($retorno == "retorno") {
                echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
            } elseif ($regreso == "personal") {
                echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
            } else {
                echo '<script> alert("Registro Exitoso"); window.location.href="../views/shop/admin.php?action=personal"; </script>';
            }
        } else {
            echo '<script> alert("Fallo en el Registro."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
        }
    } else {
        echo '<script> alert("El correo o el numero ya estan registrados."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
    }
} elseif ((strlen($correo) > 0) and (strlen($telefono) == 0)) {
    $query = "SELECT * FROM usuarios WHERE correo='$correo'";
    $consulta = mysqli_query($connect, $query);
    $verificar = mysqli_num_rows($consulta);
    $row = mysqli_fetch_array($consulta);
    if ($verificar == 0) {
        $query1 = "UPDATE usuarios SET correo='$correo' WHERE iduser = $id;";
        $consulta1 = mysqli_query($connect, $query1);
        if (strlen($rol) > 0) {
            $query2 = "UPDATE usuarios SET id_rol='$rol' WHERE iduser = $id;";
            $consulta2 = mysqli_query($connect, $query2);
        }else{$consulta2=false;}
        if ($consulta1 or $consulta2) {
            if ($retorno == "retorno") {
                echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
            } elseif ($regreso == "personal") {
                echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
            } else {
                echo '<script> alert("Registro Exitoso"); window.location.href="../views/shop/admin.php?action=personal"; </script>';
            }
        } else {
            echo '<script> alert("Fallo en el Registro."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
        }
        } else {
            echo '<script> alert("El correo o el numero ya estan registrados."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
        }
} elseif ((strlen($correo) == 0) and (strlen($telefono) > 0)) {
    $query = "SELECT * FROM usuarios WHERE telefono='$telefono';";
    $consulta = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($consulta);
    $verificar = mysqli_num_rows($consulta);
    if ($verificar == 0) {
        $query1 = "UPDATE usuarios SET telefono='$telefono' WHERE iduser = $id;";
        $consulta1 = mysqli_query($connect, $query1);
        if (strlen($rol) > 0) {
            $query2 = "UPDATE usuarios SET id_rol='$rol' WHERE iduser = $id;";
            $consulta2 = mysqli_query($connect, $query2);
        }
        if ($consulta1 or $consulta2) {
            if ($retorno == "retorno") {
                echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
            } elseif ($regreso == "personal") {
                echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
            } else {
                echo '<script> alert("Registro Exitoso"); window.location.href="../views/shop/admin.php?action=personal"; </script>';
            }
        } else {
            echo '<script> alert("Fallo en el Registro."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
        }
    }
} elseif ((strlen($correo) == 0) and (strlen($telefono) == 0) and (strlen($rol) > 0)) {
        $query2 = "UPDATE usuarios SET id_rol='$rol' WHERE iduser = $id;";
        $consulta2 = mysqli_query($connect, $query2);
    
    if ($consulta2) {
        if ($retorno == "retorno") {
            echo '<script> alert("Rol Actualizado Correctamente."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
        } elseif ($regreso == "personal") {
            echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
        } else {
            echo '<script> alert("Registro Exitoso"); window.location.href="../views/shop/admin.php?action=personal"; </script>';
        }
    } else {
        echo '<script> alert("Fallo en el Registro."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
    }
}else {
    echo '<script> alert("El numero ya esta registrado."); window.location.href="../views/shop/admin.php?action=personal"; </script>';
}
mysqli_free_result($consulta);
mysqli_free_result($consulta1);
mysqli_free_result($consulta2);
mysqli_free_result($consulta3);
