<?php
    session_start();
    require 'conexion.php';
    $retorno=$_POST["retorno"];
    if (isset($_GET['retorno'])) {
        $retorno = $_GET['retorno'];
    } elseif (isset($_POST['regreso'])) {
        $regreso = $_POST['regreso'];
    }elseif(isset($_POST['retorno'])){
        $retorno = $_POST['retorno'];
    }else {
        $regreso = NULL;
        $retorno = NULL;
    }
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $number = $_POST["numero"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordver = $_POST["passwordver"];
    $Cemail ="SELECT * FROM usuarios WHERE correo = '$email'";
    $Cnumber = "SELECT * FROM usuarios WHERE telefono = '$number'";
    $VerEmail=mysqli_query($connect,$Cemail);
    $Vernumber = mysqli_query($connect,$Cnumber);
    if(mysqli_num_rows($VerEmail) > 0  OR  mysqli_num_rows($Vernumber) > 0){
        echo '<script> alert("Este usuario ya esta registrado"); window.location.href="../views/inicio/iniciar.php"; </script>';
    }else{
        if($password == $passwordver){
            $paswordf=password_hash($password,PASSWORD_DEFAULT);
            $insertar = "INSERT INTO usuarios(id_rol,nombre,apellidos,correo,passwd,telefono) VALUES (2,'$name','$lastname','$email','$paswordf','$number')";
            if(mysqli_query($connect, $insertar)){
                //Envio de correo electronico
                $asunto = "Bienvenido a Renueva Fisioterapia";
                $cuerpo = "Bienvenido: $name . $lastname \n";
                $cuerpo = "Te damos la bienvenida a nuestra tienda en linea, tus credenciales son als siguientes:\n";
                $cuerpo .= "Correo: $email \n";
                $cuerpo .= "Contraseña: $password";
                if (mail($email,$asunto,$cuerpo)) {
                    echo "Email enviado con exito a: $email...";
                } else {
                    echo "Email sending failed...";
                }
                if($retorno=="registro"){
                    echo '<script> alert("Registro Exitoso, Se ha enviado un correo electronico."); window.location.href="../views/shop/admin.php"; </script>';
                }elseif($retorno=="index"){
                echo '<script> alert("Registro Exitoso::::, Se ha enviado un correo electronico."); window.location.href="../index.php"; </script>';
            }elseif($regreso=="clientes"){
                echo '<script> alert("Registro Exitoso::::, Se ha enviado un correo electronico."); window.location.href="../index.php"; </script>';
            }
            }else {
                echo "Error: " . $insertar . "<br>" . mysqli_error($connect);
           }
        }else{
            echo '<script> alert("Verifica Tus contraseñas"); window.location.href="../views/inicio/iniciar.php"; </script>';
        }
    }

?>