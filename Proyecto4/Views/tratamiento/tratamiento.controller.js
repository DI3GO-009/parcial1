//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_tratamiento").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/tratamientos.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre_paciente}</td>
                <td>${valor.Tipo_tratamiento}</td>
                <td>${valor.Costo}</td>
                <td>${valor.Fecha_inicio}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${valor.ID_tratamiento})'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${valor.ID_tratamiento})'>Eliminar</button>
            /* <button class='btn btn-info' onclick='ver(${valor.ID_tratamiento})'>Ver</button> */
            </td></tr>
                `;
    });
    $("#tabla_tratamiento").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_tratamiento")[0]);
  var ruta = "";
  var ID_tratamiento = document.getElementById("ID_tratamiento").value;
  if (ID_tratamiento > 0) {
    ruta = "../../Controllers/tratamientos.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/tratamientos.controller.php?op=insertar";
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
        Swal.fire("Tratamientos", "Tratamiento registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("Tratamientos", "Error al guardo, intente mas tarde", "error");
      }
    },
  });
};

var cargaPacientes = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/pacientes.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.ID_paciente}"> ${val.Nombre} </option>`;
      });
      $("#ID_paciente").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
}; 

var editar = async (ID_tratamiento) => {
  await cargaPacientes();
  $.post(
    "../../Controllers/tratamientos.controller.php?op=uno",
    { ID_tratamiento: ID_tratamiento },
    (res) => {
      res = JSON.parse(res);

      $("#ID_tratamiento").val(res.ID_tratamiento);
      $("#ID_paciente").val(res.ID_paciente);    
      $("#Nombre").val(res.Nombre);
    }
  );
  $("#Modal_tratamiento").modal("show");
};

var eliminar = (ID_tratamiento) => {
  Swal.fire({
    title: "Tratamientos",
    text: "Está seguro de eliminar el tratamiento",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/tratamientos.controller.php?op=eliminar",
        { ID_tratamiento: ID_tratamiento },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("Tratamientos", "Tratamiento Eliminado", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error");
          }
          limpia_Cajas(); // Se ejecuta después de procesar la respuesta del servidor
        }
      );
    }
  });
};


/* var eliminar=(ID_tratamiento)=>{
  var eliminar = new Tratamiento_Model(ID_tratamiento, "", "", "", "","eliminar");
  eliminar.eliminar();
} */

var limpia_Cajas = () => {
  document.getElementById("ID_tratamiento").value = "";  
  document.getElementById("Tipo_tratamiento").value = "";
  document.getElementById("Costo").value = "";
  document.getElementById("Fecha_inicio").value = "";
  $("#Modal_tratamiento").modal("hide");
};
init();
