<?php 
function obtenerColores(){
    $conn = conectar_base_datos();
    pg_prepare($conn, "obtener_colores", "select * from core.color");
    $resultado = pg_execute($conn, "obtener_colores", []);
    if (!$resultado) {
        return ["error" => "No se pudieron obtener los colores"];
    }
    $colores = pg_fetch_all($resultado);

    return ["colores" => $colores];
}
?>