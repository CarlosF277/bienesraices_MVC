<?php
    
    use App\Propiedad;

    if($_SERVER["SCRIPT_NAME"] === "/anuncios.php"){ //para limitar el numero de anuncios, se lee de donde se manda a llamar este template
        $propiedades = Propiedad::all(); //trae todos los resultados
    }

    else{

        $propiedades = Propiedad::get(3); //trae todos los resultados
    }
    
?>

<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad): ?>

            <div class="anuncio">

                <img loading = "lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen anuncio">
               

                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad->titulo; ?></h3>
                    <p><?php echo $propiedad->descripcion; ?></p>
                    <p class="precio"><?php echo $propiedad->precio; ?></p>

                    <ul class="iconos-caracteristicas">

                        <li>
                            <img class = "icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad->wc; ?></p>
                        </li>

                        <li>
                            <img class = "icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono icono_estacionamiento">
                            <p><?php echo $propiedad->estacionamiento; ?></p>
                        </li>

                        <li>
                            <img class = "icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $propiedad->habitaciones; ?></p>
                        </li>

                    </ul>

                    <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
                        ver propiedad
                    </a>
                </div> <!--Contenido-anuncio-->

            </div> <!--Anuncio-->

        <?php endforeach; ?>

</div> <!--Contenedor anuncio-->
        


