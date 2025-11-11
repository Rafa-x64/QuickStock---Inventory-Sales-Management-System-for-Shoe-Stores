<?php 
function obtenerSucursales(){
    $con = conectar_base_datos();
    pg_prepare($con, "obtener_sucursales","SELECT * FROM core.sucursal ORDER BY id_sucursal ASC");
    $res = pg_execute($con, "obtener_sucursales", []);

    if(!$res){
        return ["error" => "Error al obtener las sucursales"];
    }

    $filas = pg_fetch_all($res);

    if(!$filas){
        return [];
    }

    return ["filas" => $filas ?: []];
}
?>