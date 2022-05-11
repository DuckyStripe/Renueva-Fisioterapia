<?php
$id = $_GET['id'];
if (isset($_GET['eliminar'])) {
    if ($_GET['eliminar'] == "cat") {
        $titulo = "Eliminar Categoria";
        $parrafo = "categoria";
        $eliminar="categoria";
        $link = "../shop/admin.php?action=settings";
    } elseif ($_GET['eliminar'] == "rol") {
        $titulo = "Eliminar Rol";
        $parrafo = "rol";
        $eliminar="rol";
        $link = "../shop/admin.php?action=settings";
    } else {
        echo '<script> alert("Regresando"); window.location.href="../shop/admin.php?action=settings"; </script>';
    }
} else {
    echo '<script> alert("Regresando"); window.location.href="../shop/admin.php?action=settings"; </script>';
}

?>


<section class="modal modal--show">
    <div class="modal__container">
        <form action="../../php/eliminarCR.php" method="post" id="eliminar">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="eliminar" value="<?php echo $eliminar; ?>">
        </form>
        <h2 class="color"><?php echo $titulo; ?></h2>
        <p class="modal__paragraph">¿Estas seguro de querer eliminar este <?php echo $parrafo ?>?</p>
        <div class="columnas1">
            <a href="javascript:{}" class="modal__close" onclick="document.getElementById('eliminar').submit();">Aceptar</a>
            <a href="<?php echo $link ?>" class="modal__close">Cancelar</a>
        </div>
    </div>
</section>