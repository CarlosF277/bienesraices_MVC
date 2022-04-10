<fieldset>
    <legend>Informacion general</legend> <!--Ahora se hace referencia a los parametros recibidos de _POST en el objeto para el llenado de los campos del formulario-->

    <label for=nombre>Nombre</label>
    <input type="text" id=nombre name="vendedor[nombre]" placeholder="Nombre Vendedor" value="<?php echo sanitiza($vendedor->nombre); ?>">

    
    <label for=apellido>Apellido</label>
    <input type="text" id=apellido name="vendedor[apellido]" placeholder="apellido Vendedor" value="<?php echo sanitiza($vendedor->apellido); ?>">

</fieldset>

<fieldset>
    <legend>Informacion extra</legend> <!--Ahora se hace referencia a los parametros recibidos de _POST en el objeto para el llenado de los campos del formulario-->

    <label for=telefono>Telefono</label>
    <input type="text" id=telefono name="vendedor[telefono]" placeholder="Telefono Vendedor" value="<?php echo sanitiza($vendedor->telefono); ?>">


</fieldset>