<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $resultado =  $_GET['resultado'] ?? null;
        $vendedores = Vendedor::all();
        $router->render('/propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }
    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores =  Vendedor::all();
        $errores = Propiedad::getErrores();
        //ejecutar el codigo despues de enviar el formulario
        if ($_SERVER["REQUEST_METHOD"]  === 'POST') {
            $propiedad = new Propiedad($_POST['propiedad']);
            //generar un nombre unico
            $nombreImagen =  md5(uniqid(rand(), true)) . '.jpg';
            //realizar rezise a la imagen
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }
            $errores = $propiedad->validar();
            //revisar que el arreglo de errores este vacio
            if (empty($errores)) {
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //guarda la imagen 
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                //guarda la imagen en base de datos
                $propiedad->guardar();
            }
        }
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    
    public static function actualizar(Router $router)
    {

        $id = Redireccion('/admin');

        $propiedad = Propiedad::find($id);
        $vendedores =  Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER["REQUEST_METHOD"]  === 'POST') {
            //asignar atributos
            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);
            $errores = $propiedad->validar();

            //subida de archivos
            $nombreImagen =  md5(uniqid(rand(), true)) . '.jpg';
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }
            //revisar que el arreglo de errores este vacio
            if (empty($errores)) {
                //Almacenar la imagen
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                //Guardar los datos de la propiedad
                $propiedad->guardar();
            }
        }
        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}
