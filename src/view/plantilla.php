<?php

session_start();

$dashboard_gerente = ["dashboard-gerente-view.php", "inventario-ver-productos-view.php", 
            "inventario-añadir-producto-view.php", "inventario-gestionar-categorias-view.php", 
            "listado-compras-view.php", "añadir-compras-view.php", "punto-venta-view.php", 
            "historial-facturas-view.php", "cierre-caja-view.php", "clientes-gestionar-clientes-view.php", 
            "clientes-ver-listado-clientes-view.php", "empleado-gestionar-empleado-view.php", 
            "empleados-lista-empleados-view.php", "proveedores-detalles-view.php", 
            "proveedores-gestionar-proveedores-view.php", "proveedores-lista-view.php"];

$excepciones = ["404-view.php", "inicio-sesion-usuario-view.php", "registro-usuario-view.php"];

// siempre se incluyen los enlaces al inicio
include_once("assets/elements/links.php");

// si la vista es la página de inicio
if ($vista === "inicio-view.php") {
    include_once("assets/elements/header.php"); // encabezado
    include_once("assets/elements/menu-lateral.php"); // menú lateral exclusivo de inicio
    include_once("view/html/" . $vista); // contenido principal
    include_once("assets/elements/footer.php"); // pie de página
    include_once("assets/elements/scripts.php"); // scripts JS
    exit();
}

//si la vista es del registro o del inicio de sesion se carga un menu exclusivo de volver al inico
if ($vista === "inicio-sesion-usuario-view.php" || $vista === "registro-usuario-view.php") {
    include_once("assets/elements/menu_volver.php"); // menu para regresar exclusivo de registro y del inicio de sesion
    include_once("view/html/" . $vista); // contenido principal
    include_once("assets/elements/scripts.php"); // scripts JS
}

if (in_array($vista, $dashboard_gerente)) {
    include_once("assets/elements/menu-lateral-gerente.php"); // encabezado
    include_once("view/html/" . $vista); // contenido principal
    include_once("assets/elements/scripts.php"); // scripts JS
}

// si la vista está en excepciones (ej. 404)
include_once("view/html/" . $vista); // solo se carga el contenido
include_once("assets/elements/scripts.php"); // scripts JS