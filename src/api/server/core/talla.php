<?php 
function obtenerTallas(){
    $conn = conectar_base_datos();
    pg_prepare($conn, "obtener_tallas", "select * from core.talla");
    $resultado = pg_execute($conn, "obtener_tallas", []);
    if (!$resultado) {
        return ["error" => "No se pudieron obtener las tallas"];
    }
    $tallas = pg_fetch_all($resultado);

    return ["tallas" => $tallas];
}
?>