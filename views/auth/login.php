
<main class="contenedor seccion  contenido-centrado">
    <h1>Iniciar Sesion</h1>
    <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
    <?php echo $error; ?>
    </div>
    <?php endforeach; ?>
    <form action="" method="POST" class="formulario">
        <fieldset>
        <!-- email -->
        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" placeholder="Tu email">
        <!-- password -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Tu password">
        </fieldset>
        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>
