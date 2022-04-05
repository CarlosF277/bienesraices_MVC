<fieldset>
    <legend>Informacion general</legend> <!--Ahora se hace referencia a los parametros recibidos de _POST en el objeto para el llenado de los campos del formulario-->

    <label for=titulo>Titulo</label>
    <input type="text" id=titulo name="propiedad[titulo]" placeholder="Titulo propiedad" value="<?php echo sanitiza($propiedad->titulo); ?>">

    <label for=precio>Precio</label>
    <input type="number" id=precio name = "propiedad[precio]" placeholder="Precio propiedad" value="<?php echo sanitiza($propiedad->precio); ?>">

    <label for=imagen>Imagen</label>
    <input type="file" id=imagen name= "propiedad[imagen]" accept="image/jpeg, image/png">

    <?php if($propiedad->imagen){ ?>
        <img src="/imagenes/<?php echo $propiedad->imagen;?>" class ="imagen-small">

    <?php }?>

    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="propiedad[descripcion]"> <?php echo sanitiza($propiedad->descripcion); ?></textarea>

</fieldset>

<fieldset>
    <legend>Informacion de la propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitiza($propiedad->habitaciones); ?>">

    <label for="wc">Baños</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitiza($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamientos</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitiza($propiedad->estacionamiento); ?>">

</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedorId]" id="vendedor">
        
        <option selected value="">-- Seleccione --</option>

        <?php foreach($vendedores as $vendedor){ ?>
            
            <option 
                <?php echo $propiedad->vendedorId === $vendedor->id ? "selected" : ""; ?> 
                value="<?php echo sanitiza($vendedor->id); ?>">
                <?php echo sanitiza($vendedor->nombre) ." " . sanitiza($vendedor->apellido) ; ?>
            </option>
        <?php }?>

    </select>

</fieldset>
