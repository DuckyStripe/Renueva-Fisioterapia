<?php 
    session_start();
    require 'conexion.php';
    $passwdHash="";
    $user = $_POST["email"];
    $password =$_POST["password"];
    $paswordcon=mysqli_query($connect,"SELECT * FROM usuarios WHERE correo = '$user'");
    if($paswordcon){
        if( mysqli_num_rows( $paswordcon ) > 0){
            while($fila = mysqli_fetch_array( $paswordcon ) ){
                $passwdHash= $fila['passwd'];
                if(password_verify($password,$passwdHash)){
                    $que= "SELECT COUNT(*) as contar FROM usuarios WHERE correo = '$user' AND passwd = '$passwdHash'";
                    $consulta = mysqli_query($connect,$que);
                    $array = mysqli_fetch_array($consulta);
                    if ($array['contar']>0){
                        $_SESSION['user'] = $user;
                        header("location: ../index.php");
                    }else{
                        echo '<script> alert("Usuario no encontrado"); window.location.href="../index.php"; </script>';
                    }
                }else{
                    echo '<script> alert("Fallo en inicio de sesión"); window.location.href="../index.php"; </script>';
                }

            }
        }
    }

?>