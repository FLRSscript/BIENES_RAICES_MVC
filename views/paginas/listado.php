
<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) : ?>
        <div class="anuncio">
            <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Descripción de la imagen">
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
                <p class="precio"><?php echo $propiedad->precio; ?></p>
                <ul class="iconos-caract">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li><!-- icono -->
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono  estacionamiento">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li><!-- icono -->
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li><!-- icono -->
                </ul>
                <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton boton-amarillo">Ver Propiedad</a>
            </div><!-- contenido-anuncio -->
        </div><!-- ANUNCIO -->
    <?php endforeach; ?>
</div><!-- contenedor de anuncios -->

