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
</style>
-->
<!--bienvenida-->
<section class="row bienvenida" id="bienvenida">
    <div class="col-3 d-none d-md-block">

    </div>
    <div class="col col-lg-9 d-flex flex-column justify-content-center align-items-center">
        <div class="row text-uppercase">
            <div class="col-12 d-flex text-white flex-column justify-content-between align-items-center">
                <h1 class="text-center"><?php echo ESLOGAN1; ?></h1>
                <h6 class="my-3 text-center">Control inteligente de inventario y relaciones operativas</h6>
            </div>
            <div class="col-12 py-3 d-flex flex-row justify-content-center align-items-center">
                <button type="button" class="btn w-4 h-3 me-2 bienvenida-custom-login">
                    <a href="inicio-sesion-usuario" class="text-white">
                        <h6 class="m-0 py-2">Iniciar Sesion</h6>
                    </a>
                </button>
                <button type="button" class="btn w-4 h-3 ms-2 bienvenida-custom-register">
                    <a href="registro-usuario" class="text-white">
                        <h6 class="m-0 py-2">Registrarse</h6>
                    </a>
                </button>
            </div>
        </div>
    </div>
</section>
<!--Acerca de nosotros-->
<section class="row py-5 nosotros" id="acerca-de-nosotros">
    <div class="col-3 d-none d-md-block">

    </div>
    <div class="col-12 col-md-9 px-5">
        <div class="row d-flex flex-column justify-content-center align-items-center">
            <div class="col-12">
                <h2 class="text-uppercase text-center Quick-title">Acerca de nosotros</h2>
                <p class="p-subtitle text-center">Diseñado desde la experiencia, validado en la práctica.</p>
            </div>
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-12 col-md-4 px-0">
                    <img src="assets/images/QuickStock-dashboard.png" alt="imagen del sistema abierto en le navegador" class="img-fluid">
                </div>
                <div class="col-12 col-lg-8 p-3 p-lg-0">
                    <p class="p-concept text-start">En <b><b>QuickStock</b></b> creemos que la gestión operativa debe ser clara, modular y confiable. Nuestro sistema fue diseñado para responder a las necesidades reales de negocios que manejan inventario, clientes, proveedores y reparto, integrando cada módulo con trazabilidad, automatización y control por roles. Nacido de un análisis técnico profundo y una entrevista directa con usuarios reales, <b><b>QuickStock</b></b> no es solo una propuesta académica: es una solución adaptable, pensada para crecer con cada empresa y facilitar su día a día.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--beneficios-->
<section class="row py-5 beneficios" id="beneficios">
    <div class="col-3 d-none d-md-block">

    </div>
    <div class="col-12 col-md-9 px-5">
        <div class="row d-flex flex-column justify-content-center align-items-center">
            <div class="col-12">
                <h2 class="text-uppercase text-center Quick-title">Beneficios</h2>
                <p class="p-subtitle text-center">Confianza operativa desde el diseño</p>
            </div>
            <div class="col-10 col-md-6 col-lg-6 my-5">
                <div class="row d-flex flex-row justify-content-center align-items-center">
                    <div class="col-5 d-flex flex-column m-2 beneficios-item justify-content-center align-items-center">
                        <i class="bi bi-card-checklist fs-3 fs-lg-1"></i>
                        <p class="Quick-title text-center" style="font-size:1rem !important;">Trazabilidad en tiempo real</p>
                    </div>
                    <div class="col-5 d-flex flex-column m-2 beneficios-item justify-content-center align-items-center">
                        <i class="bi bi-lock-fill fs-3 fs-lg-1"></i>
                        <p class="Quick-title text-center" style="font-size:1rem !important;">Roles bien diferenciados</p>
                    </div>
                    <div class="col-5 d-flex flex-column m-2 beneficios-item justify-content-center align-items-center">
                        <i class="bi bi-boxes fs-3 fs-lg-1"></i>
                        <p class="Quick-title text-center" style="font-size:1rem !important;">Escalabilidad modular</p>
                    </div>
                    <div class="col-5 d-flex flex-column m-2 beneficios-item justify-content-center align-items-center">
                        <i class="bi bi-building-fill-gear fs-3 fs-lg-1"></i>
                        <p class="Quick-title text-center" style="font-size:1rem !important;">Automatizacion de procesos</p>
                    </div>
                </div>
            </div>
            <div class="row" id="comparativa">
                <div class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center text-center text-md-start pe-5">
                    <p class="p-concept">QuickStock transforma la gestión operativa con trazabilidad, automatización y control por roles. Su propuesta de valor combina claridad, escalabilidad y eficiencia, adaptándose a cada entorno comercial con mejoras tangibles.</p>
                </div>
                <div class="col-12 col-md-8 d-flex flex-column justify-content-center align-items-center px-0 px-lg-2 py-2 py-lg-0">
                    <table class="table-striped beneficios-table">
                        <tr class="table-active">
                            <th>Aspecto Operativo</th>
                            <th>Antes de Quick</th>
                            <th>Despues con Quick</th>
                        </tr>
                        <tr>
                            <td>Gestión de inventario</td>
                            <td>Registros manuales, propensos a errores</td>
                            <td>Trazabilidad en tiempo real, sin duplicidades</td>
                        </tr>
                        <tr>
                            <td>Roles y permisos</td>
                            <td>Acceso general sin diferenciación</td>
                            <td>Control por roles: cliente, proveedor, repartidor</td>
                        </tr>
                        <tr>
                            <td>Automatización</td>
                            <td>Procesos repetitivos y lentos</td>
                            <td>Tareas automatizadas: despacho, reposición, alertas</td>
                        </tr>
                        <tr>
                            <td>Escalabilidad</td>
                            <td>Sistema rígido, difícil de adaptar</td>
                            <td>Módulos independientes y extensibles</td>
                        </tr>
                        <tr>
                            <td>Comunicación interna</td>
                            <td>Información dispersa entre áreas</td>
                            <td>Flujo integrado entre ventas, reparto y contabilidad</td>
                        </tr>
                        <tr>
                            <td>Reportes y análisis</td>
                            <td>Generación manual, poco confiable</td>
                            <td>Informes automáticos con datos consolidados</td>
                        </tr>
                        <tr>
                            <td>Interacción con clientes</td>
                            <td>Seguimiento limitado y sin trazabilidad</td>
                            <td>Historial de pedidos, entregas y contacto centralizado</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--casos de uso y testimonios-->
<section class="row py-5 Casos de uso" id="testimonios">
    <div class="col-3 d-none d-md-block">

    </div>
    <div class="col-12 col-md-9 px-5">
        <div class="row d-flex flex-column justify-content-center align-items-center">
            <div class="col-12">
                <h2 class="text-uppercase text-center Quick-title">Testimonios</h2>
                <p class="p-subtitle text-center">Aplicaciones reales, resultados medibles</p>
            </div>
            <div class="col-12 col-md-8 my-5">
                <div id="carouselCombinado" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselCombinado" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselCombinado" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselCombinado" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/800x400/94B49F/FFFFFF?text=Primera+Imagen" class="d-block w-100" alt="Descripción de la primera imagen">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Simulación de usuario académico</h5>
                                <p>“<b>QuickStock</b> me permitió organizar el inventario sin errores y mejorar la comunicación con proveedores.”</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x400/ECB390/FFFFFF?text=Segunda+Imagen" class="d-block w-100" alt="Descripción de la segunda imagen">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Caso de uso: módulo Reparto</h5>
                                <p>“La automatización del reparto nos ahorró tiempo y redujo reclamos.”</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x400/DF7861/FFFFFF?text=Tercera+Imagen" class="d-block w-100" alt="Descripción de la tercera imagen">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Caso de uso: módulo Ventas</h5>
                                <p>“Con el módulo de ventas, pudimos aplicar descuentos personalizados y controlar el stock sin interrupciones.”</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x400/DF7861/FFFFFF?text=Cuarta+Imagen" class="d-block w-100" alt="Descripción de la tercera imagen">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Simulación de usuario técnico</h5>
                                <p>“La integración con tasas oficiales nos facilitó la facturación multimoneda y evitó errores contables.”</p>
                            </div>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCombinado" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselCombinado" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 py-3">
                <p class="p-concept text-center">Los resultados hablan por sí solos. En esta sección, verás cómo <b>QuickStock</b> ha transformado procesos reales: desde la automatización del reparto hasta la trazabilidad de pedidos y la gestión eficiente de proveedores. Cada caso de uso demuestra cómo el sistema se adapta a distintos perfiles y necesidades, mientras los testimonios reflejan mejoras concretas en tiempo, precisión y control. Es la evidencia viva de que <b>QuickStock</b> no solo funciona, sino que marca la diferencia.</p>
            </div>
        </div>
    </div>
</section>