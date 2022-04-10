<main class="contenedor seccion">
    <h1>Actualizar vendedor</h1>

    <a href="/admin/index.php" class = "boton boton-verde">Volver</a>

    <?php
    //mostrando los mensajes de error

    foreach($errores as $error):?>

    <div class="alerta error">
        <?php echo $error ?>
    </div>

    <?php endforeach; ?>

    <form class = "formulario" method="POST" enctype="multipart/form-data"> <!--se quita el action a la url por el id que se pasa. si no al ejecutar borra el id y no hace nada-->
        
        <?php include "formulario.php"; ?>

        <input type="submit" value="Guardar cambios" class="boton boton-verde">

    </form>

</main>