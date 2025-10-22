<!--<style>
    [class^="col"] {
        border: 2px solid blue;
    }

    [class^="row"] {
        border: 2px solid red;
    }

    [class^="container"] {
        border: 2px solid white;
    }
</style>-->
<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-3 p-lg-5">
            <h1 class="Quick-title">NOMBRE DE LA EMPRESA</h1>
            <div class="row m-0 p-1 mt-5 ingresos-totales dashboard-gerente-widget">
                <div class="col-3 p-2">
                    <h5 class="Quick-title text-center m-0">Ingresos Totales (hoy)</h5>
                </div>
                <div class="col-3 p-2">
                    <p class="m-0 text-uppercase text-end">Total ventas =</p>
                </div>
                <div class="col-3 p-2 d-flex flex-row justify-content-center align-items-center">
                    <p class="p-0 m-0">00.00</p>
                    <h6 class="p-0 m-0 ps-1">$</h6>
                </div>
                <div class="col-3 p-2 d-flex flex-row justify-content-center align-items-center">
                    <p class="p-0 m-0">00.00</p>
                    <h6 class="p-0 m-0 ps-1">Bs.</h6>
                </div>
                <div class="col-12 p-0 py-2 m-0 d-flex flex-row justify-content-end align-items-center">
                    <button class="btn btn-success me-3">
                        Descargar el Reporte Financiero Diario
                    </button>
                </div>
            </div>
            <div class="row m-0 p-0 mt-5 d-flex flex-row justify-content-around">
                <div class="col-5 d-flex flex-column justify-content-between">
                    <div class="row p-1 dashboard-gerente-widget">
                        <div class="col-6 p-2">
                            <h5 class="Quick-title m-0 text-center">
                                Ventas Realizadas (hoy)
                            </h5>
                        </div>
                        <div class="col-6 p-2 d-flex flex-row justify-content-center align-items-center">
                            <p class="p-0 m-0">0</p>
                            <h6 class="p-0 m-0 ps-1">Ventas</h6>
                        </div>
                        <div class="col-12 p-0 py-2 m-0 d-flex flex-row justify-content-end align-items-center">
                            <button class="btn btn-success me-3">
                                Descargar el Reporte Financiero Diario
                            </button>
                        </div>
                    </div>
                    <div class="row p-1 dashboard-gerente-widget">
                        <div class="col-6 p-2">
                            <h5 class="Quick-title m-0 text-center">
                                Producto Mas Vendido (Hoy)
                            </h5>
                        </div>
                        <div class="col-6 p-2 d-flex flex-row justify-content-center align-items-center">

                        </div>
                        <div class="col-12 p-0 py-2 m-0 d-flex flex-row justify-content-end align-items-center">
                            <button class="btn btn-success me-3">
                                Imprimir Reporte de Rotacion
                            </button>
                        </div>
                    </div>
                    <div class="row p-1 dashboard-gerente-widget">
                        <div class="col-6 p-2">
                            <h5 class="Quick-title m-0 text-center">
                                Producto Mas Vendido (Esta semana)
                            </h5>
                        </div>
                        <div class="col-6 p-2 d-flex flex-row justify-content-center align-items-center">

                        </div>
                        <div class="col-12 p-0 py-2 m-0 d-flex flex-row justify-content-end align-items-center">
                            <button class="btn btn-success me-3">
                                Imprimir Reporte de Rotacion
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-6 p-1 dashboard-gerente-widget">
                    <div class="row">
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
                        <div class="col-12 p-0 py-2 m-0 d-flex flex-row justify-content-around align-items-center">
                            <button class="btn btn-success">
                                Ir gestion de Compras
                            </button>
                            <button class="btn btn-success">
                                Ir a Inventario
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-0 p-0 p-1 mt-5 w-100 dashboard-gerente-widget">
                <div class="col-12 p-0 m-0">
                    <h5 class="Quick-title m-0 text-center">
                        Top 5 Productos Mas Vendidos
                    </h5>
                </div>
                <div class="col-12 p-0 m-0 chart-container-wrapper">
                    <canvas id="myChart">

                    </canvas>
                </div>
            </div>
        </div>
    </div>
</div>