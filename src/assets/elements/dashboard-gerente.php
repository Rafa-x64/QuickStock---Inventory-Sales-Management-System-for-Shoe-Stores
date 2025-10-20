<div class="col-2 col-md-1 h-100 p-0 m-0 position-fixed menu-lateral-gerente" id="menuLateral">
    <div class="row h-100 w-100 p-0 m-0 d-flex flex-column justify-content-start align-items-start">

        <div class="col-12 p-0 p-2 m-0 d-flex flex-row justify-content-end align-items-center">
            <button type="button" class="btn Quick-white-btn" id="botonToggle">
                <i class="bi bi-three-dots-vertical fs-6"></i>
            </button>
        </div>

        <div class="col-12 p-0 d-column flex-row justify-content-center align-items-center">
            <a href="" class="d-flex flex-column text-white">
                <div class="row p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                    <div class="col-12 p-3 d-flex justify-content-center">
                        <img src="<?php echo SERVERURL ?>/assets/images/example-menu-lateral-imagen-usuario.jpg" alt="" class="img-fluid imagen-usuario">
                    </div>
                    <div class="col-12 p-0">
                        <p class="fs-6 text-center fw-bold texto-menu">Nombre usuario</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 p-0 menu-items-scrollable">

            <div class="col-12 p-0 mt-2 menu-item">
                <details class="menu-details">
                    <summary class="d-flex flex-row align-items-center Quick-white-link">
                        <i class="bi bi-box2 fs-5"></i>
                        <p class="texto-menu">Inventario</p>
                    </summary>
                    <div class="menu-submenu d-flex flex-column ps-5">
                        <a href="#" class="ms-3">Ver Productos</a>
                        <a href="#" class="ms-3">Gestionar Producto</a>
                        <a href="#" class="ms-3">Gestionar Categorias</a>
                    </div>
                </details>
            </div>

            <div class="col-12 p-0 mt-2 menu-item">
                <details class="menu-details">
                    <summary class="d-flex flex-row align-items-center Quick-white-link">
                        <i class="bi bi-bag-plus fs-5"></i>
                        <p class="texto-menu">Compras</p>
                    </summary>
                    <div class="menu-submenu d-flex flex-column ps-5">
                        <a href="listado-compras" class="ms-3">Listado de Compras</a>
                        <a href="#" class="ms-3">Registrar Nueva Compra</a>
                    </div>
                </details>
            </div>

            <div class="col-12 p-0 mt-2 menu-item">
                <details class="menu-details">
                    <summary class="d-flex flex-row align-items-center Quick-white-link">
                        <i class="bi bi-cash-coin fs-5"></i>
                        <p class="texto-menu">Ventas</p>
                    </summary>
                    <div class="menu-submenu d-flex flex-column ps-5">
                        <a href="#" class="ms-3">Punto de Venta</a>
                        <a href="#" class="ms-3">Historial de Facturas</a>
                        <a href="#" class="ms-3">Cierre de Caja</a>
                    </div>
                </details>
            </div>

            <div class="col-12 p-0 mt-2 menu-item">
                <details class="menu-details">
                    <summary class="d-flex flex-row align-items-center Quick-white-link">
                        <i class="bi bi-person-badge fs-5"></i>
                        <p class="texto-menu">Clientes</p>
                    </summary>
                    <div class="menu-submenu d-flex flex-column ps-5">
                        <a href="#" class="ms-3">Ver listado de Clientes</a>
                        <a href="#" class="ms-3">Gestionar Clientes</a>
                    </div>
                </details>
            </div>

            <div class="col-12 p-0 mt-2 menu-item">
                <details class="menu-details">
                    <summary class="d-flex flex-row align-items-center Quick-white-link">
                        <i class="bi bi-truck fs-5"></i>
                        <p class="texto-menu">Proveedores</p>
                    </summary>
                    <div class="menu-submenu d-flex flex-column ps-5">
                        <a href="#" class="ms-3">Ver listado de Proveedores</a>
                        <a href="#" class="ms-3">Gestionar Proveedores</a>
                        <a href="#" class="ms-3">Detalles Proveedor</a>
                    </div>
                </details>
            </div>

            <div class="col-12 p-0 mt-2 menu-item">
                <details class="menu-details">
                    <summary class="d-flex flex-row align-items-center Quick-white-link">
                        <i class="bi bi-person-lines-fill fs-5"></i>
                        <p class="texto-menu">Empleados</p>
                    </summary>
                    <div class="menu-submenu d-flex flex-column ps-5">
                        <a href="#" class="ms-3">Listado de Empleados</a>
                        <a href="#" class="ms-3">Gestionar Empleados</a>
                    </div>
                </details>
            </div>

            <div class="col-12 p-0 mt-2 menu-item">
                <details class="menu-details">
                    <summary class="d-flex flex-row align-items-center Quick-white-link">
                        <i class="bi bi-file-earmark-text fs-5"></i>
                        <p class="texto-menu">Contabilidad y Reportes</p>
                    </summary>
                    <div class="menu-submenu d-flex flex-column ps-5">
                        <a href="#" class="ms-3">Reportes de Rotacion</a>
                        <a href="#" class="ms-3">Reporte de Ventas</a>
                        <a href="#" class="ms-3">Reporte de Inventario</a>
                        <a href="#" class="ms-3">Reporte de Financiero</a>
                        <a href="#" class="ms-3">Reporte de Auditoria</a>
                    </div>
                </details>
            </div>

            <div class="col-12 p-0 mt-2 menu-item">
                <details class="menu-details">
                    <summary class="d-flex flex-row align-items-center Quick-white-link">
                        <i class="bi bi-currency-exchange fs-5"></i>
                        <p class="texto-menu">Monedas y Tasas</p>
                    </summary>
                    <div class="menu-submenu d-flex flex-column ps-5">
                        <a href="#" class="ms-3">Ver Tasas Activas</a>
                        <a href="#" class="ms-3">Gestionar Tasas</a>
                        <a href="#" class="ms-3">Historial de Tasas</a>
                    </div>
                </details>
            </div>

            <div class="col-12 p-0 mt-2 menu-item">
                <details class="menu-details">
                    <summary class="d-flex flex-row align-items-center Quick-white-link">
                        <i class="bi bi-person-lock fs-5"></i>
                        <p class="texto-menu">Seguridad y Accceso</p>
                    </summary>
                    <div class="menu-submenu d-flex flex-column ps-5">
                        <a href="#" class="ms-3">Gestion de Usuarios</a>
                        <a href="#" class="ms-3">Gestionar Roles y Permisos</a>
                    </div>
                </details>
            </div>

        </div>

        <div class="col-12 p-0 mt-auto mb-3">
            <p class="Quick-title text-center">QuickStock © 2025</p>
        </div>

    </div>
</div>

<script>
    
</script>