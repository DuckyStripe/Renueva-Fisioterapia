<?php
if(isset($_POST['email']) && isset($_POST['password'])){
	$busqueda = "SELECT * FROM usuario WHERE correo = '".$_POST['email']."' AND passwd = '". $_POST['password']."'";
	if ($result = $mysqli->query($busqueda)) {

		/* determinar el número de filas del resultado */
		$row_cnt = $result->num_rows;
		if($row_cnt > 0){
			header('Location: http://localhost/Renueva-Fisioterapia/index.html');
			exit;
		}else{
			echo '<script> alert("Fallo en inicio de sesión"); window.location.href="../index.html"; </script>';
		}

		/* cerrar el resultset */
		$result->close();
	}else{
		printf("Intenta de nuevo");
	}
}
?> 
