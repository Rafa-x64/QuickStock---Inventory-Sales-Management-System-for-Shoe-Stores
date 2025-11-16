<?php
function obtenerCategorias()
{
    $conn = conectar_base_datos();
    pg_prepare($conn, "obtener_categorias", "select * from core.categoria");
    $resultado = pg_execute($conn, "obtener_categorias", []);

    if (!$resultado) {
        return ["error" => "No se pudieron obtener las categorías"];
    }

    $categorias = pg_fetch_all($resultado);

    return ["categorias" => $categorias];
}
