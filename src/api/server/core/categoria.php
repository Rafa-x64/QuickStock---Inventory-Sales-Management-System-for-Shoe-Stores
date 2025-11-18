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

function seleccionarCategoriaPorId($categoria){

    if($categoria == null || $categoria == ''){
        return ["categoria" => null];
    }

    $conn = conectar_base_datos();
    pg_prepare($conn, "seleccionar_categoria_por_id", "select * from core.categoria where id_categoria = $1");
    $resultado = pg_execute($conn, "seleccionar_categoria_por_id", [$categoria]);

    if (!$resultado) {
        return ["error" => "No se pudo obtener la categoría"];
    }

    $categoria = pg_fetch_assoc($resultado);

    return ["categoria" => $categoria];
}
