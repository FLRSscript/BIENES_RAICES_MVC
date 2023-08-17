<main class="contendor seccion">
    <h1>Más Sobre Nosotros</h1>

    <?php include 'iconos.php'; ?>
</main>
<section class="seccion contenedor">
    <h2>Casas y Depas en Venta</h2>
    <?php
    include 'listado.php';
    ?>
    <div class="alinear-derecha">
        <a href="/propiedades" class="boton boton-verde">Ver Todas</a>
    </div>
</section>

<!-- SECCION CONTACTO -->

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formualrio para ponerte en contacto con un asesor</p>
    <a href="/contacto" class="boton-amarillo">Contactanos</a>
</section>


<!-- SECCION TESTIMONIALES -->

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="/build/img/blog1.jpg" alt="texto de blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y
                        ahorrando dinero</p>
                </a>
            </div>
        </article><!-- BLOG -->
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="/build/img/blog2.jpg" alt="texto de blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>Maximisa el espacio de tu hogar con estos simples consejos</p>
                </a>
            </div>
        </article><!-- BLOG -->
    </section>
    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>Una excelente atencion, superaron mis expectativas ademas de que los precios son muy
                accesibles</blockquote>
            <p>-JayCode</p>
        </div>
    </section>
</div>