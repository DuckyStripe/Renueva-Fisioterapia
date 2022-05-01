<?php
include("../../Template/unavista.php");
?>

<main class="contenedor centrar">
    <div class="animate__animated animate__zoomIn">
    <h2 class=" espacio animate__animated animate__fadeInUp">Agendar Cita</h2> <br>
        <form action="agendar.php" id="agenda" method="POST">
            <label class="espacio" for="fecha">Fecha:<br>
                <input class="inp" type="date" name="fecha" id="fecha" onchange="getValueInput()" require><br>
                <script>
                    const getValueInput = () => {
                        var bandera = 0;
                        let extraer = document.getElementById("fecha").value;
                        let date = new Date();
                        let output = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + String(date.getDate()).padStart(2, '0');
                        console.log(output);
                        console.log(extraer);
                        if (extraer < output) {
                            alert("la fecha " + extraer + " No es valida");
                            bandera = 0;
                            window.location.href = "#";

                        } else {
                            return bandera = 1;
                        }
                    }

                    function enviar(bandera) {
                        if (bandera == 1) {
                            document.getElementById('agenda').submit();

                        } else {
                            alert("la fecha '" + extraer + "' no es valida");
                            window.location.href = "#";
                        }
                    }
                </script>
            </label>
            <div class="espacio position-relative m-12">
                <input type="button" class="espacio position-absolute top-10 start-50 translate-middle espacio center-block btn btn-primary botonh" value="Verificar Disponibilidad" onclick="enviar(getValueInput())"> 
            </div>
        </form>

    </div>
</main>
<!--Footer -->
<?php
include("../../Template/footer.php");
?>