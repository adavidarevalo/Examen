<?php require_once('../html/head2.php') ?>


<div class="row">
        <div class="card w-100">
            <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-1">
                    <h5 class="card-title fw-semibold mb-4">Lista de Peliculas</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_peliculas" id="btn_nuevo">
                    Nueva Pelicula o Asociacion
                </button>
                </div>
<div class="row">
        <div class="card-body">
       
            <div class="accordion mt-4" id="filtersAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="filtroTituloHeader">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filtroTituloCollapse" aria-expanded="true" aria-controls="filtroTituloCollapse">
                            Filtros
                        </button>
                    </h2>
                    <div id="filtroTituloCollapse" class="accordion-collapse collapse show" aria-labelledby="filtroTituloHeader" data-bs-parent="#filtersAccordion">
                        <div class="accordion-body">

<div class="row">
    <div class="card w-100">
                <div class="form-group" class="mb-5">
                    <label for="filtroTitulo">Nombre de pelicula</label>
                    <input type="text" class="form-control" id="filtroTitulo" placeholder="Filtrar por Título">
                </div>
                <div class="form-group" class="mb-5">
                    <label for="filtroTitulo">Genero de pelicula</label>
                    <input type="text" class="form-control" id="filtroTitulo" placeholder="Filtrar por Título">
                </div>
                <div class="form-group" class="mb-5">
                    <label for="filtroGenero">Busqueda por cine</label>
                    <input type="text" class="form-control" id="filtroGenero" placeholder="Filtrar por Género">
                </div>
                <div class="form-group" class="mb-5">
                    <label for="filtroDuracion">Busqueda por ciudad del cine</label>
                    <input type="text" class="form-control" id="filtroDuracion" placeholder="Filtrar por Duración">
                </div>
                <button type="button" class="btn btn-primary" id="btnFiltrar">
                    Filtrar
                </button>
    </div>
<!-- </div> -->


                        </div>
                    </div>
                </div>
            </div>

        </div>
    <!-- </div> -->
</div>

    </div>

                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Titulo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Genero</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Duracion</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_cines">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_peliculas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detalles Pelicula</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Agregué un sistema de pestañas (tabs) al modal -->
                <ul class="nav nav-tabs" id="myTabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general">Nueva Pelicula</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cine-tab" data-bs-toggle="tab" href="#cine">Asociar Pelicula</a>
                    </li>
                </ul>
                <div class="tab-content mt-2">
                    <div class="tab-pane fade show active" id="general">
                                    <form method="post" id="form_pelicula">
                                                            <input type="hidden" name="ID" id="ID">
 <div class="form-group">
                        <label for="Título">Título</label>
                        <input type="text" required class="form-control" id="Título" name="Título" placeholder="Título">
                    </div>
                     <div class="form-group">
                        <label for="Género">Género</label>
                          <select name="Género" id="Género" class="form-control"></select>
                    </div>
                     <div class="form-group">
                        <label for="Duración">Duración</label>
                        <input type="text" required class="form-control" id="Duración" name="Duración" placeholder="Duración">
                    </div>
                      <div class="form-group">
                        <label for="Género">Cine</label>
                          <select name="ID_cine" id="ID_cine" class="form-control"></select>
                    </div>
 <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Grabar</button>
                </div>
                                    </form>

                    </div>
                    <div class="tab-pane fade" id="cine">
                      <form id="associar_pelicula">
 <div class="form-group">
                        <label for="Género">Cine</label>
                          <select name="ID_cine" id="ID_cine" class="form-control" class="ID_cine"></select>
                    </div>
                     <div class="form-group">
                        <label for="Género">Pelicula</label>
                          <select name="ID_pelicula" id="ID_pelicula" class="form-control"></select>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Grabar</button>
                </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Ver Details -->
<div class="modal fade" id="Modal_ver_pelicula" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_cines">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detalles Pelicula</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                     <div class="form-group">
                        <label for="Titulo"><strong>Nombre:</strong></label>
                        <span id="NombrePelicula"></span>
                    </div>
                    <div class="form-group">
                        <label for="Genero"><strong>Género:</strong></label>
                        <span id="GeneroPelicula"></span>
                    </div>
                    <div class="form-group">
                        <label for="Duracion"><strong>Duración:</strong></label>
                        <span id="DuracionPelicula"></span>
                    </div>
                    <div>
                        <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre del Cine</th>
                                <th>Ciudad</th>
                            </tr>
                        </thead>
                        <tbody id="table_ver_pelicula">
                            <!-- Puedes agregar filas de datos aquí en el futuro -->
                        </tbody>
                    </table>

                    </div>
                </div>
              
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="peliculas.controller.js"></script>
<script src="peliculas.model.js"></script>