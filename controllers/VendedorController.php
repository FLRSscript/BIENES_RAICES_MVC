<?php

namespace Controllers;

use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;

class VendedorController
{

    public static function crear(Router $router)
    {
        $vendedor = new Vendedor;
        $errores =  Vendedor::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args);
            $errores = $vendedor->validar();
            if (empty($errores)) {
                $vendedor->guardar();
                header('location: /admin?resultado=1');
            }
        }
        $router->render('/vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores

        ]);
    }
    public static function actualizar(Router $router)
    {
        $id = Redireccion('/admin');
        $vendedor = Vendedor::find($id);
        $errores =  Vendedor::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args);
            $errores = $vendedor->validar();
            if (empty($errores)) {
                $vendedor->guardar();
                header('location: /admin?resultado=2');
            }
        }
        $router->render('/vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores

        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                $tipo = $_POST['tipo'];
                if(validarContenido($tipo)){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}
