//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#form_ropas").on("submit", function (e) {
    guardaryeditar(e);
  });
}


$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/ropa.controller.php?op=todos", (res) => {
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      var fondo;
      if (valor.Marca == "Tommy") fondo = "bg-primary"
      else if (valor.Marca == "Gap") fondo = "bg-success"
      else if (valor.Marca == "Aeropostal") fondo = "bg-warning"
      else if (valor.Marca == "Levis") fondo = "bg-danger"
      else if (valor.Marca == "Nautica") fondo = "bg-info"
      html += `<tr>
              <td>${index + 1}</td>
             <td>${valor.Tipo}</td>
                <td>${valor.Modelo}</td>
                <td>${valor.Cantidad}</td>
                <td>${valor.Precio}</td>
                <td><div class="d-flex align-items-center gap-2">
                <span class="badge ${fondo} rounded-3 fw-semibold">${valor.Marca
        }</span>
            </div></td>
          <td>
          <button class='btn btn-success' onclick='editar(${valor.RopaId
        })'>Editar</button>
          <button class='btn btn-danger' onclick='eliminar(${valor.RopaId
        })'>Eliminar</button>
          <button class='btn btn-info' onclick='ver(${valor.RopaId
        })'>Ver</button>
          </td></tr>
              `;
    });
    $("#tabla_ropas").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#form_ropas")[0]);
  var ruta = '';
  var RopaId = document.getElementById("RopaId").value
  if (RopaId > 0) {
    ruta = "../../Controllers/ropa.controller.php?op=actualizar"
  } else {
    ruta = "../../Controllers/ropa.controller.php?op=insertar"
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
        Swal.fire("Prendas", "Prenda ingresada con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("Prendas", "Error al guardar, intente mas tarde", "error");
      }
    },
  });
}

var editar = (RopaId) => {

  $.post(
    "../../Controllers/ropa.controller.php?op=uno",
    { RopaId: RopaId },
    (res) => {
      res = JSON.parse(res);
      $("#RopaId").val(res.RopaId);
      $("#Codigo").val(res.Codigo);
      $("#Cantidad").val(res.Cantidad);
      $("#Tipo").val(res.Tipo);
      $("#Modelo").val(res.Modelo);
      $("#Precio").val(res.Precio);
      $("#Talla").val(res.Talla);
      $("#Color").val(res.Color);
      $("#Marca").val(res.Marca);

    }
  );
  $("#Modal_ropa").modal("show");
}


var eliminar = (RopaId) => {
  Swal.fire({
    title: "Prendas",
    text: "Esta seguro de eliminar la prenda",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/ropa.controller.php?op=eliminar",
        { RopaId: RopaId },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("rendas", "Prenda Eliminado", "success");
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
  document.getElementById("RopaId").value = "";
  document.getElementById("Codigo").value = "";
  document.getElementById("Cantidad").value = "";
  document.getElementById("Tipo").value = "";
  document.getElementById("Modelo").value = "";
  document.getElementById("Precio").value = "";
  document.getElementById("Talla").value = "";
  document.getElementById("Color").value = "";
  document.getElementById("Marca").value = "";
  $("#Modal_ropa").modal("hide");

}
init();