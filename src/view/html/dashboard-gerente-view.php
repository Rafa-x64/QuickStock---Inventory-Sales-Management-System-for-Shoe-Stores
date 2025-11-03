<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-1 p-md-3 p-lg-5">
            <h1 class="Quick-title text-uppercase mt-5 mt-lg-0">Nombre de la Empresa</h1>
            <h3 class="Quick-title mt-5">Resumen Financiero</h3>
            <div class="row m-0 p-1 mt-3 ingresos-totales dashboard-gerente-widget">
                <div class="col-12 col-md-4 p-2 d-flex flex-column justify-content-center align-items-center">
                    <h5 class="Quick-title text-center m-0">Ingresos Totales (hoy)</h5>
                </div>
                <div class="col-12 col-md-2 p-0 p-lg-2 mb-2 mb-md-0 d-flex flex-column justify-content-center align-items-center">
                    <p class="m-0 text-uppercase text-center text-lg-end">Total ventas</p>
                </div>
                <div class="col-4 col-md-2 p-0 p-md-2 d-flex flex-row justify-content-center align-items-center">
                    <p class="p-1 m-0 bg-success-transparent rounded-2">00.00 $</p>
                </div>
                <div class="col-4 col-md-2 p-0 p-md-2 d-flex flex-row justify-content-center align-items-center">
                    <p class="p-1 m-0 bg-success-transparent rounded-2">00.00 Bs.</p>
                </div>
                <div class="col-4 col-md-2 p-0 p-md-2 d-flex flex-row justify-content-center align-items-center">
                    <p class="p-1 m-0 bg-success-transparent rounded-2">00.00 Eur</p>
                </div>
                <div class="row m-0 p-0 ventas-realizadas d-flex flex-row justify-content-center align-items-center">
                    <div class="col-6 p-2 mt-3 mt-md-0 d-flex flex-column justify-content-center align-items-center">
                        <p class="Quick-title p-1 m-0 text-center">
                            Ventas Realizadas (hoy)
                        </p>
                    </div>
                    <div class="col-6 p-2 mt-3 mt-md-0 d-flex flex-column justify-content-center align-items-center">
                        <p class="p-1 m-0 bg-success-transparent rounded-2">0 Ventas</p>
                    </div>
                </div>
                <div class="col-12 col-md-12 p-0 mt-3 mt-md-0 py-2 m-0 d-flex flex-row justify-content-end align-items-center">
                    <button class="btn btn-success me-0 me-md-3">
                        Descargar el Reporte Financiero Diario
                    </button>
                </div>
            </div>
            <h3 class="Quick-title mt-5">Resumen de Ventas</h3>
            <div class="row m-0 p-0 mt-3 d-flex flex-column flex-md-row justify-content-around dashboard-gerente-border rounded-3 p-0 p-md-3">
                <div class="col-12 col-md-5 d-flex flex-column justify-content-around">
                    <div class="row p-1 mt-2 mt-md-0 mas-vendido-hoy dashboard-gerente-widget">
                        <div class="col-4 p-2 d-flex flex-column justify-content-center align-items-center">
                            <h5 class="Quick-title m-0 text-center">
                                Producto Mas Vendido <br> (Hoy)
                            </h5>
                        </div>
                        <div class="col-8 p-0 d-flex flex-row justify-content-center align-items-center">
                            <div class="row w-100 m-0 p-0 d-flex flex-row justify-content-center align-items-center">
                                <div class="col-6 text-marquee bg-success-transparent d-flex flex-row justify-content-center align-items-center">
                                    <p class="p-1 m-0">Mocacines de Dama</p>
                                </div>
                                <div class="col-6 d-flex bg-success-transparent flex-row justify-content-center align-items-center">
                                    <p class="p-1 m-0 text-center w-100">9 Pares</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-0 py-1 px-1 py-md-2 px-md-0 m-0 d-flex flex-row justify-content-end align-items-center">
                            <button class="btn btn-success m-0 me-md-3">
                                Imprimir Reporte de Rotacion
                            </button>
                        </div>
                    </div>
                    <div class="row p-1 mt-2 mt-md-0 mas-vendido-esta-semana dashboard-gerente-widget">
                        <div class="col-4 p-2 d-flex flex-column justify-content-center align-items-center">
                            <p class="Quick-title m-0 text-center">
                                Producto Mas Vendido <br>(Esta semana)
                            </p>
                        </div>
                        <div class="col-8 p-0 d-flex flex-row justify-content-center align-items-center">
                            <div class="row w-100 m-0 p-0 d-flex flex-row justify-content-center align-items-center">
                                <div class="col-6 text-marquee bg-success-transparent d-flex flex-row justify-content-center align-items-center">
                                    <p class="p-1 m-0">Botas Timberland</p>
                                </div>
                                <div class="col-6 d-flex bg-success-transparent flex-row justify-content-center align-items-center">
                                    <p class="p-1 m-0 text-center w-100">32 Pares</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-0 py-1 px-1 py-md-2 px-md-0 m-0 d-flex flex-row justify-content-end align-items-center">
                            <button class="btn btn-success m-0 me-md-3">
                                Imprimir Reporte de Rotacion
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-1 mt-2 mt-md-0 dashboard-gerente-widget">
                    <div class="col-12 p-0 m-0">
                        <h5 class="Quick-title m-0 text-center">
                            Top 5 Productos Mas Vendidos
                        </h5>
                    </div>
                    <div class="col-12 p-0 m-0 chart-container-wrapper">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <h3 class="Quick-title mt-5">Resumen de Stock</h3>
            <div class="dashboard-gerente-border rounded-3 p-0 p-md-3">
                <div class="row m-0 p-0 mt-3 p-1 w-100 dashboard-gerente-widget">
                    <div class="col-12 p-2">
                        <h5 class="Quick-title m-0 text-center">
                            Alertas de Stock Minimo
                        </h5>
                    </div>
                    <div class="col-12 p-2 d-flex flex-row justify-content-center align-items-center">
                        <table class="dashboard-gerente-tabla">
                            <thead>
                                <tr>
                                    <th class="ps-1">Codigo</th>
                                    <th class="ps-1">Producto</th>
                                    <th class="ps-1">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ZAP-01A</td>
                                    <td>Zapatillas Running Pro - Azul/Gris</td>
                                    <td>45</td>
                                </tr>
                                <tr>
                                    <td>BOT-33M</td>
                                    <td>Botas de Cuero Casuales - Marrón</td>
                                    <td>28</td>
                                </tr>
                                <tr>
                                    <td>TAC-05N</td>
                                    <td>Tacones de Aguja Clásicos - Negro</td>
                                    <td>19</td>
                                </tr>
                                <tr>
                                    <td>SAN-12B</td>
                                    <td>Sandalias de Verano Plataforma - Beige</td>
                                    <td>62</td>
                                </tr>
                                <tr>
                                    <td>MOC-99V</td>
                                    <td>Mocasines de Antelina - Verde Oscuro</td>
                                    <td>37</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 p-0 py-md-2 m-0 d-flex flex-column flex-md-row justify-content-between align-items-center justify-content-md-around align-items-md-center">
                        <button class="btn btn-success mb-2 mb-md-0">
                            <a href="compras-historial" class="Quick-white-link">
                                Historial de compras
                            </a>
                        </button>
                        <button class="btn btn-success">
                            <a href="inventario-ver-productos" class="Quick-white-link">
                                Inventario
                            </a>
                        </button>
                    </div>
                </div>
                <div class="row m-0 p-0 p-1 mt-0 mt-md-5 w-100 d-flex flex-column flex-md-row">
                    <div class="col-12 p-0 p-md-3 col-md-6 d-flex flex-column justify-content-around align-items-center">
                        <div class="row m-0 mb-2 mb-md-0 p-0 p-1 w-100 dashboard-gerente-widget">
                            <div class="col-6 p-2 m-0 p-1 d-flex flex-row justify-content-center align-items-center">
                                <p class="text-center p-0 m-0 Quick-title">Total de Productos Activos</p>
                            </div>
                            <div class="col-6 p-2">
                                <p class="text-center p-0 m-0 bg-success-transparent rounded-2">
                                    0 Productos
                                </p>
                            </div>
                            <div class="col-12 p-0 py-2 m-0 d-flex flex-row justify-content-end align-items-center">
                                <button type="button" class="btn btn-success me-3">
                                    <a href="inventario-ver-productos" class="Quick-white-link">
                                        Lista de Productos
                                    </a>
                                </button>
                            </div>
                        </div>
                        <div class="row m-0 mb-2 mb-md-0 p-0 p-1 w-100 dashboard-gerente-widget">
                            <div class="col-6 p-2 m-0 p-1 d-flex flex-column justify-content-center align-items-center">
                                <p class="text-center p-0 m-0 Quick-title">Productos sin Stock</p>
                            </div>
                            <div class="col-6 p-2">
                                <p class="text-center p-0 m-0 bg-success-transparent rounded-2">
                                    0 Productos
                                </p>
                            </div>
                            <div class="col-12 p-0 py-2 m-0 d-flex flex-row justify-content-end align-items-center">
                                <button type="button" class="btn btn-success me-3">
                                    <a href="inventario-ver-productos" class="Quick-white-link">
                                        Lista de Productos
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 p-0 d-flex flex-column justify-content-center align-items-center">
                        <div class="row m-0 p-0 p-1 w-100 dashboard-gerente-widget">
                            <div class="col-12 p-2">
                                <h5 class="Quick-title m-0 text-center">
                                    Categorias registradas
                                </h5>
                            </div>
                            <div class="col-12 p-2 d-flex flex-column justify-content-center align-items-center">
                                <table class="dashboard-gerente-tabla">
                                    <thead>
                                        <tr>
                                            <th class="ps-2">ID</th>
                                            <th>Nombre de la Categoría</th>
                                            <th>Categoría Padre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Calzado Deportivo</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Zapatos de Dama</td>
                                            <td>Calzado</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Zapatos de Caballero</td>
                                            <td>Calzado</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Sandalias</td>
                                            <td>Zapatos de Dama</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Botines</td>
                                            <td>Zapatos de Caballero</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 p-0 py-2 m-0 d-flex flex-column flex-md-row justify-content-around align-items-center">
                                <button class="btn btn-success mb-2 mb-md-0">
                                    <a href="inventario-gestionar-categorias" class="Quick-white-link">
                                        Gestionar Categorias
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="view/js/dashboard-gerente.js"></script>