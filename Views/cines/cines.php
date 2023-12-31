<!-- @format -->

<?php require_once('../html/head2.php') ?>

<div class="row">
  <div class="card w-100">
    <div class="card-body p-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="card-title fw-semibold mb-4">Lista de Cines</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_cines">
          Nuevo Cine
        </button>
      </div>

      <div class="card w-100 mt-4">
        <div class="card-body p-4 d-flex justify-content-between align-items-center">
          <div class="form-group mb-0" style="width: 85%;">
            <input type="text" class="form-control" id="filtro" placeholder="Filtrar..." />
          </div>
          <button type="button" class="btn btn-secondary ml-2" id="btnFiltrar" style="width: 15%;">Filtrar</button>
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
                <h6 class="fw-semibold mb-0">Nombre</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Ciudad</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Número Salas</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Direccion</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Telefono</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Acciones</h6>
              </th>
            </tr>
          </thead>
          <tbody id="tabla_cines"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div
  class="modal fade"
  id="Modal_cines"
  data-bs-backdrop="static"
  data-bs-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" id="form_cines">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Nuevo Cine</h5>
        </div>
        <div class="modal-body">
          <input type="hidden" name="CineId" id="CineId" />

          <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" required class="form-control" id="Nombre" name="Nombre" placeholder="Nombre del Cine" />
          </div>
          <div class="form-group">
            <label for="Ciudad">Ciudad</label>
            <div class="input-group">
              <select name="Ciudad" id="Ciudad" class="form-control"></select>
              <button type="button" class="btn btn-outline-secondary" id="mostrarInput">+</button>
              <div id="inputContainer" style="display: none;" class="input-group mt-2">
                <input type="text" class="form-control" id="nuevaCiudad" placeholder="Nueva Ciudad" />
                <div class="input-group-append">
                  <button type="button" class="btn btn-outline-secondary" id="cerrarBtn">Cerrar</button>
                  <button type="button" class="btn btn-outline-secondary" id="guardarBtn">Guardar</button>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="Número_salas">Numero de Salas</label>
            <input
              type="number"
              required
              class="form-control"
              id="Número_salas"
              name="Número_salas"
              placeholder="Número salas del Cine" />
          </div>
          <div class="form-group">
            <label for="Direccion">Direccion</label>
            <input
              type="text"
              required
              class="form-control"
              id="Direccion"
              name="Direccion"
              placeholder="Direccion del Cine" />
          </div>
          <div class="form-group">
            <label for="Teléfono">Teléfono</label>
            <input
              type="text"
              required
              class="form-control"
              id="Teléfono"
              name="Teléfono"
              placeholder="Teléfono del Cine" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Grabar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn_cancel">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="cines.controller.js"></script>
<script src="cines.model.js"></script>
