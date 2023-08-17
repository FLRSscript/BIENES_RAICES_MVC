<?php
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . '/funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');
function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/${nombre}.php";
}
function estaAutenticado(): bool
{
    //validacion de login
    session_start();
    if (!$_SESSION['login']) {
        header('location: /bienesraices2/index.php');
    }
    return true;
}
function debug($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}
//escapa / sanitizar el html
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}


//validar tipo de contenido
function validarContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}


//muestra los mensajes 
function notificaciones($codigo)
{
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;

            defualt:
            $mensaje = false;
            break;
    }
    return $mensaje;
}


function Redireccion(string $url)
{
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) header("Location: ${url}");
    return $id;
}
