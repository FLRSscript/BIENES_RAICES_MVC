<?php

namespace MVC;

class Router
{
    public $rutasGET = [];
    public $rutasPOST = [];
    public function get($url, $function)
    {
        $this->rutasGET[$url] = $function;
    }
    public function post($url, $function)
    {
        $this->rutasPOST[$url] = $function;
    }
    public function comprobarRutas()
    {
        session_start();
        $auth = $_SESSION['login'] ?? null;
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];
        $urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $function = $this->rutasGET[$urlActual] ?? null;
        } else {

            $function = $this->rutasPOST[$urlActual] ?? null;
        }

        //proteger las rutas
        if (in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('location: /');
        }

        if ($function) {
            call_user_func($function, $this);
        } else {
            echo 'Página no encontrada';
        }
    }


    //mostrar la vista
    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();
        include __DIR__ . '/views/layout.php';
    }
}


/* buenas tardes eso es solo parar probar una actualizacion en el repositorio  de github */