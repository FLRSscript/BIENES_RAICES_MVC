<fieldset>
    <legend>Informacion General</legend>
    <label for="titulo">Titulo:</label>
    <input type="text" name="propiedad[titulo]" id="titulo" placeholder="titulo de la propiedad" value="<?php echo s($propiedad->titulo); ?>">
    <label for="precio">Precio:</label>
    <input type="text" name="propiedad[precio]" id="precio" placeholder="precio de la propiedad" value="<?php echo s($propiedad->precio); ?>">
    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/png">
    <?php if ($propiedad->imagen) { ?>
        <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-small">
    <?php } ?>
    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="propiedad[descripcion]" placeholder="Dejanos un mensaje..."><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>
<fieldset>
    <legend>Informacion De La Propiedad</legend>
    <label for="habitaciones">Habitaciones:</label>
    <input type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones); ?>">
    <label for="wc">Baños:</label>
    <input type="number" name="propiedad[wc]" id="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->wc); ?>">
    <label for="estacionamiento">Estacionamiento</label>
    <input type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="Ej: 2" value="<?php echo s($propiedad->estacionamiento); ?>">
</fieldset>
<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedores_id]" id="vendedor">
        <option selected disabled value="">--seleccione--</option>
        <?php foreach ($vendedores as $vendedor) { ?>
            <option <?php echo $propiedad->vendedores_id == $vendedor->id ? 'selected' : ''; ?> value="<?php echo s($vendedor->id)?>"><?php  echo s($vendedor->nombre) . "  " . s($vendedor->apellido); ?></option>
            <?php } ?>
        </select>
        
</fieldset>