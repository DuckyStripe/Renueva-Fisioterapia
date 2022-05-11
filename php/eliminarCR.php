<?php 
    require 'conexion.php';
    if(isset($_POST['id']) AND ($_POST['id']!="" OR $_POST['id']!= NULL)){
        $id=$_POST['id'];
        if(isset($_POST['eliminar']) AND ($_POST['eliminar']!="")){
            if($_POST['eliminar']=="rol"){
                $query="DELETE FROM rol WHERE id_rol = $id ;";
                $verifica = mysqli_query($connect,$query);
                if($verifica){
                    echo '<script> alert("Rol elimnado correctamente"); window.location.href="../views/shop/admin.php?action=settings"; </script>';
                }else{
                    echo '<script> alert("Error al eliminar rol"); window.location.href="../views/shop/admin.php?action=settings"; </script>';
                }
            }elseif($_POST['eliminar']=="categoria"){
                $query="DELETE FROM categoria WHERE id_categoria = $id ;";
                $verifica = mysqli_query($connect,$query);
                if($verifica){
                    echo '<script> alert("Categoria elimnada correctamente"); window.location.href="../views/shop/admin.php?action=settings"; </script>';
                }else{
                    echo '<script> alert("Error al eliminar categoria"); window.location.href="../views/shop/admin.php?action=settings"; </script>';
                }

                echo '<script> alert("Error"); window.location.href="../views/shop/admin.php?action=settings"; </script>';
            }

        }else{
            echo '<script> alert("Error"); window.location.href="../views/shop/admin.php?action=settings"; </script>';
        }
    }else{
        echo '<script> alert("Error"); window.location.href="../views/shop/admin.php?action=settings"; </script>';
    }
        
?>
