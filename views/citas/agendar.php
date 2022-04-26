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
    <link rel="stylesheet" href="../../css/agendar.css">
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
        <div  class="iniciar">
            <h2>Agendar Cita</h2>
            <div class="Agendar">
                <form action="" method="POST">
                        <label for="name">Fecha:<br>
                            <input class="inp" type="date" name="name"><br>
                        </label><br>
                        <label for="name">Hora:<br>
                            <select class="inp">
                                <option selected>Seleccione la hora</option>
                                <option value="1">08:00am</option>
                                <option value="2">09:00am</option>
                                <option value="3">10:00am</option>
                                <option value="4">11:00am</option>
                                <option value="5">12:00pm</option>
                                <option value="6">02:00pm</option>
                                </select>
                        </label><br>
                        <label for="name">Servicio:<br>
                            <select class="inp">
                                <option selected>Seleccione el servicio:</option>
                                <option value="1">Prevención, mantenimiento y recuperación de la funcionalidad del cuerpo.</option>
                                <option value="2">Acción preventiva de lesiones</option>
                                <option value="3">Enfoque en la atención personalizada e individualizada del paciente</option>
                                <option value="3">Rehabilitación</option>
                                </select>
                        </label><br>
                        </label>
                        <label  for="text">Comentarios:<br>
                            <textarea class="comment" type="text" name="password"></textarea><br>
                        </label><br>
                        <div class="col-md-2 offset-md-5">
                            <input type="submit" class="btn btn-primary botonh"value="Agendar Cita">
                        </div>
                </form>
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