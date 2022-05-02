<?php 
    require 'conexion.php';
    $fecha=$_POST["fecha"];
    $horario=$_POST["horario"] ; 
    $servicio=$_POST["servicio"];
    $comentario=$_POST["comentario"];
    $retorno=$_POST['retorno'];
    $id=$_POST['id'];
    $query="INSERT INTO citas(iduser,fecha,idhora,id_servicio,comentario) VALUES($id,'$fecha',$horario,$servicio,'$comentario')";
    $consulta = mysqli_query($connect,$query);
    if($consulta){
        if($retorno=="retorno"){
            echo '<script> alert("Registro Exitoso"); window.location.href="../views/shop/admin.php?action=agendarcliente"; </script>';
        }else{
        echo '<script> alert("Registro Exitoso"); window.location.href="../index.php"; </script>';
    }
    }else{
        echo '<script> alert("Fallo en el Registro"); window.location.href="../index.php"; </script>';
    }
                        
?>