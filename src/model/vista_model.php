<?php

class vista_model
{
    //metodo que obtiene la vista que se le asigna en $pagina
    protected static function obtenerVista($pagina) //recive una variable pagina
    {
        // ruta esperada del archivo de vista
        $ruta = "view/html/" . $pagina . "-view.php";

        // verifica si el archivo existe físicamente en el sistema
        if (!file_exists($ruta)) { // si no existe el archivo entonces...
            return "404-view.php"; // página de error 404
            exit();
        }

        // retorna $pagina-view para ser abierta por el controlador si el archivo existe
        return $pagina . "-view.php";
    }
}
