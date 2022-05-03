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
    if(isset($_GET['retorno'])){
        $retorno=$_GET['retorno'];
    }else{
        $retorno=NULL;
    }
    if(isset($_POST['regreso'])){
        $regreso=$_POST['regreso'];
    }else{
        $regreso=NULL;
    }
    
    $query="UPDATE direccion SET calle = '$calle',exterior='$exterior',interior='$interior',id_estado='$estado',colonia='$colonia',codigo_postal = $codigo  WHERE (iduser = $id AND id_direccion=$id_direccion );";
    $consulta = mysqli_query($connect,$query);
    if($consulta){
        if($retorno=="retorno"){
        echo '<script> alert("Registro Exitoso"); window.location.href="../views/shop/admin.php?action=editcliente"; </script>';
    }elseif($regreso=="clientes"){
        echo '<script> alert("Registro Exitoso"); window.location.href="../views/shop/admin.php?action=clientes"; </script>';
    }elseif($regreso=="personal"){
        echo '<script> alert("Registro Exitoso"); window.location.href="../views/shop/admin.php?action=personal"; </script>';
    }echo '<script> alert("Registro Exitoso"); window.location.href="../index.php"; </script>';
    }echo '<script> alert("Fallo en el Registro"); window.location.href="../views/citas/perfil.php"; </script>';

?>