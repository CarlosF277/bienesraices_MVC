

<main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type = "image/webp">
            <source srcset="build/img/destacada3.jpg" type = "image/jpg">
            <img loading= "lazy" src="build/img/destacada3.jpg" alt="imagen contacto">
        </picture>

        <h2>Llene el formulario de contacto</h2>
 
        <form class="formulario" action="/contacto" method="POST">

            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

                <label for="email">E-Mail</label>
                <input type="email" placeholder="Tu e-mail" id="email" name="contacto[email]" required>

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="contacto[mensaje]" required></textarea>

            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <label for="opciones">Vende o compra</label>

                <select id="opciones" name="contacto[tipo]" required>
                    <option value="" disabled selected>--Seleccione una opcion</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">presupuesto o precio</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" required>

            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>
                    <!--En los radio buttons, el name debe ser el mismo-->
                    <label for="contactar-email">E-Mail</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                </div>

                <p>Si eligio telefono, eliga una fecha y hora para ser contactado</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="contacto[fecha]">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">

            </fieldset>

            <input type="submit" value="enviar" class="boton-verde">

        </form>

    </main>