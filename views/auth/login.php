<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="heading-login">Iniciar sesion</h1>

        <?php  foreach($errores as $error):?>
            <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
        <?php endforeach; ?>

        <div>

        </div>

        <form data-cy="formulario-login" class="formulario" method="POST" action="/login">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" placeholder="Tu E-Mail" required>

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Tu password" >

            </fieldset>

            <input type="submit" value="Iniciar sesion" class="boton boton-verde">
        </form>

    </main>