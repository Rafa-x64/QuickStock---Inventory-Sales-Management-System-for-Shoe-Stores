<?php 
function obtenerProveedores(){
    $conn = conectar_base_datos();
    pg_prepare($conn, "obtener_proveedores", "select * from core.proveedor");
    $resultado = pg_execute($conn, "obtener_proveedores", []);

    if (!$resultado) {
        return ["error" => "No se pudieron obtener los proveedores"];
    }

    $proveedores = pg_fetch_all($resultado);

    return ["proveedores" => $proveedores];

};
?>