<?php
    session_start();
    require 'php/conexion.php';


?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!--Estilos link -->
    <link rel="stylesheet" href="css/styles.css">
    <title>Renueva</title>
</head>

<body>

    <header class="container-fluid bg-header">
        <nav class="navbar navbar-expand-lg navbar-light lnav animate__animated  animate__rubberBand">
            <div class="container-fluid ">
                <div class="col-md-6">
                    <a class="navbar-brand" id="logo" href="#">
                        <img src="img/logo.png" alt="" width="100" height="60" class="d-inline-block align-text-center">
                        Renueva Fisioterapia
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="hdboton">
                        <button class="navbar-toggler justify-content-end " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <?php
                    $comprobar = isset($_SESSION['rol']) AND isset($_SESSION['user']);
                    if ($comprobar == "True") {
                        switch ($_SESSION['rol']) {
                            case 1:
                                $Destino1 = "views/citas/agendarfecha.php";
                                $Destino2 = "views/citas/historial.php";
                                $Destino3 = "views/shop/shop.php";
                                $Destino4="views\shop\admin.php";
                                $boton = "PANEL ADMIN";
                                break;
                            case 2:
                                $Destino1 = "views/citas/agendarfecha.php";
                                $Destino2 = "views/citas/historial.php";
                                $Destino3 = "views/shop/shop.php";
                                $Destino4="#Contacto";
                                $boton = "CONTACTO";
                                break;
                            case 3:
                                $Destino1 = "views/citas/agendarfecha.php";
                                $Destino2 = "views/citas/historial.php";
                                $Destino3 = "views/shop/shop.php";
                                $Destino4="views\shop\personal.php";
                                $boton = "PANEL PERSONAL";
                                break;
                            default:
                        }
                        $sesion = "CERRAR SESION";
                        $iniciar = "php/loguout.php";
                    } else {
                        $Destino1 = "views/inicio/iniciar.php";
                        $Destino2 = "views/inicio/iniciar.php";
                        $Destino3 = "views/inicio/iniciar.php";
                        $sesion = "INICIAR SESION";
                        $iniciar = "views/inicio/iniciar.php";
                        $Destino4="#Contacto";
                        $boton = "CONTACTO";
                    }
                    ?>
                    <div class="collapse navbar-collapse menu justify-content-end head" id="navbarNavDropdown">
                        <ul class="navbar-nav lista">
                            <li class="nav-item">
                                <a class="active align-middle" aria-current="page" href="#">INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="active align-middle " aria-current="page" href="#Servicios">SERVICIOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="active align-middle" aria-current="page" href="#Nosotros">PRODUCTOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="active align-middle" aria-current="page" href="<?php echo $Destino4 ?>"><?php echo $boton ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="active align-middle" aria-current="page" href="<?php echo $iniciar ?>"><?php echo $sesion ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="animate__animated animate__zoomIn">
        <!--Carrusel -->
        <div class="carrusel">

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active itemcarrusel">
                        <img src="img/carrusel/carrusel11.jpg" class="d-block w-100 imgcarrusel" alt="...">
                        <div class="carousel-caption itemcar">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/carrusel/carrusel12.jpg" class="d-block w-100 imgcarrusel" alt="...">
                        <div class="carousel-caption itemcar">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/carrusel/carrusel13.jpg" class="d-block w-100 imgcarrusel" alt="...">
                        <div class="carousel-caption itemcar">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>

        </div>
        <!--Servicios -->
        <div class="container" id="Servicios">
            <div class="row">
                <h2>Servicios</h2>
            </div>
            <div class="row categoria">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio iusto consequatur animi deleniti at quod corrupti accusantium laboriosam a nesciunt voluptate reiciendis, doloremque recusandae. Architecto iusto voluptas eos quia voluptatum.</p>
            </div>
            <div class="ServiciosTarjetas">
                <div class="card mb-3" style="max-width: max-content;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/servicios/Servicios1.jpg" class="img-fluid rounded-start" alt="Choque de puños">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Servicio 1</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: max-content;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Servicio 2</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="img/servicios/Servicios2.jpg" class="img-fluid rounded-start" alt="Computadora con contenido">
                        </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: max-content;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/servicios/Servicios3.jpg" class="img-fluid rounded-start" alt="Persona utilizando una computadora">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Servicio 3</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 agendar">
                        <a href="<?php echo $Destino1 ?>" class="btn btn-primary botonh animate__animated animate__shakeX">Agendar Cita</a>
                    </div>
                    <div class="col-md-6 historial">
                        <a href="<?php echo $Destino2 ?>" class="btn btn-primary botonh animate__animated animate__shakeX">Historial de citas
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-rotate-clockwise" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4.05 11a8 8 0 1 1 .5 4m-.5 5v-5h5" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!--Productos -->
            <div class="container">
                <div class="row">
                    <h2>Productos</h2>
                </div>
                <div class="row categoria">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt cumque vel assumenda rerum laborum odit architecto, error, culpa incidunt facere molestiae iusto non voluptatum minus? Soluta dolorum placeat harum nihil!</p>
                </div>
                <div class="container-fluid">
                    <div class="col-md-10 offset-md-1">
                        <!--Tarjetas -->
                        <div class="row">
                            <div class="card tarjetas">
                                <img src="img/productos/producto1.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="card tarjetas">
                                <img src="img/productos/producto2.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="card tarjetas">
                                <img src="img/productos/producto3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card tarjetas">
                                <img src="img/productos/producto4.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="card tarjetas">
                                <img src="img/productos/producto5.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="card tarjetas">
                                <img src="img/productos/producto6.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row botoncomprar">
                    <div class="col-md-4 offset-md-10">
                        <a href="<?php echo $Destino3 ?>" class="btn btn-primary botonh animate__animated animate__shakeX">Comprar ahora
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-store" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="3" y1="21" x2="21" y2="21" />
                                <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                <line x1="5" y1="21" x2="5" y2="10.85" />
                                <line x1="19" y1="21" x2="19" y2="10.85" />
                                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!--Contacto -->
            <div class="container">
                <div class="row">
                    <h2>Contacto</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.5283389123733!2d-99.20050588578161!3d19.432774745712205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20202fe85de19%3A0x7f5d4f933bbecdb6!2sLafontaine%2C%20Polanco%2C%20Polanco%20III%20Secc%2C%2011540%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses-419!2smx!4v1649798507902!5m2!1ses-419!2smx" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-6 contacto">
                        <div class="items">
                            <div class="item">
                                <h3>Dirección: Lafontaine 36, Polanco, Polanco III Secc, Miguel Hidalgo, 11550 Ciudad de México, CDMX</h3>
                            </div>
                            <div class="item">
                                <h3>Telefono: (55) 1234 5678 <br>
                                    Celular: (55) 1234 5678</h3>
                            </div>
                            <div class="item redes">
                                <h3>Redes Sociales:</h3>
                                <div class="svgs">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#495371" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                    </svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#495371" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="4" width="16" height="16" rx="4" />
                                        <circle cx="12" cy="12" r="3" />
                                        <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-linkedin" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#495371" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="4" width="16" height="16" rx="2" />
                                        <line x1="8" y1="11" x2="8" y2="16" />
                                        <line x1="8" y1="8" x2="8" y2="8.01" />
                                        <line x1="12" y1="16" x2="12" y2="11" />
                                        <path d="M16 16v-3a2 2 0 0 0 -4 0" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <!--Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 footd">
                    <p>Copyright ©Aviso Terminos y Condiciones</p>
                </div>
                <div class="col-md-6 foot">
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