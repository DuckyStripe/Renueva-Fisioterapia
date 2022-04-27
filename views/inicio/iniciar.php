<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png">
    <!--Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Fuentes link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&family=Oswald:wght@300;400&display=swap" rel="stylesheet">
    <!--Estilos link -->
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/iniciar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Renueva</title>
</head>
<body>
    <header class="container-fluid bg-header lhead">
        <div class="">
            <a class="navbar-brand" id="logo" href="#">
                <img src="../../img/logo.png" alt="" width="100" height="60" class="d-inline-block">
                Renueva Fisioterapia
            </a>
        </div>
    </header>

    <main class="contenedor">
        <div class="contenido">
            <div class="iniciar">
                <h2>Iniciar Sesion</h2>
                <form action="../../php/login.php" method="POST">
                    <div class="formulario">
                        <label  for="email">Correo Electronico:<br>
                            <input class="inp" type="email" name="email"><br>
                        </label>
                        <label for="password">Contraseña<br>
                            <input class="inp" type="password" name="password"><br>
                        </label><br>
                        <a href="recuperar.php">¿Haz olvidado tu contraseña?</a>
                    </div>
                    <input type="submit" class="btn btn-primary botonh"value="Iniciar Sesion"><br>
                </form>
            </div>
            <div class="linea"></div>
            <div  class="iniciar">
                    <h2>Registrarse</h2>
                
                <div class="registro">
                    <form action="../../php/registro.php" method="POST">
                            <label for="name">Nombre:<br>
                                <input class="inp" type="name" name="name" placeholder="Jhon "required><br>
                            </label>
                            <label for="name">Apellidos:<br>
                                <input class="inp" type="name" name="lastname" placeholder="Doe"required><br>
                            </label>
                            <label for="numero">Numero de telefono:<br>
                                <input class="inp" type="tel" name="numero" placeholder="55-4433-2211"  pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}"required><br>
                            </label>
                            <label for="email">Correo electrónico:<br>
                                <input class="inp" type="email" name="email" placeholder="example@example.com" required><br>
                            </label>
                            <label for="password">Contraseña<br>
                                    <input class="inp" type="password" name="password" placeholder="**********"required><br>
                            </label>
                                <label for="passwordver">Verificar Contraseña<br>
                                    <input class="inp" type="password" name="passwordver" placeholder="**********"required><br>
                                </label>
                            <div class="form-group">
                                <input type="checkbox" name="terminos"required><p class="termino"> Acepto los terminos y condiciones</p>
                            </div>
                            <input type="submit" class="btn btn-primary botonh" name="Registrarse" value="Registrarse" >
                            <?php
                            if (isset($_POST['Registrarse'])) {
                                if (isset($_POST['terminos']) && $_POST['terminos'] == '1')
                                    echo '<div class="alert alert-success">Has aceptado correctamente las condiciones de uso.</div>';
                                else
                                    echo '<div class="alert alert-danger">Debes aceptar las condiciones de uso.</div>';
                            }
                            ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!--Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col footd">
                    <a href="https://trascendersoft1.000webhostapp.com/">
                        <p class="text-center"> Copyright ©Aviso Terminos y Condiciones</p>
                    </a>
                </div>
                <div class="col foot">
                    <a href="https://trascendersoft1.000webhostapp.com/">
                        <p>Desarrollador TrascenderSoft</p>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!--Bootstrap link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>