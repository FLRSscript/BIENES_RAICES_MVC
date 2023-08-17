<main class="contenedor seccion">
    <h1>Contacto</h1>
    <?php if ($mensaje) { ?>
        <p id="alerta" class='alerta exito'><?php echo $mensaje; ?> </p>;
    <?php } ?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen de contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form class="formulario" action="" method="POST">
        <fieldset>
            <legend>Informacion Personal</legend>
            <!-- nombre -->
            <label for="nombre">Nombre</label>
            <input type="text" name="contacto[nombre]" id="contacto[nombre]" placeholder="Tu nombre" required>
            <!-- mensaje -->
            <label for="telefono">Mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion sobre la propiedad</legend>
            <!-- venta o compra -->
            <label for="opciones">Vende o Compra</label>
            <select id="opciones" name="contacto[opcion]" required>
                <option value="" selected disabled>selecciona una opcion</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>
            <!-- presupuesto -->
            <label for="presupuesto">Presupuesto</label>
            <input type="number" name="contacto[presupuesto]" id="presupuesto" placeholder="Tu presupuesto" required>
        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <p>¿Cómo desea ser contactado?</p>
            <div class="forma-contacto">
                <!-- telefono via -->
                <label for="contactar-telefono">Telefono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]"required>
                <!-- mail via-->
                <label for="contactar-email">E-mail</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]"required>
            </div>
            <div id="contacto"></div>
        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>