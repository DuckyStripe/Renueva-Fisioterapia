<?php 
    require 'conexion.php';
    $id=$_POST['iduser'];
    $id_direccion = $_POST['id_direccion'];
    $calle = $_POST['calle'];
    $exterior = $_POST['exterior'];
    $interior = $_POST['interior'];
    $estado = $_POST['estado'];
    $colonia = $_POST['colonia'];
    $codigo = $_POST['codigo_postal'];
    $query="UPDATE direccion SET calle = '$calle',exterior='$exterior',interior='$interior',id_estado='$estado',colonia='$colonia',codigo_postal = $codigo  WHERE iduser = $id; ";
    $consulta = mysqli_query($connect,$query);
    if($consulta){
        echo '<script> alert("Registro Exitoso"); window.location.href="../views/citas/perfil.php"; </script>';
    }echo '<script> alert("Fallo en el Registro"); window.location.href="../views/citas/perfil.php"; </script>';

?>