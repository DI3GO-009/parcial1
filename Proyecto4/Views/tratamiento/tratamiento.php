<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de tratamientos</h5>

                <div class="table-responsive">
                    <button type="button" onclick="cargarPacientes()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_tratamiento">
                        Nuevo tratamiento
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Paciente</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tipo tratamiento</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Costo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha inicio</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_tratamiento">

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
<div class="modal fade" id="Modal_tratamiento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_tratamiento">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tratamiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="ID_tratamiento" id="ID_tratamiento">
                    
                    <div class="form-group">
                        <label for="ID_paciente">Seleccione un paciente</label>
                      <select name="ID_paciente" id="ID_paciente" class="form-control">
                        <option value="0">Seleccione un paciente</option>
                      </select>
                    </div>                  
                    <div class="form-group">
                        <label for="Tipo_tratamiento">Tipo de tratamiento</label>
                        <input type="text" required class="form-control" id="Tipo_tratamiento" name="Tipo_tratamiento" placeholder="Ingrese el tratamiento">
                    </div>
                    <div class="form-group">
                        <label for="Costo">Costo</label>
                        <input type="text" required class="form-control" id="Costo" name="Costo" placeholder="Ingrese el costo del tratamiento">
                    </div>
                    <div class="form-group">
                        <label for="Fecha_inicio">Fecha de inicio</label>
                        <input type="date" required class="form-control" id="Fecha_inicio" name="Fecha_inicio" placeholder="Ingrese la fecha de inicio">
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

<script src="tratamiento.controller.js"></script>
<script src="tratamiento.model.js"></script>