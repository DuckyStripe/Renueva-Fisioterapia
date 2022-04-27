<?php 
    session_start();
    include 'conexion.php';
    $passwdHash="";
    $user = $_POST["email"];
    $password =$_POST["password"];
    $paswordcon=mysqli_query($connect,"SELECT * FROM usuarios WHERE correo = '$user'");
//Vista por roles
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: ../shop/admin.php ');
                break;
            case 2:
                header('location: ../index.php');
                break;
            case 3:
                header('location: ../shop/personal.php');
                break;
            default:
        }
    }

    if($paswordcon){
        if( mysqli_num_rows( $paswordcon ) > 0){
            while($fila = mysqli_fetch_array( $paswordcon ) ){
                $passwdHash= $fila['passwd'];
                if(password_verify($password,$passwdHash)){
                    $que= "SELECT COUNT(*) as contar FROM usuarios WHERE correo = '$user' AND passwd = '$passwdHash'";
                    $consulta = mysqli_query($connect,$que);
                    $array = mysqli_fetch_array($consulta);
                    $emailC = mysqli_query($connect, "SELECT * FROM usuarios WHERE correo = '$user'");
                    if (mysqli_num_rows($emailC) > 0) {
                        while ($fila = mysqli_fetch_array($emailC)) {
                            $rol = $fila['id_rol'];
                            $user=$fila['correo'];
                            $_SESSION['rol']=$rol;
                            $_SESSION['user'] = $user;
                            echo
                            header("location: ../index.php");
                        }
                    }else{
                        echo '<script> alert("Usuario no encontrado"); window.location.href="../index.php"; </script>';
                    }
                }
            }
        }else{
            echo '<script> alert("Usuario no encontrado"); window.location.href="../index.php"; </script>';
        }
    }else{
        echo '<script> alert("Usuario no encontrado"); window.location.href="../index.php"; </script>';
    }
