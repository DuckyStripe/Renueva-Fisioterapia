<?php 
    require 'conexion.php';
    $id=$_GET['eliminar'];
    error_reporting(0);
    if(isset($_GET['retorno'])){
        $retorno=$_GET['retorno'];
    }else{
        $retorno=NULL;
    }

    $query="DELETE FROM citas WHERE id_citas = $id ";
    $verifica = mysqli_query($connect,"SELECT * FROM citas WHERE id_citas = $id");
    if($verifica){
        $consulta = mysqli_query($connect,$query);
        if($retorno==NULL){
        echo '<script> alert("Cita cancelada con exito"); window.location.href="../views/citas/historial.php"; </script>';
    }elseif($retorno=="retorno"){
        echo '<script> alert("Cita cancelada con exito"); window.location.href="../views/shop/admin.php?action=citas"; </script>';}
    }else{
        echo '<script> alert("Cita no encontrada"); window.location.href="../views/citas/historial.php"; </script>';
    }
