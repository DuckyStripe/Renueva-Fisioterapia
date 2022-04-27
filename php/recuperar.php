<?php
require 'conexion.php';
$email = $_POST['email'];
$emailC=mysqli_query($connect,"SELECT * FROM usuarios WHERE correo = '$email'");

$comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pass = array(); 
$combLen = strlen($comb) - 1; 
for ($i = 0; $i < 8; $i++) {
    $n = rand(0, $combLen);
    $pass[] = $comb[$n];
}
$Apass= implode($pass); 

if( mysqli_num_rows( $emailC ) > 0){
    while($fila = mysqli_fetch_array( $emailC ) ){
        $paswordf=password_hash($Apass,PASSWORD_DEFAULT);
        $id= $fila['iduser'];
        $user= $fila['nombre'];
        mysqli_query($connect,"UPDATE usuarios SET passwd = '$paswordf' WHERE iduser = '$id'");
        //Envio de correo electronico
        $asunto = "Bienvenido a Renueva Fisioterapia";
        $cuerpo = "Bienvenido: $user \n";
        $cuerpo = "Te damos la bienvenida a nuestra tienda en linea, tus credenciales son las siguientes:\n";
        $cuerpo .= "Correo: $email \n";
        $cuerpo .= "Contraseña: $Apass";
        if (mail($email,$asunto,$cuerpo)) {
            echo '<script> alert("Email enviado con exito..."); window.location.href="../views/inicio/recuperar.php"; </script>';
        } else {
            echo '<script> alert("Email sending failed..."); window.location.href="../views/inicio/recuperar.php"; </script>';
        }

    }
}else{ echo '<script> alert("Error: No se encontro usuario con ese correo"); window.location.href="../views/inicio/recuperar.php"; </script>';}

?>