<!--<style>
    [class^="col"] {
        border: 2px solid blue;
    }

    [class^="row"] {
        border: 2px solid red;
    }

    [class^="container"] {
        border: 2px solid green;
    }
</style>-->
<div class="container-fluid" id="mainContent"><!--para hacer la vista responsive y poder meterle el dashboard-->
    <div class="row d-flex flex-column justify-content-center align-items-center"><!--importante poner-->
        <div class="col-12 p-3 p-lg-5"><!--importante añadir-->
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-6 p-5 Quick-title">
                    <h1>Gestion de categorias</h1>
                </div>

                <div class="col-6 p-5 d-flex flex-row justify-content-end align-items-center">
                    <form action="">
                        <input type="search" placeholder="Buscar Categoria..." class="Quick-input" id="productos-buscar">
                        <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-search fs-6"></i>
                        </button>
                    </form>
                </div>

                <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                    <div class="col-12 Quick-table pt-5 mb-3">
                        <table class="w-100">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Zapatillas Deportivas</td>
                                    <td>Calzado para correr y entrenamiento, materiales ligeros.</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Calzado Formal</td>
                                    <td>Zapatos de vestir para hombre y mujer (ej: Oxford, Mocasín).</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Botas de Invierno</td>
                                    <td>Calzado con aislamiento térmico y suela antideslizante.</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="Quick-widget col-8 p-0 mt-5 p-2">
                    <div class="col-12 Quick-form px-5 rounded-2">
                        <form action="" class="form py-3">
                            <div class="row d-flex flex-row justify-content-center align-items-center">
                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="categoria_nombre" class="form-label Quick-title">Nombre de la Categoría</label>
                                    <input type="text" id="categoria_nombre" name="categoria_nombre" class="Quick-form-input" required>
                                </div>
                                <div class="col-6 d-flex flex-column py-3">
                                </div>

                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="categoria_descripcion" class="form-label Quick-title">Descripción</label>
                                    <textarea name="categoria_descripcion" id="categoria_descripcion" class="Quick-form-input" rows="3"></textarea>
                                </div>

                                <div class="col-12 d-flex flex-column py-3">
                                    <div class="row p-0 m-0 d-flex flex-row justify-content-around align-items-center">
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-success">Guardar Categoría</button>
                                        </div>
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="reset" class="btn btn-danger">Limpiar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>