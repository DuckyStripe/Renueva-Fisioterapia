<?php
$id = $_GET['id'];
if (isset($_GET['eliminar'])) {
    if ($_GET['eliminar'] == "producto") {
        $titulo = "Eliminar Producto";
        $parrafo = "producto";
        $link = "../shop/admin.php?action=editproducto&id=" . $id;
    } elseif ($_GET['eliminar'] == "cliente") {
        $titulo = "Eliminar Cliente";
        $parrafo = "Cliente";
        $link = "../shop/admin.php?action=eliminar&id=" . $id;
    } elseif ($_GET['eliminar'] == "personal") {
        $titulo = "Eliminar Personal";
        $parrafo = "Personal";
        $link = "../shop/admin.php?action=eliminar&id=" . $id;
    } else {
        $titulo = "Eliminar";
    }
} else {
    echo '<script> alert("Regresando"); window.location.href="../shop/admin.php?action=productos"; </script>';
}

?>


<section class="modal modal--show">
    <div class="modal__container">
        <form action="../../php/eliminarproducto.php" method="post" id="eliminar">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
        <h2 class="color"><?php echo $titulo; ?></h2>
        <p class="modal__paragraph">¿Estas seguro de querer eliminar este <?php echo $parrafo ?>?</p>
        <div class="columnas1">
            <a href="javascript:{}" class="modal__close" onclick="document.getElementById('eliminar').submit();">Aceptar</a>
            <a href="<?php echo $link ?>" class="modal__close">Cancelar</a>
        </div>
    </div>
</section>