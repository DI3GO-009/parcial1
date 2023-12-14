<?php require_once('../html/head2.php') ?>
<div class="row">
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Prendas</h5>
                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_ropa">
                        Nueva Prenda
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tipo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Modelo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cantidad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Precio</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Marca</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_ropas">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="Modal_ropa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_ropas">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Prendas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="RopaId" id="RopaId">
                    <div class="form-group">
                        <label for="Codigo">Codigo</label>
                        <input type="text" required class="form-control" id="Codigo" name="Codigo" placeholder="Codigo">
                    </div>
                    <div class="form-group">
                        <label for="Cantidad">Cantidad</label>
                        <input type="text" required class="form-control" id="Cantidad" name="Cantidad" placeholder="Cantidad">
                    </div>
                    <div class="form-group">
                        <label for="Tipo">Tipo</label>
                        <input type="text" required class="form-control" id="Tipo" name="Tipo" placeholder="Tipo">
                    </div>
                    <div class="form-group">
                        <label for="Modelo">Modelo</label>
                        <input type="text" required class="form-control" id="Modelo" name="Modelo" placeholder="Modelo">
                    </div>
                    <div class="form-group">
                        <label for="Precio">Precio</label>
                        <input type="text" required class="form-control" id="Precio" name="Precio" placeholder="Precio">
                    </div>
                    <div class="form-group">
                        <label for="Talla">Talla</label>
                        <input type="text" required class="form-control" id="Talla" name="Talla" placeholder="Talla">
                    </div>
                    <div class="form-group">
                        <label for="Color">Color</label>
                        <input type="text" required class="form-control" id="Color" name="Color" placeholder="Color">
                    </div>
                    <div class="form-group">
                        <label for="Marca">Marca</label>
                        <select name="Marca" id="Marca" class="form-control">
                            <option value="Tommy">Tommy</option>
                            <option value="Gap">Gap</option>
                            <option value="Aeropostal">Aeropostal</option>
                            <option value="Levis">Levis</option>
                            <option value="Nautica">Nautica</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>
<script src="ropa.model.js"></script>