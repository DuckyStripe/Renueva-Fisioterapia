<?php
    session_start();
    require 'conexion.php';
    $id=$_POST['id'];
    $password = $_POST["password"];
    $passwordver = $_POST["passwordver"];
    $paswordcon=mysqli_query($connect,"SELECT * FROM usuarios WHERE iduser = $id");
    $fila = mysqli_fetch_array( $paswordcon );
    $passwdHash= $fila['passwd'];
    $name=$fila['nombre'];
    $lastname=$fila['apellidos'];
    $email=$fila['correo'];
    if(password_verify($password,$passwdHash)==FALSE OR password_verify($passwordver,$passwdHash)==FALSE){
        if($password == $passwordver){
            $paswordf=password_hash($password,PASSWORD_DEFAULT);
            $insertar = "UPDATE usuarios SET passwd = '$paswordf' WHERE iduser = $id; ";
            if(mysqli_query($connect, $insertar)){
                //Envio de correo electronico
                $asunto = "Cambio de Contraseña  Renueva Fisioterapia";
                $cuerpo = "Bienvenido: $name . $lastname \n";
                $cuerpo = "Hubo un intento de cambio de contraseña, tus credenciales son las siguientes:\n";
                $cuerpo .= "Correo: $email \n";
                $cuerpo .= "Contraseña: $password";
                echo '<script> alert("Registro Exitoso, Se ha enviado un correo electronico."); window.location.href="../views/citas/perfil.php"; </script>';
            }else {
                echo "Error: " . $insertar . "<br>" . mysqli_error($connect);
            }
        }else{
            echo '<script> alert("Verifica Tus contraseñas"); window.location.href="../views/citas/perfil.php"; </script>';
        }
    }else{
        echo '<script> alert("No se puede usar la misma contraseña."); window.location.href="../views/citas/perfil.php"; </script>';
    }

?>