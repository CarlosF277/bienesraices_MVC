<main class="contenedor seccion">
        <h1>Crear</h1>


        <?php
        //mostrando los mensajes de error

        foreach($errores as $error):?>

        <div class="alerta error">
          <?php echo $error ?>
        </div>

        <?php endforeach; ?>

        <a href="/admin/index.php" class = "boton boton-verde">Volver</a>

        <form class="formulario" method="POST" enctype="multipart/form-data">

            <?php include __DIR__ . "/formulario.php"; ?>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">

        </form>
        
</main>