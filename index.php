<?php 
    include("Template/headermain.php");
?>
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
                        <h5>Personal Experto.</h5>
                        <p>Nuestro personal esta listo siempre para ayudarte de forma especializada.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carrusel/carrusel12.jpg" class="d-block w-100 imgcarrusel" alt="...">
                    <div class="carousel-caption itemcar">
                        <h5>Terapia especializada</h5>
                        <p>Cada terapia es personalizada de acuerdo a tus necesidades.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carrusel/carrusel13.jpg" class="d-block w-100 imgcarrusel" alt="...">
                    <div class="carousel-caption itemcar">
                        <h5>Productos de alto nivel.</h5>
                        <p>Nuestros productos son los mejores en el mercado, las mejores marcas nos respaldan.</p>
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
            <p>La Fisioterapia es un tipo de terapia que permite actuar en la prevenci??n, mantenimiento y recuperaci??n de la funcionalidad del cuerpo.

El doble beneficio de la fisioterapia se encuentra no s??lo en el tratamiento de dolencias o patolog??as existentes sino tambi??n en su acci??n preventiva de lesiones.
</p>
        </div>
        <div class="ServiciosTarjetas">
            <div class="card mb-3" style="max-width: max-content;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/servicios/Servicios1.jpg" class="img-fluid rounded-start" alt="Choque de pu??os">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Fisioterapia deportiva</h5>
                            <p class="card-text">La fisioterapia deportiva permite la prestaci??n de asesoramiento y la adaptaci??n de la rehabilitaci??n a efectos de prevenir lesiones, restaurar la funci??n ??ptima del cuerpo, y contribuir a la mejora del rendimiento deportivo. Indicado a deportistas que deseen tener un servicio de fisioterapia orientado a la rehabilitaci??n tras una lesi??n, al desarrollo de planes preventivos y compensatorios de las principales lesiones producidas en el deporte y a la evaluaci??n y control del estado de forma de los deportistas.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: max-content;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Fisioterapia neurol??gica</h5>
                            <p class="card-text">T??cnica encaminada al tratamiento de las secuelas en lesiones del sistema nervioso central o perif??rico. El objetivo es mejorar las capacidades f??sicas y las alteraciones estructurales del paciente para, de este modo, rehabilitar o mejorar la calidad y eficacia de sus movimientos y de su postura.</p>
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
                            <h5 class="card-title">Fisioterapia geri??trica</h5>
                            <p class="card-text">Fisioterapia preventiva y de mantenimiento especialmente dise??ada para personas mayores de 65 a??os, con el objetivo de mejorar la capacidad personal del mayor, evitando el deterioro progresivo y mejorando su calidad de vida. Indicado para el mantenimiento f??sico general y para el tratamiento de fracturas, lesiones, esclerosis, artrosis, artritis reumatoide, posoperatorios, patolog??as vasculares, etc.</p>
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
        <div class="container" id="productos">
            <div class="row">
                <h2>Productos</h2>
            </div>
            <div class="row categoria">
                <p>Nuestros productos nos definen por calidad, contamos con el respaldo de las mejores marcas, animate a comprar los productos que gustes en nuestra tienda en linea.  </p>
            </div>
            <div class="container-fluid">
                <div class="col-md-10 offset-md-1">
                    <!--Tarjetas -->
                    <div class="row">
                        <div class="card tarjetas">
                            <img src="img/productos/producto1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Vendajes</h5>
                                <p class="card-text">Contamos con vendajes de la mas alta calidad, prevendajes, vendajes adhesivos, etc.</p>
                            </div>
                        </div>
                        <div class="card tarjetas">
                            <img src="img/productos/producto2.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Guantes</h5>
                                <p class="card-text">Guantes de las mas alta calidad y las mejores marcas.</p>
                            </div>
                        </div>
                        <div class="card tarjetas">
                            <img src="img/productos/producto3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Electrodos</h5>
                                <p class="card-text">Diferentes modelos de electrodos para adaptarse a todo tipo de instrumentos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card tarjetas">
                            <img src="img/productos/producto4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Consumibles</h5>
                                <p class="card-text">Ll??vate los mejores consumibles como cables, aceites, geles, etc.</p>
                            </div>
                        </div>
                        <div class="card tarjetas">
                            <img src="img/productos/producto5.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Material desechable</h5>
                                <p class="card-text">Ademas de contar con la mejor calidad contamos con el mejor precio, adquiere tus jeringas, gasas, agujas,etc.</p>
                            </div>
                        </div>
                        <div class="card tarjetas">
                            <img src="img/productos/producto6.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Aplicadores</h5>
                                <p class="card-text">Los mejores materiales hablan por si solos, adquiere los mejores aplicadores aqu??.</p>
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
        <div class="container" id="Contacto">
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
                            <h3>Direcci??n: Lafontaine 36, Polanco, Polanco III Secc, Miguel Hidalgo, 11550 Ciudad de M??xico, CDMX</h3>
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
<?php 
    include("Template/footer.php");
?>