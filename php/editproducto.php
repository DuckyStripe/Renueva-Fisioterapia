<?php 
require 'conexion.php';
$id=$_POST['id'];
$nombre = $_POST['producto'];
$categoria = $_POST['categoria'];
$precioCosto = $_POST['precioCosto'];

$precioVenta = $_POST['precioVenta'];
$descripcion = $_POST['descripcion'];

$query1 = "SELECT * FROM articulod a INNER JOIN categoria b ON a.id_categoria = b.id_categoria WHERE a.Ar_id=$id;";
$consulta1 = mysqli_query($connect, $query1);
$row1 = mysqli_fetch_array($consulta1);
mysqli_free_result($consulta1);
$invtotal = $row1['Ar_stock'];

if(($_FILES['img']['name'])!=""){
    $archivo = array('jpg','jpeg','png');
    $nombre_archivo = $_FILES['img']['name'];
    $array_archivo = explode('.',$nombre_archivo);
    $contador = count($array_archivo);
    $extension = strtolower($array_archivo[--$contador]);
    if(!in_array($extension,$archivo)){
        echo '<script> alert("Archivo no Valido."); window.location.href="../views/shop/admin.php?action=productos"; </script>'; 
    }else{
        if(isset($_POST['fecha'])){
            $fechalastinv = $_POST['fecha'];
        }else{
            $fechalastinv=date('d-m-Y');
            $query1 = "SELECT * FROM articulod WHERE Ar_id=$id;";
            $consulta1 = mysqli_query($connect, $query1);
            $row1 = mysqli_fetch_array($consulta1);
            $fechainv= $row1['inv_date'];
        }
        if($precioVenta <= $precioCosto){
            echo '<script> alert("Verifica los valores de precio."); window.location.href="../views/shop/admin.php?action=productos"; </script>'; 
        }else{
            $ganancia=$precioVenta-$precioCosto;
        }
        $checarSiImagen = getimagesize($_FILES['img']['tmp_name']);
            if($checarSiImagen == false){
                $img = NULL;
            }else{
                $image = $_FILES['img']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));
                $img = $imgContent;
            }
        if(isset($POST['agregar'])){
            $invfinal=$agregar+$invtotal;
            if($invfinal<=0){
                echo '<script> alert("No es posible agregar o eliminar inventario"); window.location.href="../views/shop/admin.php?action=productos"; </script>'; 
            }else{
            $query="UPDATE articulod set id_categoria=$categoria,Ar_descripcion='$descripcion',Ar_precioVenta=$precioVenta,Ar_nombre='$nombre',Ar_stock=$invfinal,Ar_precioCosto=$precioCosto,img='$img',inv_date='$fechainv',ganancia=$ganancia,lastinv_date=$fechalastinv WHERE Ar_id=$id";
            $consulta = mysqli_query($connect, $query);
                if($consulta){
                    echo '<script> alert("Articulo modificado correctamente."); window.location.href="../views/shop/admin.php?action=productos"; </script>';
                } else{   echo '<script> alert("Error al agregar producto."); window.location.href="../views/shop/admin.php?action=productos"; </script>';}  
            }
        }else{
            $query="UPDATE articulod set id_categoria=$categoria,Ar_descripcion='$descripcion',Ar_precioVenta=$precioVenta,Ar_nombre='$nombre',Ar_precioCosto=$precioCosto,img='$img',inv_date='$fechainv',ganancia=$ganancia,lastinv_date=$fechalastinv WHERE Ar_id=$id";
            $consulta = mysqli_query($connect, $query);
                if($consulta){
                    echo '<script> alert("Articulo modificado correctamente."); window.location.href="../views/shop/admin.php?action=productos"; </script>';
                } else{   echo '<script> alert("Error al agregar producto."); window.location.href="../views/shop/admin.php?action=productos"; </script>';}  
            }
        }
    }else{
        if(isset($_POST['fecha'])){
            $fechalastinv = $_POST['fecha'];
        }else{
            $fechalastinv=date('d-m-Y');
            $query1 = "SELECT * FROM articulod WHERE Ar_id=$id;";
            $consulta1 = mysqli_query($connect, $query1);
            $row1 = mysqli_fetch_array($consulta1);
            $fechainv= $row1['inv_date'];
            mysqli_free_result($consulta1);
        }
        if($precioVenta <= $precioCosto){
            echo '<script> alert("Verifica los valores de precio."); window.location.href="../views/shop/admin.php?action=productos"; </script>'; 
        }else{
            $ganancia=$precioVenta-$precioCosto;
        }
        $agregar=$_POST['agregar'];
        if(intval($agregar)!=0){
            $invfinal=intval($agregar)+intval($invtotal);
            if($invfinal<=0){
                echo '<script> alert("No es posible agregar o eliminar inventario"); window.location.href="../views/shop/admin.php?action=productos"; </script>'; 
            }else{
                $query="UPDATE articulod set id_categoria=$categoria,Ar_descripcion='$descripcion',Ar_precioVenta=$precioVenta,Ar_nombre='$nombre',Ar_stock=$invfinal,Ar_precioCosto=$precioCosto,inv_date='$fechainv',ganancia=$ganancia,lastinv_date='$fechalastinv'WHERE Ar_id=$id";
                $consulta = mysqli_query($connect, $query);
                    if($consulta){
                echo '<script> alert("Articulo modificado correctamente."); window.location.href="../views/shop/admin.php?action=productos"; </script>';
            } else{   echo '<script> alert("Error al agregar producto."); window.location.href="../views/shop/admin.php?action=productos"; </script>';
            }  
        }
        } else{
            $query="UPDATE articulod set id_categoria=$categoria,Ar_descripcion='$descripcion',Ar_precioVenta=$precioVenta,Ar_nombre='$nombre',Ar_precioCosto=$precioCosto,inv_date='$fechainv',ganancia=$ganancia,lastinv_date='$fechalastinv'WHERE Ar_id=$id";
            $consulta = mysqli_query($connect, $query);
                if($consulta){
            echo '<script> alert("Articulo modificado correctamente."); window.location.href="../views/shop/admin.php?action=productos"; </script>';
        } else{   echo '<script> alert("Error al modificar producto."); window.location.href="../views/shop/admin.php?action=productos"; </script>';
        }  
        }
    }
    ?>