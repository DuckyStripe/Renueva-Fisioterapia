<?php
/*
  *Contraseñas xd
  localhost@root: 080900
  localhost@general: 0000
  localhost@Lupita: lupita
*/
?>
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
      <title>Adminstrar - El Cafetalista.</title>
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
    <?php
    function tabla($row){
    ?>

        <tr>
          <td><?php echo $row['IDProducto']; ?></td>
          <td><?php echo $row['NombreProducto']; ?></td>
          <td><?php echo $row['ContenidoNeto']; ?>g</td>
          <td>$<?php echo $row['PrecioProducto']; ?></td>
          <td><?php echo $row['TipoProducto']; ?></td>
          <td><?php echo $row['DescripcionProducto']; ?></td>
          <td>
            <a class="btn-admin" href="eliminar.php?id=<?php echo $row['IDProducto'] ?>">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="18" height="18" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                 <line x1="4" y1="7" x2="20" y2="7"></line>
                 <line x1="10" y1="11" x2="10" y2="17"></line>
                 <line x1="14" y1="11" x2="14" y2="17"></line>
                 <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                 <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
              </svg>
            </a>
          </td>
          <td>
              <a class="btn-admin" href="editar.php?id=<?php echo $row['IDProducto'] ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="18" height="18" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                     <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                     <path d="M16 5l3 3"></path>
                  </svg>
              </a>
          </td>
        </tr>
    <?php
    }
    $todo = mysqli_query($con,"SELECT * FROM productos_cafe");
    ?>

    <section class="contacto">

      <h2>Productos disponibles.</h2>
        <form class="formulario" action="anadir.php" method="post">
          <fieldset>

              <legend>Desde aqui puede editar la tabla.</legend>

              <div class="contenedor-campos">
                  <div class="campo">
                      <label>Nombre del producto<input class="input-text" type="text" name="nom_prod" placeholder="Ej: Cafe Cafetalero soluble 100g" required></label>
                  </div>
                  <div class="campo">
                      <label>Peso del producto en gramos<input class="input-text" type="number" name="pes_prod" placeholder="Ej: 100" required></label>
                  </div>
                  <div class="campo">
                      <label>Precio<input class="input-text" type="number" name="pec_prod" placeholder="149.50" required></label>
                  </div>
                  <div class="campo">
                      <label>Tipo de producto<input class="input-text" type="text" name="tip_prod" placeholder="Grano/Soluble/Dulce" list="lista_tipo" required size="64" multiple required></label>
                  </div>
                  <div class="campo">
                      <label>Breve descripci&oacute;n<input class="input-text" type="text" name="des_prod" placeholder="Máximo 100 caracters" required></label>
                  </div>
              </div>

              <div class="btn alinear-derecha flex">
                      <input class="boton w-small-100" type="submit" value="Añadir.">
              </div>

              <datalist id="lista_tipo">
                <option value="Grano"></option>
                <option value="Soluble"></option>
                <option value="Dulce"></option>
              </datalist>
          </fieldset>
        </form>
    </section>

    <br>
    <h3>Tabla de productos actuales</h3>
    <br>
    <table class="tabla-admin" border='1'>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Contenido</th>
        <th>Precio</th>
        <th>Tipo</th>
        <th>Descripci&oacute;n</th>
        <th>Eliminar</th>
        <th>Editar</th>
      </tr>
      <div>
        <?php while($row = mysqli_fetch_array($todo)) tabla($row); ?>
      </div>
    </table>

    <footer class="footer">
        <p>No hay mas elemenos.</p>
    </footer>

  </body>
</html>
