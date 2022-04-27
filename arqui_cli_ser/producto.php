<?php 
include("conexion.php");
$con = conectar();
if (mysqli_connect_errno()){
    echo "Fallo la conexion con MySQL: " . mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Cafetalista.</title>
    <link rel="preload" href="normalize.css" as="style">
    <link rel="stylesheet" href="normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mali:wght@300;600&display=swap" rel="stylesheet">
    <link rel="preload" href="styles.css" as="style">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  </head>
  <body>

    <div class = "nav-fijo">
        <div class = iconos-movil>
                <i id="botonMenu" class="fas fa-bars"></i>
        </div>
        <nav class="nav-principal contenedor" id="navPrincipal">
            <a href="index.html">Inicio</a>
            <a href="productos.html">Nuestros Productos</a>
            <a href="#">Sobre Nosotros</a>
            <a href="contacto.html">Contacto</a>
        </nav>
    </div>
<?php
function tabla($row){
?>

<section class="nuestro">
    <div class="iconos">
      <?php if ($row['TipoProducto'] == 'Grano') {
        ?>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-growth" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
           <path d="M16.5 15a4.5 4.5 0 0 0 -4.5 4.5m4.5 -8.5a4.5 4.5 0 0 0 -4.5 4.5m4.5 -8.5a4.5 4.5 0 0 0 -4.5 4.5m-4 3.5c2.21 0 4 2.015 4 4.5m-4 -8.5c2.21 0 4 2.015 4 4.5m-4 -8.5c2.21 0 4 2.015 4 4.5m0 -7.5v6"></path>
        </svg>
        <?php
      }
      if ($row['TipoProducto'] == 'Soluble') {
        ?>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grain" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
           <circle cx="4.5" cy="9.5" r="1"></circle>
           <circle cx="9.5" cy="4.5" r="1"></circle>
           <circle cx="9.5" cy="14.5" r="1"></circle>
           <circle cx="4.5" cy="19.5" r="1"></circle>
           <circle cx="14.5" cy="9.5" r="1"></circle>
           <circle cx="19.5" cy="4.5" r="1"></circle>
           <circle cx="14.5" cy="19.5" r="1"></circle>
           <circle cx="19.5" cy="14.5" r="1"></circle>
        </svg>
        <?php
      }
      if ($row['TipoProducto'] == 'Dulce') {
        ?>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-candy" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
           <path d="M7.05 11.293l4.243 -4.243a2 2 0 0 1 2.828 0l2.829 2.83a2 2 0 0 1 0 2.828l-4.243 4.243a2 2 0 0 1 -2.828 0l-2.829 -2.831a2 2 0 0 1 0 -2.828z"></path>
           <path d="M16.243 9.172l3.086 -.772a1.5 1.5 0 0 0 .697 -2.516l-2.216 -2.217a1.5 1.5 0 0 0 -2.44 .47l-1.248 2.913"></path>
           <path d="M9.172 16.243l-.772 3.086a1.5 1.5 0 0 1 -2.516 .697l-2.217 -2.216a1.5 1.5 0 0 1 .47 -2.44l2.913 -1.248"></path>
        </svg>
        <?php
      }?>
    </div>
    <br>
    <h3><?php echo $row['NombreProducto'] ?></h3>
    <p><?php echo $row['DescripcionProducto'] ?></p>
    <p>Contenido: <?php echo $row['ContenidoNeto'] ?>g</p>
    <p>Precio: $<?php echo $row['PrecioProducto'] ?></p>
  </section>

<?php
}
if(isset($_POST['todo'])) {
  $todo = mysqli_query($con,"SELECT * FROM productos_cafe");
  ?>
  <main class="contenedor sombra animate__animated animate__slideInRight">
  <h2>Todos nuestros productos que ofrecemos.</h2>
  <div class="btn alinear-centro flex">
    <div class="nuestro-cafe">
      <?php while($row = mysqli_fetch_array($todo)) tabla($row); ?>
    </div>
  </div>
  <div class="btn alinear-derecha flex">
    <form action="productos.html" method="post">
      <input class="boton w-small-100" type="submit" name="regresa" value="Regresar.">
    </form>
  </div>
  </main>
  <?php
}
if(isset($_POST['grano'])) {
  $grano = mysqli_query($con,"SELECT * FROM productos_cafe WHERE TipoProducto = 'Grano'");

  ?>
  <main class="contenedor sombra animate__animated animate__slideInRight">
  <h2>Caf&eacute; en grano tostado.</h2>
  <div class="btn alinear-centro flex">
    <div class="nuestro-cafe">
      <?php while($row = mysqli_fetch_array($grano)) tabla($row); ?>
    </div>
  </div>
  <div class="btn alinear-derecha flex">
    <form action="productos.html" method="post">
      <input class="boton w-small-100" type="submit" name="regresa" value="Regresar.">
    </form>
  </div>
  </main>
  <?php
}
if(isset($_POST['soluble'])) {
  $soluble = mysqli_query($con,"SELECT * FROM productos_cafe WHERE TipoProducto = 'Soluble'");

  ?>
  <main class="contenedor sombra animate__animated animate__slideInRight">
  <h2>Caf&eacute; soluble, listo para usar.</h2>
  <div class="btn alinear-centro flex">
    <div class="nuestro-cafe">
      <?php while($row = mysqli_fetch_array($soluble)) tabla($row); ?>
    </div>
  </div>
  <div class="btn alinear-derecha flex">
    <form action="productos.html" method="post">
      <input class="boton w-small-100" type="submit" name="regresa" value="Regresar.">
    </form>
  </div>
  </main>
  <?php
}
if(isset($_POST['dulce'])) {
  $dulce = mysqli_query($con,"SELECT * FROM productos_cafe WHERE TipoProducto = 'Dulce'");
  ?>
  <main class="contenedor sombra animate__animated animate__slideInRight">
  <h2>Nuestros dulces para disfrutar.</h2>
  <div class="btn alinear-centro flex">
    <div class="nuestro-cafe">
      <?php while($row = mysqli_fetch_array($dulce)) tabla($row); ?>
    </div>
  </div>
  <div class="btn alinear-derecha flex">
    <form action="productos.html" method="post">
      <input class="boton w-small-100" type="submit" name="regresa" value="Regresar.">
    </form>
  </div>
  </main>
  <?php
}
?>
</table>
<?php
mysqli_close($con);
?>
</body>
</html>
