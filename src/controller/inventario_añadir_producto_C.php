<?php
include_once "model/inventario.producto.php";
include_once "model/core.categoria.php";
include_once "model/core.color.php";
include_once "model/core.talla.php";
class inventario_añadir_producto_C extends mainModel
{
    public static function agregarProducto($formulario)
    {
        try {
            // 1. Sanitizar campos
            $codigo_barra   = trim($formulario['codigo_barra']);
            $nombre         = ucwords(trim($formulario['nombre']));
            $descripcion    = trim($formulario['descripcion']);
            $precio         = floatval($formulario['precio']);
            $id_proveedor   = isset($formulario['id_proveedor']) && intval($formulario['id_proveedor']) > 0 ? intval($formulario['id_proveedor']) : null;
            $id_sucursal    = intval($formulario['id_sucursal']);
            $cantidad       = intval($formulario['cantidad']);
            $minimo         = intval($formulario['minimo']);

            $nombre_categoria = !empty($formulario['nombre_categoria']) ? ucwords(trim($formulario['nombre_categoria'])) : null;
            $id_categoria     = !empty($formulario['id_categoria']) ? intval($formulario['id_categoria']) : null;

            $nombre_color = !empty($formulario['nombre_color']) ? ucwords(trim($formulario['nombre_color'])) : null;
            $id_color     = !empty($formulario['id_color']) ? intval($formulario['id_color']) : null;

            $rango_talla = !empty($formulario['rango_talla']) ? trim($formulario['rango_talla']) : null;
            $id_talla    = !empty($formulario['id_talla']) ? intval($formulario['id_talla']) : null;

            // 2. Validaciones
            if (empty($codigo_barra)) return "Código de barras obligatorio";
            if (empty($nombre)) return "Nombre obligatorio";
            if (empty($descripcion)) return "Descripción obligatoria";
            if ($precio < 1) return "Precio mínimo 1";
            if ($cantidad < 0) return "Stock inicial no puede ser negativo";
            if ($minimo < 1) return "Stock mínimo debe ser ≥ 1";
            if (!$id_sucursal) return "Debe seleccionar una sucursal";

            // 3. Categoría
            if ($nombre_categoria) {
                if (strlen($nombre_categoria) < 4) return "Nombre de categoría mínimo 4 letras";
                $categoria = new categoria(0, $nombre_categoria);
                $id_categoria = $categoria->crear();
            } elseif (!$id_categoria) {
                return "Debe seleccionar o agregar una categoría";
            }

            // 4. Color
            if ($nombre_color) {
                if (strlen($nombre_color) < 3) return "Color mínimo 3 letras";
                $color = new color(0, $nombre_color);
                $id_color = $color->crear();
            } elseif (!$id_color) {
                return "Debe seleccionar o agregar un color";
            }

            // 5. Talla
            if ($rango_talla) {
                if (!preg_match('/^(\d+)(\s?-\s?\d+)+$/', $rango_talla)) return 'Formato de talla inválido (ej: 39 - 41)';
                $talla = new talla(0, $rango_talla);
                $id_talla = $talla->crear();
            } elseif (!$id_talla) {
                return "Debe seleccionar o agregar una talla";
            }

            // 6. Verificar si el producto ya existe
            $productoExistente = producto::buscarPorNombreOCodigo($nombre, $codigo_barra);
            if ($productoExistente) return "El producto ya está registrado";

            // 7. Crear producto
            $producto = new producto(
                0,
                $nombre,
                $descripcion,
                $id_categoria,
                $id_color,
                $id_talla,
                $precio,
                $id_proveedor,
                true,
                $codigo_barra
            );

            $id_producto = $producto->crear();
            if (!$id_producto) return "Error al crear el producto";

            // 8. Agregar inventario inicial
            $producto->agregarInventario($id_producto, $id_sucursal, $cantidad, $minimo);

            return "Producto agregado correctamente";
        } catch (Exception $e) {
            return "Error al agregar producto: " . $e->getMessage();
        }
    }
}
