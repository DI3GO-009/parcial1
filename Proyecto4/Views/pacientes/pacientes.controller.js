//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_pacientes").on("submit", function (e) {
    guardaryeditar(e);
  });
}


$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/pacientes.controller.php?op=todos", (res) => {
    res = JSON.parse(res);
    $.each(res, (index, valor) => {

      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre}</td>
                <td>${valor.Edad}</td>
                <td>${valor.Enfermedad}</td>
                <td>${valor.Fecha_ingreso}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${valor.ID_paciente})'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${valor.ID_paciente})'>Eliminar</button>           
            </td></tr>
                `;
    });
    $("#tabla_pacientes").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_pacientes")[0]);
  var ruta = '';
  var ID_paciente = document.getElementById("ID_paciente").value
  if (ID_paciente > 0) {
    ruta = "../../Controllers/pacientes.controller.php?op=actualizar"
  } else {
    ruta = "../../Controllers/pacientes.controller.php?op=insertar"
  }
  $.ajax({
    url: ruta,
    type: "POST",
    data: dato,
    contentType: false,
    processData: false,
    success: function (res) {
      res = JSON.parse(res);
      if (res == "ok") {
        Swal.fire("Paciente", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("Paciente", "Error al guardo, intente mas tarde", "error");
      }
    },
  });
}


var editar = (ID_paciente) => {

  $.post(
    "../../Controllers/pacientes.controller.php?op=uno",
    { ID_paciente: ID_paciente },
    (res) => {
      res = JSON.parse(res);
      $("#ID_paciente").val(res.ID_paciente);
      $("#Nombre").val(res.Nombre);

    }
  );
  $("#Modal_pacientes").modal("show");
}

var verificar_paciente = () => {
  let Nombre = $('#Nombre').val()
  $.post(
    '../../Controllers/pacientes.controller.php?op=verificar_paciente',
    { Nombre: Nombre },
    (res) => {
      console.log(res);
      res = JSON.parse(res);
      if (parseInt(res.paciente_repetido) > 0) {
        $("#PacienteRepetido").removeClass("d-none");
        $("#PacienteRepetido").html(
          "El Paciente ingresado, ya exite en la base de datos"
        );
        $("button").prop("disabled", true);
      } else {
        $("#PacienteRepetido").addClass("d-none");
        $("button").prop("disabled", false);
      }
    }

  );

}


var eliminar = (ID_paciente) => {
  Swal.fire({
    title: "Pacientes",
    text: "Esta seguro de eliminar al paciente",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/pacientes.controller.php?op=eliminar",
        { ID_paciente: ID_paciente },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("pacientes", "Paciente Eliminado", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      );
    }
  });

  limpia_Cajas();
}

var limpia_Cajas = () => {
  document.getElementById("ID_paciente").value = "";
  document.getElementById("Nombre").value = "";
  document.getElementById("Edad").value = "";
  $("#Modal_pacientes").modal("hide");

}
init();