<main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>

        <?php //funcion para los mensajes. toma el valor de la url pasado
        if ($resultado){
          $mensaje = mostrarNotificacion(intval($resultado));
          if($mensaje) { ?>

            <p class="alerta exito"> <?php echo sanitiza($mensaje); ?> </p>
          
            <?php
            }
        }
        ?>

        <a href="/propiedades/crear" class = "boton boton-verde">Nueva propiedad </a>
        <a href="/vendedores/crear" class = "boton boton-verde">Nuevo vendedor </a>

        <h2>Propiedades</h2>

        <table class="propiedades">
          <thead>
            <tr>
              <th>ID</th>
              <th>Titulo</th>
              <th>Imagen</th>
              <th>Precio</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody> <!-- MOSTRAR LOS RESULTADOS -->

          <?php foreach($propiedades as $propiedad): //objetos, no arreglos?> 
            <tr>
              <td><?php echo $propiedad->id; ?></td>
              <td><?php echo $propiedad->titulo; ?></td>
              <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
              <td>$ <?php echo $propiedad->precio; ?></td>
              <td>

                <form method="POST" class= "w-100"> <!--Se usa tipo form para poder enviar la informacion mediante  post-->

                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>"> <!--input no visible para el usuario-->
                <input type="hidden" name="tipo" value="propiedad"> <!--input no visible para el usuario-->
                <input type="submit" class="boton-rojo-block" value="Eliminar">

                </form>
                
                <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a> 
              </td>
            </tr>

            <?php endforeach; ?>
          </tbody>

        </table>

</main>