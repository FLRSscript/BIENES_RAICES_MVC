<?php
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/bienesraices2/build/css/app.css">
</head>

<body>
    <!-- HEADER -->
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraices2/index.php">
                    <img src="/bienesraices2/build/img/logo.svg" alt="logotipo de bienes raices">
                </a>
                <div class="mobile-menu">
                    <img src="/bienesraices2/build/img/barras.svg" alt="icono menu">
                </div>
                <div class="derecha">
                    <img src="/bienesraices2/build/img/dark-mode.svg" alt="darkmode icono" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="/bienesraices2/nosotros.php">Nosotros</a>
                        <a href="/bienesraices2/anuncios.php">Anuncios</a>
                        <a href="/bienesraices2/blog.php">Blog</a>
                        <a href="/bienesraices2/contacto.php">Contacto</a>
                        <?php if (!$auth) : ?>
                            <a href="/bienesraices2/login.php">Log In</a>
                        <?php endif; ?>
                        <?php if ($auth) : ?>
                            <a href="/bienesraices2/admin/index.php">Admin</a>
                            <a href="/bienesraices2/cerrar-sesion.php">Cerrar Session</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div><!-- barra -->
            <?php echo $inicio ? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>' : ''; ?>
        </div>
    </header>