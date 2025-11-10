<?php

function conectar_base_datos()
{
    $con = pg_connect("host= localhost port=5432 dbname=QuickStock user=postgres password=postgres");

    if (!$con) {
        error_log("Error de conexión a la base de datos PostgreSQL.");
        exit();
    }

    return $con;
}


