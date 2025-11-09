<?php
class sucursal extends mainModel 
{
    public static function crearSucursal($rif, $nombre, $direccion, $telefono){
        $conn = parent::conectar_base_datos();
        pg_prepare($conn, "agregar_sucursal", "insert into core.sucursal (id_sucursal, nombre, direccion, telefono, rif) values (1, $1, $2, $3, $4)");
        $resultado = pg_execute($conn, "agregar_sucursal", [$nombre, $direccion, $telefono, $rif]);
        if (!$resultado) {
            return false;
        }
        return true;
    }
}
