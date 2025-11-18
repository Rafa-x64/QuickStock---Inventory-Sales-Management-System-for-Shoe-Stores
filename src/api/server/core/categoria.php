<?php
function obtenerCategorias()
{
    $conn = conectar_base_datos();

    // Consulta SQL con LEFT JOIN para obtener el nombre del padre (cp.nombre)
    $sql = "SELECT 
                c.id_categoria, 
                c.nombre, 
                c.descripcion, 
                c.activo, 
                c.id_categoria_padre,
                cp.nombre AS nombre_categoria_padre  -- Alias para el nombre del padre
            FROM 
                core.categoria c
            LEFT JOIN 
                core.categoria cp ON c.id_categoria_padre = cp.id_categoria
            ORDER BY c.id_categoria"; // Opcional: ordenar por nombre

    pg_prepare($conn, "obtener_categorias_join", $sql);
    $resultado = pg_execute($conn, "obtener_categorias_join", []);

    if (!$resultado) {
        return ["error" => "No se pudieron obtener las categorías"];
    }

    $categorias = pg_fetch_all($resultado);

    if ($categorias === false) {
        return ["categorias" => []];
    }

    return ["categorias" => $categorias];
}

function seleccionarCategoriaPorId($categoria)
{

    if ($categoria == null || $categoria == '') {
        return ["categoria" => null];
    }

    $conn = conectar_base_datos();
    pg_prepare($conn, "seleccionar_categoria_por_id", "
            SELECT 
                c.id_categoria, 
                c.nombre, 
                c.descripcion, 
                c.activo, 
                c.id_categoria_padre,
                cp.nombre AS nombre_categoria_padre
            FROM 
                core.categoria c
            LEFT JOIN 
                core.categoria cp ON c.id_categoria_padre = cp.id_categoria
            WHERE 
                c.id_categoria = $1
            ORDER BY c.id_categoria
    ");
    $resultado = pg_execute($conn, "seleccionar_categoria_por_id", [$categoria]);

    if (!$resultado) {
        return ["error" => "No se pudo obtener la categoría"];
    }

    $categoria = pg_fetch_assoc($resultado);

    return ["categoria" => $categoria];
}

function obtenerCategoriasFiltro($string){

    if($string == null || $string == ''){
        return ["categorias" => []];
    }

    $conn = conectar_base_datos();

    // Consulta SQL con LEFT JOIN para obtener el nombre del padre (cp.nombre)
    $sql = "SELECT 
                c.id_categoria, 
                c.nombre, 
                c.descripcion, 
                c.activo, 
                c.id_categoria_padre,
                cp.nombre AS nombre_categoria_padre  -- Alias para el nombre del padre
            FROM 
                core.categoria c
            LEFT JOIN 
                core.categoria cp ON c.id_categoria_padre = cp.id_categoria
            WHERE c.nombre ILIKE '%' || $1 || '%'
            ORDER BY c.id_categoria"; // Opcional: ordenar por nombre

    pg_prepare($conn, "obtener_categorias_filtro", $sql);
    $resultado = pg_execute($conn, "obtener_categorias_filtro", [$string]);

    if (!$resultado) {
        return ["error" => "No se pudieron obtener las categorías"];
    }

    $categorias = pg_fetch_all($resultado);

    if ($categorias === false) {
        return ["categorias" => []];
    }

    return ["categorias" => $categorias];
}
