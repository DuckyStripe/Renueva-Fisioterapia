<?php 
    require 'conexion.php';
    $id=$_POST['id'];
    $calle = $_POST['calle'];
    $exterior = $_POST['exterior'];
    $interior = $_POST['interior'];
    $estado = $_POST['estado'];
    $colonia = $_POST['colonia'];
    $codigo = $_POST['codigo_postal'];
    $regreso = $_POST['regreso'];
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
    $query="INSERT INTO direccion(iduser,calle,exterior,interior,id_estado,colonia,codigo_postal) VALUES($id,'$calle','$exterior','$interior',$estado,'$colonia',$codigo)";
    $consulta = mysqli_query($connect,$query);
    if($consulta){
        if ($retorno == "retorno") {
            echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=editcliente"; </script>';
        } elseif ($regreso == "clientes") {
            echo '<script> alert("Datos registrados correctamente."); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
        }else{
            echo '<script> alert("Registro Exitoso"); window.location.href="../index.php"; </script>';}
    }echo '<script> alert("Fallo en el Registro"); window.location.href="../views/citas/perfil.php"; </script>';

?>