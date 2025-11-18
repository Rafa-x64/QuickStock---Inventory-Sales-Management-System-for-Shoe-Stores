<?php
include_once "model/core.categoria.php";

class gestionar_categorias_C extends mainModel
{
    public static function crearCategoria($formulario): array
    {
        try {
            // 1. SANITIZACIÓN DE DATOS

            // Nombre (String, quitando tags HTML/PHP)
            $nombre = filter_var(trim($formulario["nombre_categoria_añadir"] ?? ''), FILTER_SANITIZE_STRING);

            // Descripción (String, permitiendo espacios y saltos de línea, quitando tags)
            $descripcion = filter_var(trim($formulario["descripcion_categoria_añadir"] ?? ''), FILTER_SANITIZE_STRING);
            // Si está vacía, se convierte a NULL para la BD
            $descripcion = !empty($descripcion) ? $descripcion : null;

            // Categoría Padre (Entero)
            $id_padre = filter_var($formulario["categoria_padre_añadir"] ?? 0, FILTER_VALIDATE_INT);
            // Si es 0 (Ninguna) o inválido, es NULL para la BD
            $id_padre = ($id_padre === false || $id_padre === 0) ? null : $id_padre;

            // 2. INSTANCIAR EL MODELO Y PASAR VALIDACIONES

            // ATENCIÓN: El orden de los argumentos debe coincidir con el constructor:
            // __construct(int $id_categoria, string $nombre, ?string $descripcion, bool $activo, ?int $id_categoria_padre)
            $categoria_obj = new categoria(
                0,                  // 1. $id_categoria (0 temporal)
                $nombre,            // 2. $nombre
                $descripcion,       // 3. $descripcion (?string)
                true,               // 4. $activo (bool)
                $id_padre           // 5. $id_categoria_padre (?int)
            );

            // 3. LLAMAR AL MÉTODO DE CREACIÓN DEL MODELO
            $id_nuevo = $categoria_obj->crear();

            if ($id_nuevo > 0) {
                return ["success" => true, "mensaje" => "Categoría registrada con ID: $id_nuevo."];
            } else {
                // Esto podría ocurrir si la categoría ya existía (lógica en el modelo)
                return ["error" => true, "mensaje" => "No se pudo crear la categoría o ya existe una con ese nombre."];
            }
        } catch (InvalidArgumentException $e) {
            // Captura errores de validación (ej. nombre vacío o muy largo)
            return ["error" => true, "mensaje" => "Error de datos: " . $e->getMessage()];
        } catch (\Exception $e) {
            // Captura errores de conexión a BD o de la operación
            error_log("Error al crear categoría: " . $e->getMessage());
            return ["error" => true, "mensaje" => "Error interno del servidor al intentar crear la categoría."];
        }
    }

    public static function editarCategoria($formulario): array
    {
        try {
            // 1. SANITIZACIÓN DE DATOS

            // ID (Debe ser un entero)
            $id_categoria = filter_var($formulario["id_categoria_editar"] ?? 0, FILTER_VALIDATE_INT);
            if ($id_categoria === false || $id_categoria <= 0) {
                return ["error" => true, "mensaje" => "ID de categoría no válido."];
            }

            $nombre = filter_var(trim($formulario["nombre_categoria_editar"] ?? ''), FILTER_SANITIZE_STRING);

            $descripcion = filter_var(trim($formulario["descripcion_categoria_editar"] ?? ''), FILTER_SANITIZE_STRING);
            $descripcion = !empty($descripcion) ? $descripcion : null; // Si está vacía, se convierte a NULL

            $id_padre = filter_var($formulario["categoria_padre_editar"] ?? 0, FILTER_VALIDATE_INT);
            $id_padre = ($id_padre === false || $id_padre === 0) ? null : $id_padre; // Si es 0 o inválido, es NULL

            $activo_str = strtolower($formulario["activo_editar"] ?? 'f');
            $activo = ($activo_str === 'activo' || $activo_str === 't' || $activo_str === 'true');

            $categoria_obj = new categoria(
                $id_categoria,
                $nombre,
                $descripcion,
                $activo,
                $id_padre
            );

            if ($categoria_obj->editar()) {
                return ["success" => true, "mensaje" => "Categoría actualizada correctamente."];
            } else {
                return ["error" => true, "mensaje" => "No se pudo actualizar la categoría o no hubo cambios."];
            }
        } catch (InvalidArgumentException $e) {
            return ["error" => true, "mensaje" => "Error de datos: " . $e->getMessage()];
        } catch (\Exception $e) {
            error_log("Error al editar categoría: " . $e->getMessage());
            return ["error" => true, "mensaje" => "Error interno del servidor al intentar editar la categoría."];
        }
    }

    public static function eliminarCategoria($formulario): array
    {
        try {
            // 1. SANITIZACIÓN DE DATOS

            // ID (Puede venir como 'id_categoria' o 'id_categoria_eliminar')
            $id_categoria = filter_var($formulario["id_categoria"] ?? $formulario["id_categoria_eliminar"] ?? 0, FILTER_VALIDATE_INT);

            if ($id_categoria === false || $id_categoria <= 0) {
                return ["error" => true, "mensaje" => "ID de categoría no válido para eliminar."];
            }

            // 2. LLAMAR AL MÉTODO DE ELIMINACIÓN DEL MODELO
            if (categoria::eliminar($id_categoria)) {
                return ["success" => true, "mensaje" => "Categoría eliminada (desactivada) correctamente."];
            } else {
                return ["error" => true, "mensaje" => "No se pudo eliminar la categoría. ID no encontrado."];
            }
        } catch (\Exception $e) {
            error_log("Error al eliminar categoría: " . $e->getMessage());
            return ["error" => true, "mensaje" => "Error interno del servidor al intentar eliminar la categoría."];
        }
    }
}
