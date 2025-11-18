<?php
include_once "model/inventario.producto.php";
class inventario_eliminar_producto_C extends mainModel {
    public static function eliminarProducto($id_producto){
        $resultado = producto::eliminar($id_producto);
        return $resultado;
    }
}
