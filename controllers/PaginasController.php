<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros');
    }
    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router)
    {
        $id = Redireccion('/propiedades');
        $propiedad = Propiedad::find($id);
        $router->render('/paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router)
    {
        $router->render('paginas/blog', []);
    }
    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada', []);
    }

    public static function contacto(Router $router)
    {   $errores = Propiedad::getErrores();
        $mensaje = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas  = $_POST['contacto'];
            // debug($_POST);
            //crear nueva instancia de la clase 
            $mail = new PHPMailer();
            //configuracion smtp
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Port = $_ENV['EMAIL_PORT'];
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls';

            //configurar conrenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //habilitar html
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //definir contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . ' </p>';
            //enviar cmapos de forma condicional
            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligió ser contactacdo por Telefono: </p>';
                $contenido .= '<p>telefono: ' . $respuestas['telefono'] . ' </p>';
                $contenido .= '<p>fecha: ' . $respuestas['fecha'] . ' </p>';
                $contenido .= '<p>hora: ' . $respuestas['hora'] . ' </p>';
            } else {
                $contenido .= '<p>Eligió ser contactado por E-mail: </p>';
                $contenido .= '<p>email: ' . $respuestas['email'] . ' </p>';
            }
            $contenido .= '<p>mensaje: ' . $respuestas['mensaje'] . ' </p>';
            $contenido .= '<p>opcion: ' . $respuestas['opcion'] . ' </p>';
            $contenido .= '<p>presupuesto: $' . $respuestas['presupuesto'] . ' </p>';
            $contenido .= '</html>';
            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';
            //enviar mail
            if ($mail->send()) {
                $mensaje =  'Mensaje enviado correctamente';
            } else {
                $mensaje =  'El mensaje no se pudo enviar';
            }
        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje,
            'errores' => $errores
        ]);
    }
}
