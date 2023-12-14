<?php require_once('../html/head2.php') ?>

<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Pacientes</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_pacientes">
                        Nuevo Paciente
                    </button>
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
                                    <h6 class="fw-semibold mb-0">Edad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Enfermedad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha de ingreso</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_pacientes">

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
<div class="modal fade" id="Modal_pacientes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_pacientes">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Pacientes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="ID_paciente" id="ID_paciente">


                  
                    <div class="form-group">
                        <label for="Nombre">Nombre del Paciente</label>
                        <input type="text"   class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre del paciente">
                        
                    </div>
                   
                    <div class="form-group">
                        <label for="Edad">Edad</label>
                        <input type="text"  class="form-control" id="Edad" name="Edad" placeholder="Ingrese la edad del paciente">
                        
                    </div>

                    <div class="form-group">
                        <label for="Enfermedad">Enfermedad</label>
                        <input type="text"  class="form-control" id="Enfermedad" name="Enfermedad" placeholder="Ingrese la enfermedad del paciente">
                        
                    </div>

                    <div class="form-group">
                        <label for="Fecha_ingreso">Fecha ingreso</label>
                        <input type="date"   class="form-control" id="Fecha_ingreso" name="Fecha_ingreso" placeholder="Ingrese la fecha de ingreso del paciente">
                        
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

<script src="pacientes.controller.js"></script>
<script src="pacientes.model.js"></script>