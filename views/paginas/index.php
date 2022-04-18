<main class="contenedor seccion">
        <h2 data-cy="heading-nosotros">Mas sobre nosotros</h1>

        <?php include "iconos.php"; ?>

    </main>

    <section class="seccion contenedor">
        <h2>Casas y depas en venta</h2>

        <?php
            include "listado.php";
        ?>

        <div class="alinear-derecha">
            <a data-cy="todas-propiedades" href="/propiedades" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section data-cy="imagen-contacto" class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>LLena el formulario y nos contactaremos contigo</p>
        <a href="/contacto" class="boton-amarillo-inline">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="imagen entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por <span>admin</span></p>

                        <p>
                            Consejos para construir una terraza en el techo de tu csas con los mejosres materiales
                        </p>
                    </a>
                </div>


            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="imagen entrada blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por <span>admin</span></p>

                        <p>
                            Maximiza el espacio
                        </p>
                    </a>
                </div>


            </article>

        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal es altamente profesional
                </blockquote>

                <p>Juan D</p>
            </div>

        </section>

    </div>