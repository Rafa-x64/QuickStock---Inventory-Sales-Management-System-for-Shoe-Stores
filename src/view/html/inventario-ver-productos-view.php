<div class="container-fluid" id="mainContent"><!--para hacer la vista responsive y poder meterle el dashboard-->
    <div class="row d-flex flex-column justify-content-center align-items-center"><!--importante poner-->
        <div class="col-12 p-3 p-lg-5"><!--importante añadir-->
            <div class="row">
                <div class="col-6 p-5 Quick-title">
                    <h1>Lista de Productos</h1>
                </div>
                <div class="col-6 p-5 d-flex flex-row justify-content-end align-items-center">
                    <form action="">
                        <input type="search" placeholder="Buscar Producto..." class="Quick-input" id="productos-buscar">
                        <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-search fs-6"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                <div class="col-12 Quick-table pt-5 mb-3">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th class="ps-1">Referencia</th>
                                <th class="ps-1">Nombre</th>
                                <th class="ps-1">Categoría</th>
                                <th class="ps-1">Precio Venta</th>
                                <th class="ps-1">Stock Actual</th>
                                <th class="ps-1 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2001</td>
                                <td>Zapatillas Running Pro (Talla 42)</td>
                                <td>Deportivo (Running)</td>
                                <td>89.99</td>
                                <td>42</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm">Editar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2002</td>
                                <td>Botín de Cuero Clásico (Talla 40)</td>
                                <td>Botas / Botines</td>
                                <td>135.00</td>
                                <td>21</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm">Editar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2003</td>
                                <td>Sandalia de Verano Dama (Talla 37)</td>
                                <td>Sandalias / Playa</td>
                                <td>29.95</td>
                                <td>55</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm">Editar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2004</td>
                                <td>Zapato Oxford Negro (Talla 43)</td>
                                <td>Formal / Negocios</td>
                                <td>105.00</td>
                                <td>17</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm">Editar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2005</td>
                                <td>Zapatilla Casual Lona (Talla 39)</td>
                                <td>Casual Urbano</td>
                                <td>49.99</td>
                                <td>63</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm">Editar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>