<?php
function obtenerTodosLosProductos(
    $nombre = null,
    $codigo = null,
    $categoria = null,
    $proveedor = null,
    $sucursal = null,
    $estado = null
) {
    // Asegúrate de que esta función está definida para conectar a tu DB
    $conn = conectar_base_datos();

    // --- 1. NORMALIZACIÓN Y PREPARACIÓN DE PARÁMETROS ---
    $nombre    = $nombre !== null ? trim($nombre) : null;
    $codigo    = $codigo !== null ? trim($codigo) : null;

    // Los IDs de los selects deben ser enteros, o null si están vacíos ("")
    $categoria = $categoria ? (int)$categoria : null;
    $proveedor = $proveedor ? (int)$proveedor : null;
    $sucursal  = $sucursal ? (int)$sucursal : null;

    // Manejo del estado: convertir el string JS ("true"/"false") a booleano PHP (true/false) o null
    $estado_filtrar = null;
    if ($estado === "true") {
        $estado_filtrar = true;
    } elseif ($estado === "false") {
        $estado_filtrar = false;
    }

    // --- 2. GENERACIÓN DEL WHERE DINÁMICO ---
    $clauses = [];
    $params = [];
    $i = 1;

    // Nombre (búsqueda parcial insensible a mayúsculas/minúsculas)
    if ($nombre) {
        $clauses[] = "p.nombre ILIKE $" . $i;
        $params[] = "%" . $nombre . "%";
        $i++;
    }

    // Código de barra (búsqueda parcial insensible a mayúsculas/minúsculas)
    if ($codigo) {
        $clauses[] = "p.codigo_barra ILIKE $" . $i;
        $params[] = "%" . $codigo . "%";
        $i++;
    }

    // Categoría (ID exacto)
    if ($categoria) {
        $clauses[] = "p.id_categoria = $" . $i;
        $params[] = $categoria;
        $i++;
    }

    // Proveedor (ID exacto)
    if ($proveedor) {
        $clauses[] = "p.id_proveedor = $" . $i;
        $params[] = $proveedor;
        $i++;
    }

    // Sucursal (ID exacto, filtrando por la tabla de inventario)
    if ($sucursal) {
        $clauses[] = "i.id_sucursal = $" . $i;
        $params[] = $sucursal;
        $i++;
    }

    // Estado (booleano)
    if ($estado_filtrar !== null) {
        $clauses[] = "p.activo = $" . $i;

        // CORRECCIÓN: Convertir el booleano PHP a un string de PostgreSQL ('t' o 'f')
        $param_estado = $estado_filtrar ? 't' : 'f';

        $params[] = $param_estado;
        $i++;
    }

    // Construcción de la cláusula WHERE
    $where = !empty($clauses) ? "WHERE " . implode(" AND ", $clauses) : "";

    // --- 3. CONSULTA SQL PRINCIPAL ---
    $sql = "
        SELECT 
            p.id_producto,
            p.nombre,
            p.descripcion,
            p.codigo_barra AS codigo,
            p.precio_compra,
            p.precio_venta,
            p.activo AS estado,
            c.nombre AS categoria_nombre,
            col.nombre AS color,
            t.rango_talla AS talla,
            pr.nombre AS proveedor_nombre,
            i.cantidad AS stock,
            i.minimo,
            s.nombre AS sucursal_nombre,
            s.id_sucursal
        FROM inventario.producto p
        LEFT JOIN core.categoria c ON c.id_categoria = p.id_categoria
        LEFT JOIN core.color col ON col.id_color = p.id_color
        LEFT JOIN core.talla t ON t.id_talla = p.id_talla
        LEFT JOIN core.proveedor pr ON pr.id_proveedor = p.id_proveedor
        LEFT JOIN inventario.inventario i ON i.id_producto = p.id_producto
        LEFT JOIN core.sucursal s ON s.id_sucursal = i.id_sucursal
        $where
        ORDER BY p.id_producto ASC
    ";

    // --- 4. EJECUCIÓN DE LA CONSULTA ---

    // Preparar y ejecutar la consulta con sentencias preparadas
    $stmt = "stmt_" . uniqid();
    if (!pg_prepare($conn, $stmt, $sql)) {
        return [
            "status" => "error",
            "message" => "Error al preparar la consulta",
            "detalle" => pg_last_error($conn)
        ];
    }

    $result = pg_execute($conn, $stmt, $params);

    if (!$result) {
        return [
            "status" => "error",
            "message" => "Error al ejecutar la consulta",
            "detalle" => pg_last_error($conn)
        ];
    }

    $productos = pg_fetch_all($result) ?: [];

    // --- 5. RETORNO DE RESULTADOS ---
    return [
        "status" => "success",
        "data" => $productos
    ];
}

function traerProductosSucursal() {}

function obtenerUnProducto($id_producto)
{
    $conn = conectar_base_datos();

    // Validar ID
    $id_producto = (int)$id_producto;
    if ($id_producto <= 0) return null;

    // Consulta principal: producto + categoría + color + talla + proveedor
    $query = "
        SELECT 
            p.id_producto,
            p.nombre,
            p.descripcion,
            p.codigo_barra,
            p.precio_venta AS precio,
            p.precio_compra,
            p.id_categoria,
            c.nombre AS nombre_categoria,
            c.descripcion AS descripcion_categoria,
            p.id_color,
            col.nombre AS nombre_color,
            p.id_talla,
            t.rango_talla,
            p.id_proveedor,
            prov.nombre AS nombre_proveedor,
            p.activo
        FROM inventario.producto p
        LEFT JOIN core.categoria c ON c.id_categoria = p.id_categoria
        LEFT JOIN core.color col ON col.id_color = p.id_color
        LEFT JOIN core.talla t ON t.id_talla = p.id_talla
        LEFT JOIN core.proveedor prov ON prov.id_proveedor = p.id_proveedor
        WHERE p.id_producto = $1
        LIMIT 1
    ";

    $stmtName = "obtener_producto_" . uniqid();
    pg_prepare($conn, $stmtName, $query);
    $result = pg_execute($conn, $stmtName, [$id_producto]);

    if (!$result) {
        return ["error" => "Error al ejecutar la consulta", "detalle" => pg_last_error($conn)];
    }

    $producto = pg_fetch_assoc($result);
    if (!$producto) return null;

    // Traer inventario por sucursal
    $queryInventario = "
        SELECT 
            i.id_sucursal,
            s.nombre AS nombre_sucursal,
            i.cantidad,
            i.minimo
        FROM inventario.inventario i
        LEFT JOIN core.sucursal s ON s.id_sucursal = i.id_sucursal
        WHERE i.id_producto = $1
    ";

    $stmtInvName = "obtener_inventario_" . uniqid();
    pg_prepare($conn, $stmtInvName, $queryInventario);
    $resInv = pg_execute($conn, $stmtInvName, [$id_producto]);

    $inventario = [];
    while ($row = pg_fetch_assoc($resInv)) {
        $inventario[] = $row;
    }

    $producto["inventario"] = $inventario;

    return $producto;
}
