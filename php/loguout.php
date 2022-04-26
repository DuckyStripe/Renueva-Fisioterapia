<?php
session_start();
if (isset($_SESSION['user'])) {
    session_destroy();
    header("location: ../index.php ");
}else{
    echo '<script> alert("No hay sesion activa"); window.location.href="../index.php"; </script>';
}
?>