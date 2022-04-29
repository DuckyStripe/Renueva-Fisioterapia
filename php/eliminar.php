<?php 
    require 'conexion.php';
    $id=$_GET['eliminar'];
    $query="DELETE FROM citas WHERE id_citas = $id ";
    $verifica = mysqli_query($connect,"SELECT * FROM citas WHERE id_citas = $id");
    if($verifica){
        $consulta = mysqli_query($connect,$query);
        echo '<script> alert("Cita cancelada con exito"); window.location.href="../views/citas/historial.php"; </script>';
    }else{
        echo '<script> alert("Cita no encontrada"); window.location.href="../views/citas/historial.php"; </script>';
    }


?>