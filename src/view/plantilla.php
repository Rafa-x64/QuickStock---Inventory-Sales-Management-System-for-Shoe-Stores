<?php

session_start();

$dashboard_gerente = [
    // 1. DASHBOARD
    "dashboard-gerente-view.php",

    // 2. INVENTARIO
    "inventario-ver-productos-view.php",
    "inventario-añadir-producto-view.php",
    "inventario-gestionar-categorias-view.php",
    "inventario-ajustes-manuales-stock-view.php",
    "inventario-stock-bajo-view.php",

    // 3. COMPRAS
    "listado-compras-view.php",          // Si este es diferente a "compras-historial"
    "compras-añadir-view.php",
    "compras-historial-view.php",
    "compras-detalle-view.php",

    // 4. VENTAS
    "ventas-punto-venta-view.php",
    "ventas-historial-facturas-view.php",
    "ventas-productos-populares-view.php",
    "ventas-cierre-caja-view.php",

    // 4.1. VENTAS - Métodos de Pago
    "ventas-añadir-metodo-pago-view.php",
    "ventas-lista-metodos-pago-view.php",
    "ventas-detalle-metodo-pago-view.php",
    "ventas-metodo-pago-view.php", // Si es necesario, lo mantengo

    // 5. CLIENTES
    "clientes-listado-view.php",
    "clientes-detalle-view.php",

    // 6. PROVEEDORES
    "proveedores-listado-view.php",
    "proveedores-añadir-view.php",
    "proveedores-detalles-view.php",

    // 7. EMPLEADOS
    "empleados-listado-view.php",
    "empleados-añadir-view.php",
    "empleados-detalle-view.php",

    // 7.1. EMPLEADOS - Roles
    "empleados-añadir-rol-view.php",
    "empleados-lista-roles-view.php",
    "empleados-detalle-rol-view.php",

    // 8. MONEDAS Y TASAS
    // Tasas
    "monedas-tasas-activas-view.php",
    "monedas-añadir-tasas-view.php",
    "monedas-historial-view.php",
    // Monedas
    "monedas-listado-view.php",
    "monedas-añadir-view.php",

    // 9. CONFIGURACIÓN (Cuenta)
    "configurar-cuenta-view.php"
];

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