<?php 
    require 'conexion.php';
    $id=$_POST['id'];
    $calle = $_POST['calle'];
    $exterior = $_POST['exterior'];
    $interior = $_POST['interior'];
    $estado = $_POST['estado'];
    $colonia = $_POST['colonia'];
    $codigo = $_POST['codigo_postal'];
    $query="INSERT INTO direccion(iduser,calle,exterior,interior,id_estado,colonia,codigo_postal) VALUES($id,'$calle','$exterior','$interior',$estado,'$colonia',$codigo)";
    $consulta = mysqli_query($connect,$query);
    if($consulta){
        echo '<script> alert("Registro Exitoso"); window.location.href="../views/citas/perfil.php"; </script>';
    }echo '<script> alert("Fallo en el Registro"); window.location.href="../views/citas/perfil.php"; </script>';

?>