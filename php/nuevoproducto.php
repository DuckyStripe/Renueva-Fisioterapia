<?php 
require 'conexion.php';
$nombre = $_POST['producto'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$precioVenta = $_POST['precioVenta'];
$precioCosto = $_POST['precioCosto'];
$invtotal = $_POST['invtotal'];

$archivo = array('jpg','jpeg','png');
$nombre_archivo = $_FILES['img']['name'];
$array_archivo = explode('.',$nombre_archivo);
$contador = count($array_archivo);
$extension = strtolower($array_archivo[--$contador]);

if(!in_array($extension,$archivo)){
    echo '<script> alert("Archivo no Valido."); window.location.href="../views/shop/admin.php?action=nuevoproducto"; </script>'; 
}else{
    if(isset($_POST['fecha'])){
        $fechainv = $_POST['fecha'];
    }else{
        $fechainv=date('d-m-Y');
    }
    
    if($precioVenta <= $precioCosto){
        echo '<script> alert("Verifica los valores de precio."); window.location.href="../views/shop/admin.php?action=nuevoproducto"; </script>'; 
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
    $query = "INSERT INTO articulod(id_categoria,Ar_descripcion,Ar_precioVenta,Ar_nombre,Ar_stock,Ar_precioCosto,img,inv_date,ganancia,lastinv_date) VALUES($categoria,'$descripcion',$precioVenta,'$nombre',$invtotal,$precioCosto,'$img','$fechainv',$ganancia,'$fechainv');";
    $consulta = mysqli_query($connect, $query);
        if($consulta){
            echo '<script> alert("Articulo agregado correctamente."); window.location.href="../views/shop/admin.php?action=nuevoproducto"; </script>';
        } else{   echo '<script> alert("Error al agregar producto."); window.location.href="../views/shop/admin.php?action=nuevoproducto"; </script>';
        }  
}
?>