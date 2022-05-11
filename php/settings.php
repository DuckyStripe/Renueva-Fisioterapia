<?php
    require 'conexion.php';
    if(isset($_POST["categorias"])and ($_POST["categorias"]!="") AND (empty($_POST["roles"]) AND ($_POST["roles"]==""))){
        $categoria=$_POST["categorias"];
        $query="SELECT * FROM categoria WHERE nombre_cat = '$categoria'";
        $VerCat=mysqli_query($connect,$query);
        if(mysqli_num_rows($VerCat) > 0){
            echo '<script> alert("Categoria ya registrada."); window.location.href="../views/shop/admin.php?action=settings"; </script>';
        }else{
            $insertar="INSERT INTO categoria(nombre_cat) VALUES('$categoria');";
            if(mysqli_query($connect, $insertar)){
                echo '<script> alert("Se registro correctamente."); window.location.href="../views/shop/admin.php?action=settings"; </script>';
            }else{
                echo '<script> alert("Ocurrio un error intente nuevamente."); window.location.href="../views/shop/admin.php?action=settings"; </script>';
            }
        }
    }elseif(isset($_POST["roles"])and ($_POST["roles"]!="") AND (empty($_POST["categorias"])and ($_POST["categorias"]==""))){
        $roles=$_POST["roles"];
        $query="SELECT * FROM rol WHERE rol = '$roles'";
        $VerRol=mysqli_query($connect,$query);
        if(mysqli_num_rows($VerRol) > 0){
            echo '<script> alert("Rol ya registrado."); window.location.href="../views/shop/admin.php?action=settings"; </script>';
        }else{
            $insertar="INSERT INTO rol(rol) VALUES('$roles');";
            if(mysqli_query($connect, $insertar)){
                echo '<script> alert("Se registro correctamente."); window.location.href="../views/shop/admin.php?action=settings"; </script>';
            }else{
                echo '<script> alert("Ocurrio un error intente nuevamente."); window.location.href="../views/shop/admin.php?action=settings"; </script>';
            }
        }
    }elseif((isset($_POST["roles"]))and ($_POST["roles"]!="") AND (isset($_POST["categorias"]) AND ($_POST["categorias"]!=""))) {
        $categoria=$_POST["categorias"];
        $roles=$_POST["roles"];
        $rol="SELECT * FROM rol WHERE rol = '$roles'";
        $categoria="SELECT * FROM categoria WHERE nombre_cat = '$categoria'";
        $VerRol=mysqli_query($connect,$rol);
        $VerCat=mysqli_query($connect,$categoria);
        if(mysqli_num_rows($VerRol) > 0 OR mysqli_num_rows($VerCat) > 0){
            echo '<script> alert("Rol o Categoria ya registrada."); window.location.href="../views/shop/admin.php?action=settings"; </script>';
        }else{
            $insertarROL="INSERT INTO rol(rol) VALUES('$rol');";
            $insertarCAT="INSERT INTO categoria(nombre_cat) VALUES('$categoria');";
            if(mysqli_query($connect, $insertarROL) AND mysqli_query($connect, $insertarCAT)){
                echo '<script> alert("Se registraron correctamente."); window.location.href="../views/shop/admin.php?action=settings"; </script>';
            }else{
                echo '<script> alert("Ocurrio un error intente nuevamente."); window.location.href="../views/shop/admin.php?action=settings"; </script>';
            }
        }
    }else{
        echo '<script> alert("No se introdujo ningun valor."); window.location.href="../views/shop/admin.php?action=settings"; </script>';

    }
?>