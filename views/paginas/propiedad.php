
<main class="contenedor anuncio seccion contenido-centrado">
    <h1><?php echo $propiedad->titulo; ?></h1>
        <img class="anuncio__imagen" loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen propiedad">
    <div class="resumen-propiedad">
        <p class="precio">$<?php echo $propiedad->precio; ?></p>
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
        <p class="anuncio__descripcion"><?php echo $propiedad->descripcion; ?></p>
    </div>
</main>
